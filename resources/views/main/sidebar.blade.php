@php use App\Models\User; @endphp
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="" class="logo">
                <img
                    src="/assets/img/logo (537 x 80 px).png"
                    alt="navbar brand"
                    class="navbar-brand"
                    height="30"
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
                <li class="nav-item {{ request()->routeIs('document.*') || request()->routeIs('folder.*')  ? 'active' : '' }}">
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
                            <li class="{{ request()->routeIs('document.index') ? 'active' : '' }}">
                                <a href="{{ route('document.index') }}">
                                    <span class="sub-item">Danh sách tài liệu</span>
                                </a>
                            </li>
                            @if( auth()->user()->role_type === User::ROLE_AGENT)
                                <li class="{{ request()->routeIs('document.showPrivateDocument') ? 'active' : '' }}">
                                    <a href="{{ route('document.showPrivateDocument') }}">
                                        <span class="sub-item">Tài liêu của tôi</span>
                                    </a>
                                </li>
                            @endif
                            @if( auth()->user()->role_type === User::ROLE_ADMIN)
                                <li class="{{ request()->routeIs('folder.index') ? 'active' : '' }}">
                                    <a href="{{ route('folder.index', 1) }}">
                                        <span class="sub-item">Thư mục tài liệu</span>
                                    </a>
                                </li>
                            @endif
                            @if( auth()->user()->role_type === User::ROLE_AGENT)
                                <li class="{{ request()->routeIs('document.showListRequestForAgent') ? 'active' : '' }}">
                                    <a href="{{ route('document.showListRequestForAgent') }}">
                                        <span class="sub-item">Yêu cầu của bạn</span>
                                    </a>
                                </li>
                            @else
                                <li class="{{ request()->routeIs('document.showListRequestForAdmin') ? 'active' : '' }}">
                                    <a href="{{route('document.showListRequestForAdmin')}}">
                                        <span class="sub-item">Yêu cầu chờ phê duyệt</span>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </li>
                @if(auth()->user()->role_type === User::ROLE_ADMIN)
                    <li class="nav-item {{ request()->routeIs('user.*') ? 'active' : '' }}">
                        <a data-bs-toggle="collapse show" href="#maps">
                            <i class="fas fa-user-cog"></i>
                            <p>Quản lý người dùng</p>
                            <span class="caret"></span>
                        </a>
                        <div class="collapse show" id="maps">
                            <ul class="nav nav-collapse">
                                <li class="{{ request()->routeIs('user.index') ? 'active' : '' }}">
                                    <a href="{{route('user.index')}}">
                                        <span class="sub-item">Danh sách người dùng</span>
                                    </a>
                                </li>
                                <li class="{{ request()->routeIs('user.show_index_comment') ? 'active' : '' }}">
                                    <a href="{{route('user.show_index_comment')}}">
                                        <span class="sub-item">Quản lý bình luận</span>
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
