<style>
    .btn-circle.btn-xl {
        width: 30px;
        /* Đặt kích thước nút (đường kính) */
        height: 30px;
        /* Đặt kích thước nút (đường kính) */
        padding: 0px;
        /* Điều chỉnh padding tùy thuộc vào nhu cầu của bạn */
        border-radius: 50%;
        /* Tạo hình tròn */
        font-size: 15px;
        text-align: center;
    }
</style>
<div class="card-body">
    <div class="form-group form-show-validation row ">
        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Employee
            <span class="required-label">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8 text-start mt-sm-2">
            <p>{{ isset($cashier->cas_name) ? $cashier->cas_name : null }}</p>
        </div>
    </div>
    <div class="form-group form-show-validation row  ">
        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Invoice Code
            <span class="required-label">*</span>
        </label>
        <div class="col-lg-6 col-md-9 col-sm-8 text-start mt-sm-2">
            <p id="invoiceCode">{{ $invoice_code }}</p>
        </div>
    </div>
    <div class="form-group form-show-validation row @error('type') has-error @enderror">
        <label for="type" class="col-lg-3 col-md-6 col-sm-4 mt-sm-2 text-right">Customer
            <span class="required-label">*</span>
        </label>
        <div class="row col-lg-4">
            <div class="col-lg-8 col-md-9 mt-1">
                <!-- Tăng chiều rộng của cột cho select box -->
                <div class="select2-input">
                    <select class="drop-down-choose-customer form-control" id="userDropdown">
                        <option value="" selected></option>
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}" data-info="{{ isset($customer->loyaltyCard) ? $customer->loyaltyCard->point : 0 }}">{{ $customer->cus_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        <label for="type" class="col-lg-5 text-left mt-2" id="scoreLabel">Số điểm</label>

        </div>
    </div>
    <div class="form-group form-show-validation row @error('type') has-error @enderror">
        <label for="type" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right">Product
            <span class="required-label">*</span>
        </label>
        <div class="row col-lg-5">
            <div class="col-lg-6 col-md-8 col-sm-8"> <!-- Tăng chiều rộng của cột cho select box -->
                <div class="select2-input">
                    <select class="drop-down-choose-product form-control" id="productDropdown">
                        <option value="" selected></option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" data-info="{{ $product->price }}">{{ $product->product_name . ' ' . $product->weight_product . ' ' . $product->unit}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-3 col-md-2 col-sm-1"> <!-- Đảm bảo chiều rộng của cột cho button -->
                <button type="button" class="btn btn-success btn-circle btn-xl" onclick="addRow()">+</button>
                @error('type')
                    <label class="error">{{ $message }}</label>
                @enderror
            </div>
        </div>
    </div>

    <div class="form-group form-show-validation row @error('time_total') has-error @enderror">
        <div class="container mt-10">
            <table class="table table-bordered table-striped table-hover bg-white" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Số lượng</th>
                        <th scope="col">Đơn giá</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Thêm các dòng khác nếu cần -->
                </tbody>
            </table>
        </div>
        <div class="col-lg-12 col-md-9 col-sm-8 row" style="white-space: nowrap;display: flex;">
            <p id="totalAmount" style="flex: 1; font-size: 18px; font-weight: bold;">Tổng tiền: 0.00</p>
            <input hidden value="" id="price_total"/>

            <p style="flex:1">Số điểm muốn trừ
                <input id="pointToDeduct" type="number" oninput="calculateChange()" />
            </p>
        </div>
    </div>


    <div class="card-action">
        <div class="form-group row">
            <label class="col-lg-3"></label>
            <div class="col-lg-6">
                <a class="btn btn-default" href="">
                    <span class="btn-label">
                        <i class="fa fa-times"></i>
                    </span>Hủy
                </a>
                <button class="btn btn-primary" id="btnSubmit" >
                    <span class="btn-label">
                        <i class="fas fa-check"></i>
                    </span>Xác nhận
                </button>
            </div>
        </div>
    </div>
