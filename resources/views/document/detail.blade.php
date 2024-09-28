@extends('main.index')
@section('content')
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 class="card-title text-center">Thông tin chính</h4>
                    <button class="btn btn-success btn-sm ms-5" disabled="disabled">
                        Đang hoạt động
                    </button>
                </div>
                <div class="card-body">
                    <div class="main-information">
                        <table class="table table-main-content">
                            <tbody>
                            <tr>
                                <td style="padding: 5px !important;">
                                    <p>Mã tài liệu</p>
                                </td>
                                <td style="padding: 5px !important;">
                                    <p class="text-muted">
                                        B23232df
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px !important;">
                                    <p>Tiêu đề</p>
                                </td>
                                <td style="padding: 5px !important;">
                                    <p class="text-muted">
                                        Tài liệu ví dụ
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px !important;">
                                    <p>Thời gian đăng tải</p>
                                </td>
                                <td style="padding: 5px !important;">
                                    <p class="text-muted">
                                        12:02:34 21-03-2023
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px !important;">
                                    <p>Người đăng</p>
                                </td>
                                <td style="padding: 5px !important;">
                                    <p class="text-muted">
                                        Admin
                                    </p>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <ul class="nav nav-tabs nav-line nav-color-secondary" id="line-tab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="line-home-tab" data-bs-toggle="pill"
                               href="#line-home" role="tab" aria-controls="pills-home" aria-selected="true">
                                <h4 class="card-title text-center">
                                    Nội dung
                                </h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-profile-tab" data-bs-toggle="pill"
                               href="#line-profile" role="tab" aria-controls="pills-profile"
                               aria-selected="false">
                                <h4 class="card-title text-center">
                                    Thông tin
                                </h4>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="line-contact-tab" data-bs-toggle="pill"
                               href="#line-contact" role="tab" aria-controls="pills-contact"
                               aria-selected="false">
                                <h4 class="card-title text-center">
                                    Lịch sử phê duyệt
                                </h4>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content mt-3 mb-3" id="line-tabContent">
                        <div class="tab-pane fade show active" id="line-home" role="tabpanel"
                             aria-labelledby="line-home-tab">
                            <p>
                                1. Giới thiệu chung về tài liệu <br>
                                Tài liệu này cung cấp cái nhìn tổng quan về cách xây dựng một hệ thống quản
                                lý thông tin hiệu quả trong môi trường doanh nghiệp hiện đại.<br>

                                2. Mục tiêu của tài liệu<br>

                                - Cung cấp hướng dẫn chi tiết cho người đọc về các quy trình và phương pháp
                                xây dựng hệ thống.<br>
                                - Đảm bảo rằng tất cả các bên liên quan đều có cái nhìn rõ ràng về vai trò
                                và trách nhiệm của mình.<br>
                                3. Cấu trúc hệ thống quản lý thông tin<br>

                                - Mô hình hệ thống quản lý thông tin gồm nhiều thành phần khác nhau, được
                                kết nối thông qua một cơ sở dữ liệu trung tâm.<br>
                                - Hệ thống này có khả năng lưu trữ, xử lý và phân tích dữ liệu một cách tự
                                động.<br>
                                4. Các bước triển khai hệ thống<br>

                                - Bước 1: Xác định yêu cầu người dùng.<br>
                                - Bước 2: Thiết kế cơ sở dữ liệu và các chức năng chính.<br>
                                - Bước 3: Triển khai và kiểm thử hệ thống.<br>
                                - Bước 4: Đào tạo người dùng và bảo trì hệ thống sau triển khai.<br>
                                5. Lợi ích của hệ thống quản lý thông tin<br>

                                - Giảm thiểu thời gian xử lý thông tin thủ công.<br>
                                - Nâng cao độ chính xác và hiệu quả trong việc lưu trữ và truy xuất dữ liệu.<br>
                                - Tăng cường khả năng phân tích và dự báo thông qua các công cụ thông
                                minh.<br>

                            </p>
                        </div>
                        <div class="tab-pane fade" id="line-profile" role="tabpanel"
                             aria-labelledby="line-profile-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-typo" style="width: 100%">
                                        <tbody>
                                        <tr>
                                            <td style="padding: 5px !important; vertical-align: middle;">
                                                <p>Loại tài liệu</p>
                                            </td>
                                            <td style="padding: 5px !important; vertical-align: middle;">
                                                <p class="text-muted">
                                                    Tài liệu hướng dẫn
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px !important;">
                                                <p>Thể loại</p>
                                            </td>
                                            <td style="padding: 5px !important;">
                                                <p class="text-muted
                                                            ">
                                                    Hệ thống thông tin
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="file-attachments">
                                            <td style="padding: 5px !important;">
                                                <p>Tệp đính kèm</p>
                                            </td>
                                            <td style="padding: 5px !important;">
                                                <a href="/assets/example-file/K56SD3_20D191141_Vũ%20Thị%20Hải%20Yến__KLTN.pdf"
                                                   class="text-muted" download>File Attachment 1</a><br>
                                                <a href="/assets/example-file/K56SD3_20D191141_Vũ%20Thị%20Hải%20Yến__KLTN.pdf"
                                                   class="text-muted" download>File Attachment 2</a><br>
                                                <a href="/assets/example-file/K56SD3_20D191141_Vũ%20Thị%20Hải%20Yến__KLTN.pdf"
                                                   class="text-muted" download>File Attachment 3</a><br>
                                                <a href="/assets/example-file/K56SD3_20D191141_Vũ%20Thị%20Hải%20Yến__KLTN.pdf"
                                                   class="text-muted" download>File Attachment 4</a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="line-contact" role="tabpanel"
                             aria-labelledby="line-contact-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <!-- Projects table -->
                                        <table class="table align-items-center mb-0">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col">Người thao tác</th>
                                                <th scope="col" class="text-center">Hành động</th>
                                                <th scope="col" class="text-center">Trạng thái</th>
                                                <th scope="col" class="text-center">Thời Gian</th>
                                            </tr>

                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th scope="row">
                                                    <button
                                                        class="btn btn-icon btn-round btn-danger btn-sm me-2"
                                                    >
                                                        <i class="fas fa-times"></i>
                                                    </button>
                                                    Admin
                                                </th>
                                                <td class="text-center">Từ chối</td>
                                                <td class="text-center">
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <td class="text-center">21:05:34 21-03-2024</td>

                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <button
                                                        class="btn btn-icon btn-round btn-success btn-sm me-2"
                                                    >
                                                        <i class="fa fa-check"></i>
                                                    </button>
                                                    Admin
                                                </th>
                                                <td class="text-center">Phê Duyệt</td>
                                                <td class="text-center">
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <td class="text-center">21:05:34 21-03-2024</td>

                                            </tr>
                                            <tr>
                                                <th scope="row">
                                                    <button
                                                        class="btn btn-icon btn-round btn-info btn-sm me-2"
                                                    >
                                                        <i class="fas fa-share"></i>
                                                    </button>
                                                    Admin
                                                </th>
                                                <td class="text-center">Chờ duyệt</td>
                                                <td class="text-center">
                                                    <span class="badge badge-success">Completed</span>
                                                </td>
                                                <td class="text-center">21:05:34 21-03-2024</td>

                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
