@extends('layouts.admin')

@section('title', 'Quản lý hóa đơn')

@section('breadcrumb')
    @include('layouts.breadcrumb', [
        'items' => [
            [
                'text' => 'Trang chủ',
                'url' => '#'
            ],
            [
                'text' => 'Quản lý hóa đơn',
                'url' => route('invoices.index')
            ],
            [
                'text' => 'Chi tiết Hóa đơn',
            ],
        ]
    ])
@endsection

@section('inline_css')

   <style>
    /* Style for the container of order details */
    .order-details-customer-info {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 8px;
        }

        /* Style for the individual list items */
        .order-details-customer-info ul li {
            list-style: none;
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        /* Style for spans within list items */
        .order-details-customer-info ul li span {
            font-weight: bold;
        }

        /* Add some spacing between the sections */
        .order-details-customer-info .mb-20 {
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('content')
<!--Invoices Details Head Start-->
<div class="col-12 mb-30">
    <div class="row mbn-15">
        <div class="col-12 col-md-4 mb-15">
            <h4 class="text-primary fw-600 m-0">Invoices ID# {{ $invoice->invoice_code }}</h4>
        </div>
        <div class="col-12 col-md-4 mb-15">
        </div>
        <div class="text-left text-md-right col-12 col-md-4 mb-15">
            Thời gian thanh toán: <p>{{ $invoice->invoice_date->format('d-m-Y') }}</p>
        </div>
    </div>
</div>
<!--Order Details Head End-->

<!-- Order Details Customer Information Start -->
<h4 class="mb-25">Thông tin đơn hàng</h4>

<div class="col-12 mb-30">
    <div class="order-details-customer-info row mbn-20">

        <!-- Billing Info Start -->
        <div class="col-lg-4 col-md-6 col-12 mb-20">
            <ul>
                <li><span>Tên khách hàng</span><span>{{ $invoice->customer->cus_name }}</span></li>
                <li><span>SĐT</span><span>{{ $invoice->customer->phone }}</span></li>
                <li><span>Địa chỉ</span><span>{{ $invoice->customer->address }}</span></li>
                <li><span>Tên nhân viên</span><span>{{ $invoice->cashier->cas_name }}</span></li>
            </ul>
        </div>
        <!-- Billing Info End -->

        <div  class="col-lg-4 col-md-6 col-12 mb-20"></div>
        <!-- Purchase Info Start -->
        <div class="col-lg-4 col-md-6 col-12 mb-20">
            <ul>
                <?php
                $count = 0;
                $total = 0;
                $priceByPoint = 0;
                if ($invoice->point_used) {
                    $priceByPoint = (int)($invoice->point_used) * 1000;
                }
                foreach ($invoice->invoiceDetails as $invoiceDetail) {
                    $count += $invoiceDetail->quantity;
                    $total += $invoiceDetail->price_now * $invoiceDetail->quantity;
                }
                $total = $total - $priceByPoint;
                ?>
                <li><span>Số điểm khách hàng sử dụng</span><span>{{ $invoice->point_used }}</span></li>
                <li><span>Số mặt hàng</span><span>{{ $invoice->invoiceDetails->count() }}</span></li>
                <li><span>Tổng số lượng</span><span>{{ $count }}</span></li>
                <li><span>Tổng tiền</span><span>{{ $total }} VND</span></li>
            </ul>
        </div>
        <!-- Purchase Info End -->

    </div>
</div>
<!-- Order Details Customer Information End -->

<!--Order Details List Start-->
<div class="col-12 mb-30">
    <div class="table-responsive">
        <table class="table table-bordered table-vertical-middle">
            <thead>
                <tr>
                    <th>Tên hàng</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->invoiceDetails as $invoiceDetail)
                    <tr>
                        <td>{{ $invoiceDetail->product->product_name }}</td>
                        <td>{{ $invoiceDetail->price_now }}</td>
                        <td>{{ $invoiceDetail->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!--Order Details List End-->
@endsection