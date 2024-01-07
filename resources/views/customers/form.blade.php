<div class="card-body">
    <div class="form-group form-show-validation row @error('cus_name') has-error @enderror">
        <label for="cus_name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tên người dùng
            <span class="required-label">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="cus_name" name="cus_name" placeholder="Nhập người dùng" value="{{ old('cus_name', isset($customer->cus_name) ? $customer->cus_name : null) }}">
            @error('cus_name')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="form-group form-show-validation row @error('phone') has-error @enderror">
        <label for="phone" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Số điện thoại
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone', isset($customer->phone) ? $customer->phone : null) }}">
            @error('phone')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="form-group form-show-validation row @error('address') has-error @enderror">
        <label for="address" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Địa chỉ
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="address" name="address" placeholder="Nhập địa chỉ" value="{{ old('address', isset($customer->address) ? $customer->address : null) }}">
            @error('address')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="form-group form-show-validation row @error('dateofbirth') has-error @enderror">
        <label for="dateofbirth" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Ngày sinh
            <span class="required-label">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <div class="input-group">
                <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth', isset($customer->dateofbirth) ? $customer->dateofbirth->format('d/m/Y') : now()->format('d/m/Y')) }}">
                @error('dateofbirth')
                <label class="error">{{ $message }}</label>
                @enderror
                <div class="input-group-append">
                    <span class="input-group-text">
                        <i class="fa fa-calendar"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-action">
    <div class="form-group row">
        <label class="col-lg-3"></label>
        <div class="col-lg-6">
            <a class="btn btn-default" href="{{ route('customers.index') }}">
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
