@php use Illuminate\Support\Facades\Route; @endphp
<div class="main-header">
    <div class="main-header-logo">
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
    <!-- Navbar Header -->
    <nav
        class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
    >
        <div class="container-fluid">
            <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex page-header-custom"
            >
                <h3 class="fw-bold mb-3">
                    @switch(Route::currentRouteName())
                        @case('document.index')
                        @case('folder.index')
                        @case('user.index')
                        @case('document.showListRequestForAgent')
                        @case('document.showListRequestForAdmin')
                        @case('document.showPrivateDocument')
                            Danh Sách
                            @break
                        @case('document.create')
                            Thêm mới
                            @break
                        @case('document.detail')
                        @case('document.showRequestPublicDetail')
                        @case('document.showRequestUpdateDetail')
                            Chi tiết
                            @break
                        @case('document.update')
                        @case('document.show_request_update')
                            Sửa thông tin
                            @break

                    @endswitch

                </h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            @switch(Route::currentRouteName())
                                @case('document.index')
                                @case('document.create')
                                @case('document.showListRequestForAgent')
                                @case('document.showListRequestForAdmin')
                                @case('document.showPrivateDocument')
                                @case('document.detail')
                                @case('document.showRequestPublicDetail')
                                @case('document.showRequestUpdateDetail')
                                @case('document.update')
                                @case('document.show_request_update')
                                    Quản lý tài liệu
                                    @break
                                @case('folder.index')
                                    Quản lý thư mục
                                    @break
                                @case('user.index')
                                    Quản lý người dùng
                                    @break

                            @endswitch
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">
                            @switch(Route::currentRouteName())
                                @case('document.index')
                                    Danh Sách tài liệu
                                    @break
                                @case('document.showPrivateDocument')
                                    Tài liệu của tôi
                                    @break
                                @case('document.showListRequestForAgent')
                                    Yêu cầu của bạn
                                    @break
                                @case('document.showListRequestForAdmin')
                                    Yêu cầu chờ phê duyệt
                                    @break
                                @case('document.showRequestUpdateDetail')
                                @case('document.showRequestPublicDetail')
                                    Thông tin yêu cầu
                                    @break
                                @case('document.detail')
                                    Thông tin tài liệu
                                    @break
                                @case('document.create')
                                    Thêm mới tài liệu
                                    @break
                                @case('document.update')
                                @case('document.show_request_update')
                                    Sửa tài liệu
                                    @break
                                @case('folder.index')
                                    Danh sách thư mục
                                    @break
                                @case('user.index')
                                    Danh sách người dùng
                                    @break
                            @endswitch
                        </a>
                    </li>
                </ul>
            </nav>

            <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li class="nav-item topbar-user dropdown hidden-caret">
                    <a
                        class="dropdown-toggle profile-pic"
                        data-bs-toggle="dropdown"
                        href="#"
                        aria-expanded="false"
                    >
                        <div class="avatar-sm">
                            <img
                                src="/assets/img/profile.jpg"
                                alt="..."
                                class="avatar-img rounded-circle"
                            />
                        </div>
                        <span class="profile-username">
                      <span class="op-7">Hi,</span>
                      <span class="fw-bold">{{ auth()->user()->name ?? '' }}</span>
                    </span>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>
                                <div class="user-box">
                                    <div class="avatar-lg">
                                        <img
                                            src="/assets/img/profile.jpg"
                                            alt="image profile"
                                            class="avatar-img rounded"
                                        />
                                    </div>
                                    <div class="u-text">
                                        <h4> {{ auth()->user()->name ?? '' }}</h4>
                                        <p class="text-muted">{{ auth()->user()->email ?? '' }}</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('auth.logout') }}">Đăng xuất</a>
                            </li>
                        </div>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>

<style>
    .page-header-custom {
        margin-top: 15px;
    }
</style>
