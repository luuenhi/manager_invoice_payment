@extends('layouts.admin')

@section('title', 'Thêm mới Tài khoản nhân viên')

@section('breadcrumb')
    @include('layouts.breadcrumb', [
        'items' => [
            [
                'text' => 'Trang chủ',
                'url' => '#'
            ],
            [
            'text' => 'Quản lý Tài khoản nhân viên',
            'url' => route('cashiers.index')
            ],
            [
                'text' => 'Thêm mới Tài khoản nhân viên',
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
                        <form id="validation" method="post" action="{{ route('cashiers.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('cashiers.form')
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
