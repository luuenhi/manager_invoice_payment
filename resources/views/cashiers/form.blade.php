<div class="card-body">
<div class="form-group form-show-validation row @error('email') has-error @enderror">
        <label for="email" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Email
            <span class="required-label">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="email" name="email" placeholder="Nhập email" value="{{ old('email', isset($cashier->email) ? $cashier->email : null) }}">
            @error('email')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
    @if (!isset($cashier))
        <div class="form-group form-show-validation row @error('password') has-error @enderror">
            <label for="password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Mật khẩu
                <span class="required-label">*</span>
            </label>
            <div class="col-lg-6 col-md-9 col-sm-8">
                <input type="password" class="form-control" id="password" name="password">
                @error('password')
                <label class="error">{{ $message }}</label>
                @enderror
            </div>
        </div>
        <div class="form-group form-show-validation row @error('confirm_password') has-error @enderror">
            <label for="confirm_password" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Xác nhận Mật khẩu
                <span class="required-label">*</span>
            </label>
            <div class="col-lg-6 col-md-9 col-sm-8">
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
                @error('confirm_password')
                <label class="error">{{ $message }}</label>
                @enderror
            </div>
        </div>
    @endif
    <div class="form-group form-show-validation row @error('cas_name') has-error @enderror">
        <label for="cas_name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Tên người dùng
            <span class="required-label">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="cas_name" name="cas_name" placeholder="Nhập người dùng" value="{{ old('cas_name', isset($cashier->cas_name) ? $cashier->cas_name : null) }}">
            @error('cas_name')
            <label class="error">{{ $message }}</label>
            @enderror
        </div>
    </div>
    <div class="form-group form-show-validation row @error('phone') has-error @enderror">
        <label for="phone" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Số điện thoại
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập số điện thoại" value="{{ old('phone', isset($cashier->phone) ? $cashier->phone : null) }}">
            @error('phone')
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
                <input type="text" class="form-control" id="dateofbirth" name="dateofbirth" value="{{ old('dateofbirth', isset($cashier->dateofbirth) ? $cashier->dateofbirth->format('d/m/Y') : now()->format('d/m/Y')) }}">
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
            <a class="btn btn-default" href="{{ route('cashiers.index') }}">
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
