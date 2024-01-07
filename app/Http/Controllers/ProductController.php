<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderByDesc('created_at')->get();
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ProductStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
        try {
           Product::create($request->all());
        } catch (\Exception $e) {
            \Log::info($e);
            flash("Thêm mới mặt hàng thất bại")->error();
            return back();
        }

        flash('Thêm mới thông tin mặt hàng thành công!')->success();

        return redirect()->route('products.index');
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
        $product = Product::where('id', $id)->first();
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ProductUpdateRequest $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
        $product = Product::where('id', $id)->first();
        if (empty($product)) {
            flash('Không tồn tại mặt hàng có id là' . $id)->error();
            return back();
        }
        try {
            $product->update($request->all());
        } catch (\Exception $e) {
            \Log::info($e);
            flash("Cập nhật mặt hàng thất bại")->error();
            return back();
        }
        flash('Cập nhật mặt hàng thành công')->success();
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
        if (empty($product)) {
            flash('Không tồn tại mặt hàng có id là' . $id)->error();
            return back();
        }
        try {
            $product->delete();
        } catch (\Exception $e) {
            \Log::info($e);
            flash("Xóa mặt hàng thất bại")->error();
            return back();
        }
        flash('Xóa mặt hàng thành công')->success();
        return redirect()->route('products.index');
    }
}
