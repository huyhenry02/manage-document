@php use App\Models\User; @endphp
@extends('main.index')
@section('content')
    <div class="page-header d-flex align-items-center">
        <div class="input-search-document position-relative">
            <label>
                <input
                    type="text"
                    placeholder="Tìm kiếm theo tiêu đề hoặc thư mục tài liệu ..."
                    class="form-control search-input"
                />
            </label>
        </div>

        <a
            class="btn btn-primary btn-round ms-auto"
            href="{{ route('document.create') }}"
        >
            <i class="fa fa-plus"></i>
            Thêm mới
        </a>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border"
                        role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="pills-all-tab-nobd" data-bs-toggle="pill"
                               href="#pills-all-nobd" role="tab" aria-controls="pills-all-nobd"
                               aria-selected="true">Tất cả</a>
                        </li>
                        @if( auth()->user()->role_type === User::ROLE_AGENT )
                            <li class="nav-item">
                                <a class="nav-link" id="pills-draft-tab-nobd" data-bs-toggle="pill"
                                   href="#pills-draft-nobd" role="tab" aria-controls="pills-draft-nobd"
                                   aria-selected="false">Bản nháp</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-pending-tab-nobd" data-bs-toggle="pill"
                                   href="#pills-pending-nobd" role="tab" aria-controls="pills-pending-nobd"
                                   aria-selected="false">Chờ duyệt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-approve-tab-nobd" data-bs-toggle="pill"
                                   href="#pills-approve-nobd" role="tab" aria-controls="pills-approve-nobd"
                                   aria-selected="false">Đã duyệt</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-reject-tab-nobd" data-bs-toggle="pill"
                                   href="#pills-reject-nobd" role="tab" aria-controls="pills-reject-nobd"
                                   aria-selected="false">Từ chối</a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                        <div class="tab-pane fade show active" id="pills-all-nobd" role="tabpanel"
                             aria-labelledby="pills-all-tab-nobd">
                            <div class="table-responsive">
                                <table
                                    id="add-row-1"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th class="text-left" style="width: 3%">
                                            <div class="form-check
                                                form-check-inline">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="inlineCheckboxAll1"
                                                    value="option1"
                                                />
                                            </div>
                                        </th>
                                        <th class="text-center">Mã tài liệu</th>
                                        <th class="text-center">Tiêu đề</th>
                                        <th class="text-center">Số bình luận</th>
                                        <th class="text-center">Ngày đăng</th>
                                        <th class="text-center">Người đăng</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center" style="width: 10%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $documents as $document )
                                        <tr>
                                            <td class="text-left" width="5%">
                                                <div class="form-check
                                                form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        value="option1"
                                                    />
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $document->code ?? '' }}</td>
                                            <td class="text-center">{{ $document->title ?? '' }}</td>
                                            <td class="text-center">6</td>
                                            <td class="text-center">{{ $document->created_at ?? '' }}</td>
                                            <td class="text-center">{{ $document->createdBy?->name ?? '' }}</td>
                                            <td class="text-center">{{ $document->status ?? '' }}</td>
                                            <td class="text-center">
                                                <div class="dropdown action-dropdown">
                                                    <button class="btn btn-link dropdown-toggle" type="button"
                                                            id="actionDropdown" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item" href="">
                                                            <i class="fas fa-eye"></i> Xem
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-edit"></i> Sửa
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="fa fa-times"></i> Xóa
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-draft-nobd" role="tabpanel"
                             aria-labelledby="pills-draft-tab-nobd">
                            <div class="table-responsive">
                                <table
                                    id="add-row"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th class="text-left" style="width: 3%">
                                            <div class="form-check
                                                form-check-inline">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="inlineCheckboxAll"
                                                    value="option1"
                                                />
                                            </div>
                                        </th>
                                        <th class="text-center">Mã tài liệu</th>
                                        <th class="text-center">Tiêu đề</th>
                                        <th class="text-center">Số bình luận</th>
                                        <th class="text-center">Ngày đăng</th>
                                        <th class="text-center">Người đăng</th>
                                        <th class="text-center" style="width: 10%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $draftDocuments as $document )
                                        <tr>
                                            <td class="text-left">
                                                <div class="form-check
                                                form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        value="option1"
                                                    />
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $document->code ?? '' }}</td>
                                            <td class="text-center">{{ $document->title ?? '' }}</td>
                                            <td class="text-center">6</td>
                                            <td class="text-center">{{ $document->created_at ?? '' }}</td>
                                            <td class="text-center">{{ $document->createdBy?->name ?? '' }}</td>
                                            <td class="text-center">
                                                <div class="dropdown action-dropdown">
                                                    <button class="btn btn-link dropdown-toggle" type="button"
                                                            id="actionDropdown" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item" href="">
                                                            <i class="fas fa-eye"></i> Xem
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-edit"></i> Sửa
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="fa fa-times"></i> Xóa
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-pending-nobd" role="tabpanel"
                             aria-labelledby="pills-pending-tab-nobd">
                            <div class="table-responsive">
                                <table
                                    id="add-row-2"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th class="text-left" style="width: 3%">
                                            <div class="form-check
                                                form-check-inline">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="inlineCheckboxAll2"
                                                    value="option1"
                                                />
                                            </div>
                                        </th>
                                        <th class="text-center">Mã tài liệu</th>
                                        <th class="text-center">Tiêu đề</th>
                                        <th class="text-center">Số bình luận</th>
                                        <th class="text-center">Ngày đăng</th>
                                        <th class="text-center">Người đăng</th>
                                        <th class="text-center" style="width: 10%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $pendingDocuments as $document )
                                        <tr>
                                            <td class="text-left">
                                                <div class="form-check
                                                form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        value="option1"
                                                    />
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $document->code ?? '' }}</td>
                                            <td class="text-center">{{ $document->title ?? '' }}</td>
                                            <td class="text-center">6</td>
                                            <td class="text-center">{{ $document->created_at ?? '' }}</td>
                                            <td class="text-center">{{ $document->createdBy?->name ?? '' }}</td>
                                            <td class="text-center">
                                                <div class="dropdown action-dropdown">
                                                    <button class="btn btn-link dropdown-toggle" type="button"
                                                            id="actionDropdown" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item" href="">
                                                            <i class="fas fa-eye"></i> Xem
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-edit"></i> Sửa
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="fa fa-times"></i> Xóa
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-approve-nobd" role="tabpanel"
                             aria-labelledby="pills-approve-tab-nobd">
                            <div class="table-responsive">
                                <table
                                    id="add-row-3"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th class="text-left" style="width: 3%">
                                            <div class="form-check
                                                form-check-inline">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="inlineCheckboxAll4"
                                                    value="option1"
                                                />
                                            </div>
                                        </th>
                                        <th class="text-center">Mã tài liệu</th>
                                        <th class="text-center">Tiêu đề</th>
                                        <th class="text-center">Số bình luận</th>
                                        <th class="text-center">Ngày đăng</th>
                                        <th class="text-center">Người đăng</th>
                                        <th class="text-center" style="width: 10%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $activeDocuments as $document )
                                        <tr>
                                            <td class="text-left">
                                                <div class="form-check
                                                form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        value="option1"
                                                    />
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $document->code ?? '' }}</td>
                                            <td class="text-center">{{ $document->title ?? '' }}</td>
                                            <td class="text-center">6</td>
                                            <td class="text-center">{{ $document->created_at ?? '' }}</td>
                                            <td class="text-center">{{ $document->createdBy?->name ?? '' }}</td>
                                            <td class="text-center">
                                                <div class="dropdown action-dropdown">
                                                    <button class="btn btn-link dropdown-toggle" type="button"
                                                            id="actionDropdown" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item" href="">
                                                            <i class="fas fa-eye"></i> Xem
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-edit"></i> Sửa
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="fa fa-times"></i> Xóa
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-reject-nobd" role="tabpanel"
                             aria-labelledby="pills-reject-tab-nobd">
                            <div class="table-responsive">
                                <table
                                    id="add-row-5"
                                    class="display table table-striped table-hover"
                                >
                                    <thead>
                                    <tr>
                                        <th class="text-left" style="width: 3%">
                                            <div class="form-check
                                                form-check-inline">
                                                <input
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    id="inlineCheckboxAll5"
                                                    value="option1"
                                                />
                                            </div>
                                        </th>
                                        <th class="text-center">Mã tài liệu</th>
                                        <th class="text-center">Tiêu đề</th>
                                        <th class="text-center">Số bình luận</th>
                                        <th class="text-center">Ngày đăng</th>
                                        <th class="text-center">Người đăng</th>
                                        <th class="text-center" style="width: 10%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $rejectDocuments as $document )
                                        <tr>
                                            <td class="text-left">
                                                <div class="form-check
                                                form-check-inline">
                                                    <input
                                                        class="form-check-input"
                                                        type="checkbox"
                                                        value="option1"
                                                    />
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $document->code ?? '' }}</td>
                                            <td class="text-center">{{ $document->title ?? '' }}</td>
                                            <td class="text-center">6</td>
                                            <td class="text-center">{{ $document->created_at ?? '' }}</td>
                                            <td class="text-center">{{ $document->createdBy?->name ?? '' }}</td>
                                            <td class="text-center">
                                                <div class="dropdown action-dropdown">
                                                    <button class="btn btn-link dropdown-toggle" type="button"
                                                            id="actionDropdown" data-toggle="dropdown"
                                                            aria-haspopup="true" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="actionDropdown">
                                                        <a class="dropdown-item" href="">
                                                            <i class="fas fa-eye"></i> Xem
                                                        </a>
                                                        <a class="dropdown-item" href="#">
                                                            <i class="fa fa-edit"></i> Sửa
                                                        </a>
                                                        <a class="dropdown-item text-danger" href="#">
                                                            <i class="fa fa-times"></i> Xóa
                                                        </a>
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
    <style>
        .input-search-document {
            position: relative;
        }

        .search-input {
            padding-left: 35px;
        !important;
        }

        .input-search-document input {
            width: 500px;
        }

        .action-dropdown .dropdown-toggle {
            background: none;
            border: none;
            color: #6c757d;
            font-size: 18px;
            transition: color 0.2s;
        }

        .action-dropdown .dropdown-toggle:hover {
            color: #343a40;
        }

        .action-dropdown .dropdown-menu {
            padding: 8px 0;
            border-radius: 6px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            border: none;
            min-width: 120px;
        }

        .action-dropdown .dropdown-item {
            display: flex;
            align-items: center;
            padding: 8px 12px;
            font-size: 14px;
            color: #212529;
            transition: background-color 0.2s, color 0.2s;
        }

        .action-dropdown .dropdown-item i {
            margin-right: 8px;
            font-size: 16px;
        }

        .action-dropdown .dropdown-item:hover {
            background-color: #f8f9fa;
            color: #007bff;
        }

        .action-dropdown .dropdown-item.text-danger {
            color: #dc3545;
        }

        .action-dropdown .dropdown-item.text-danger:hover {
            color: #c82333;
        }


    </style>
@endsection

