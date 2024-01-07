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
            ],
        ]
    ])
@endsection

@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"><b>@yield('title')</b></h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <a href="{{ route('invoices.create') }}" class="btn btn-primary btn-round ml-auto mb-3">
                                        <i class="fa fa-plus"></i>Thêm mới
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="banner-datatables" class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã đơn hàng</th>
                                        <th>Số điểm khách dùng</th>
                                        <th>Ngày thanh toán</th>
                                        <th>Tên khách hàng</th>
                                        <th>Tên nhân viên</th>
                                        <th width="15%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($invoices as $key => $invoice)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $invoice->invoice_code }}</td>
                                            <td>{{ $invoice->point_used }}</td>
                                            <td>{{ ($invoice->invoice_date)->format('d-m-Y') }}</td>
                                            <td>{{ $invoice->customer->cus_name }}</td>
                                            <td>{{ $invoice->cashier->cas_name }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('invoices.detail', $invoice->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Chi tiết">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script>
        $(document).ready(function () {
            $('#banner-datatables').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Vietnamese.json"
                }
            });
        });
    </script>
@endsection
