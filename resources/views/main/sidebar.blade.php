@php use App\Models\User; @endphp
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="" class="logo">
                <img
                    src="/assets/img/kaiadmin/logo_light.svg"
                    alt="navbar brand"
                    class="navbar-brand"
                    height="20"
                />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">
                <li class="nav-item active">
                    <a
                        data-bs-toggle="collapse"
                        href="#dashboard"
                        class="collapsed"
                        aria-expanded="false"
                    >
                        <i class="fas fa-bars"></i>
                        <p>Quản lý tài liệu</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse show" id="dashboard">
                        <ul class="nav nav-collapse show">
                            <li>
                                <a href="{{route('document.index')}}">
                                    <span class="sub-item">Danh sách tài liệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Tài liêu của tôi</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('folder.index')}}">
                                    <span class="sub-item">Thư mục tài liệu</span>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <span class="sub-item">Yêu cầu phê duyệt</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @if(auth()->user()->role_type === User::ROLE_ADMIN)
                    <li class="nav-item">
                        <a data-bs-toggle="collapse show" href="#maps">
                            <i class="fas fa-user-cog"></i>
                            <p>Quản lý người dùng</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse show" id="maps">
                            <ul class="nav nav-collapse">
                                <li>
                                    <a href="{{route('user.index')}}">
                                        <span class="sub-item">Danh sách người dùng</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</div>
