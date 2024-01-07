<div class="sidebar" data-background-color="dark">
    @php
        $user = Auth::user();
    @endphp
    <div class="sidebar-wrapper scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                  <img src="{{ url('/images/user.jpeg') }}" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            {{ $user->cas_name }}
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="#">
                                    <span class="link-collapse">Thông tin</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="link-collapse">Cập nhật thông tin</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a href="{{ route('invoices.index') }}">
                        <i class="fas fa-school"></i>
                        <p>Quản lý Hóa đơn</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('products.index') }}">
                        <i class="fas fa-image"></i>
                        <p>Quản lý sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('customers.index') }}">
                        <i class="fas fa-feather"></i>
                        <p>Quản lý khách hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('cashiers.index') }}">
                        <i class="fas fa-user"></i>
                        <p>Quản lý nhân viên</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
