<?php

namespace App\Http\Controllers;

use App\Http\Requests\CashierStoreRequest;
use App\Http\Requests\CashierUpdateRequest;
use App\Models\Cashier;
use Carbon\Carbon; 
use Illuminate\Support\Facades\Hash;

class CashierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cashiers = Cashier::orderByDesc('created_at')->get();
        return view('cashiers.index', compact('cashiers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cashiers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CashierStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CashierStoreRequest $request)
    {
        try {
            $params = $request->all();
            $params['password'] = Hash::make($params['password']);
            $params['dateofbirth'] = Carbon::createFromFormat('d/m/Y', $params['dateofbirth']);
            unset($params['confirm_password']);
            // dd($params);
            Cashier::create($params);
        } catch (\Exception $e) {
            \Log::info($e);
            flash("Thêm mới nhân viên thất bại")->error();
            return back();
        }

        flash('Thêm mới thông tin nhân viên thành công!')->success();

        return redirect()->route('cashiers.index');
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
        $cashier = Cashier::where('id', $id)->first();
        return view('cashiers.edit', compact('cashier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CashierUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CashierUpdateRequest $request, $id)
    {
        $cashier = Cashier::where('id', $id)->first();
        if (empty($cashier)) {
            flash('Không tồn tại nhân viên có id là' . $id)->error();
            return back();
        }
        try {
            $params = $request->all();
            $params['dateofbirth'] = Carbon::createFromFormat('d/m/Y', $params['dateofbirth']);
            $cashier->update($params);
        } catch (\Exception $e) {
            \Log::info($e);
            flash("Cập nhật nhân viên thất bại")->error();
            return back();
        }
        flash('Cập nhật nhân viên thành công')->success();
        return redirect()->route('cashiers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cashier = Cashier::where('id', $id)->first();
        if (empty($cashier)) {
            flash('Không tồn tại nhân viên có id là' . $id)->error();
            return back();
        }
        try {
            $cashier->delete();
        } catch (\Exception $e) {
            \Log::info($e);
            flash("Xóa nhân viên thất bại")->error();
            return back();
        }
        flash('Xóa nhân viên thành công')->success();
        return redirect()->route('cashiers.index');
    }
}
