@extends('layouts.admin')

@section('title', 'Cập nhật Thông tin khách hàng')

@section('breadcrumb')
    @include('layouts.breadcrumb', [
        'items' => [
            [
                'text' => 'Trang chủ',
                'url' => '#'
            ],
            [
            'text' => 'Quản lý Thông tin khách hàng',
            'url' => route('customers.index')
            ],
            [
                'text' => 'Cập nhật Thông tin khách hàng',
            ],
        ]
    ])
@endsection
<div>
    @include('flash::message')
</div>
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title"><b>@yield('title')</b></div>
                        </div>
                        <form id="validation" method="post" action="{{ route('customers.update', $customer->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @include('customers.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        $('#dateofbirth').datetimepicker({
            format: 'DD/MM/YYYY',
        });
    </script>
@endsection
