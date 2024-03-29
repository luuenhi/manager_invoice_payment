@extends('layouts.admin')

@section('title', 'Quản lý nhân viên')

@section('breadcrumb')
    @include('layouts.breadcrumb', [
        'items' => [
            [
                'text' => 'Trang chủ',
                'url' => '#'
            ],
            [
                'text' => 'Quản lý nhân viên',
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
                                    <a href="{{ route('cashiers.create') }}" class="btn btn-primary btn-round ml-auto mb-3">
                                        <i class="fa fa-plus"></i>Thêm mới
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table id="banner-datatables" class="display table table-striped table-hover">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>email</th>
                                        <th>Tên nhân viên</th>
                                        <th>SĐT</th>
                                        <th>Địa chỉ</th>
                                        <th width="15%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($cashiers as $key => $cashier)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $cashier->email }}</td>
                                            <td>{{ $cashier->cas_name }}</td>
                                            <td>{{ $cashier->phone }}</td>
                                            <td>{{ $cashier->address }}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{ route('cashiers.edit', $cashier->id) }}" type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Cập nhật">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-toggle="modal" data-target="{{ '#deleteModal' . $key }}" class="btn btn-link btn-danger" data-original-title="Xóa">
                                                        <i class="fa fa-times"></i>
                                                    </button>

                                                    <!-- Modal delete -->
                                                    <div class="modal fade" id="{{ 'deleteModal' . $key }}" tabindex="-1" role="dialog" aria-labelledby="bannerpleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="bannerpleModalLabel">Xóa Thông tin nhân viên</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    Bạn có chắc muốn xóa Thông tin nhân viên không?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng
                                                                    </button>
                                                                    <form method="POST" action="{{ route('cashiers.destroy', $cashier->id) }}">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-danger" type="submit">Xóa</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
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
