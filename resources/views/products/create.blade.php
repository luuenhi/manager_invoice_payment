@extends('layouts.admin')

@section('title', 'Thêm mới Thông tin hàng hóa')

@section('breadcrumb')
    @include('layouts.breadcrumb', [
        'items' => [
            [
                'text' => 'Trang chủ',
                'url' => '#'
            ],
            [
                'text' => 'Quản lý Thông tin hàng hóa',
                'url' => route('products.index')
            ],
            [
                'text' => 'Thêm mới Thông tin hàng hóa',
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
                        <form id="validation" method="post" action="{{ route('products.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('products.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inline_scripts')
    <script type="text/javascript">
        
    </script>
@endsection
