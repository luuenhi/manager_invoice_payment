<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerStoreRequest;
use App\Http\Requests\CustomerUpdateRequest;
use App\Models\Customer;
use Carbon\Carbon;
use App\Models\LoyaltyCard;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderByDesc('created_at')->get();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CustomerStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerStoreRequest $request)
    {
        DB::beginTransaction();
        try {
            $params = $request->all();
            $params['dateofbirth'] = Carbon::createFromFormat('d/m/Y', $params['dateofbirth']);
            $customer = Customer::create($params);
            LoyaltyCard::create([
                'point' => 0,
                'customer_id' => $customer->id
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::info($e);
            flash("Thêm mới khách hàng thất bại")->error();
            return back();
        }

        flash('Thêm mới thông tin khách hàng thành công!')->success();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::where('id', $id)->first();
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CustomerUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerUpdateRequest $request, $id)
    {
        $customer = Customer::where('id', $id)->first();
        if (empty($customer)) {
            flash('Không tồn tại khách hàng có id là' . $id)->error();
            return back();
        }
        try {
            $params = $request->all();
            $params['dateofbirth'] = Carbon::createFromFormat('d/m/Y', $params['dateofbirth']);
            $customer->update($params);
        } catch (\Exception $e) {
            \Log::info($e);
            flash("Cập nhật khách hàng thất bại")->error();
            return back();
        }
        flash('Cập nhật khách hàng thành công')->success();
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::with('loyaltyCard')->where('id', $id)->first();
        if (empty($customer)) {
            flash('Không tồn tại khách hàng có id là' . $id)->error();
            return back();
        }
        DB::beginTransaction();
        try {
            LoyaltyCard::destroy($customer->loyaltyCard->id);
            $customer->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
            \Log::info($e);
            flash("Xóa khách hàng thất bại")->error();
            return back();
        }
        flash('Xóa khách hàng thành công')->success();
        return redirect()->route('customers.index');
    }
}
