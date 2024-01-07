<div class="card-body">
    <div class="form-group form-show-validation row @error('product_name') has-error @enderror">
        <label for="product_name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tên mặt hàng
            <span class="required-label">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nhập mặt hàng" value="{{ old('product_name', isset($product->product_name) ? $product->product_name : null) }}">
            @error('product_name')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="form-group form-show-validation row @error('unit') has-error @enderror">
        <label for="unit" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Đơn vị
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="unit" name="unit" placeholder="Nhập Đơn vị" value="{{ old('unit', isset($product->unit) ? $product->unit : null) }}">
            @error('unit')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="form-group form-show-validation row @error('price') has-error @enderror">
        <label for="price" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Giá tiền
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="price" name="price" placeholder="Nhập Giá tiền" value="{{ old('price', isset($product->price) ? $product->price : null) }}">
            @error('price')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="form-group form-show-validation row @error('weight_product') has-error @enderror">
        <label for="weight_product" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Khối lượng tịnh
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="weight_product" name="weight_product" placeholder="Nhập Khối lượng tịnh" value="{{ old('weight_product', isset($product->weight_product) ? $product->weight_product : null) }}">
            @error('weight_product')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
</div>

<div class="card-action">
    <div class="form-group row">
        <label class="col-lg-3"></label>
        <div class="col-lg-6">
            <a class="btn btn-default" href="{{ route('products.index') }}">
                <span class="btn-label">
                    <i class="fa fa-times"></i>
                </span>Hủy
            </a>
            <button class="btn btn-primary" type="submit">
                <span class="btn-label">
                    <i class="fas fa-check"></i>
                </span>Xác nhận
            </button>
        </div>
    </div>
</div>
