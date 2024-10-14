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
                                            <td class="text-center">{{ $document->status ?? '' }}</td>
                                            <td class="text-center">
                                                <div class="form-button-action">
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-info"
                                                        href="detail_document.html"
                                                    >
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-danger"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-times"></i>
                                                    </a>
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
                                                <div class="form-button-action">
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-info"
                                                        href="detail_document.html"
                                                    >
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-danger"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-times"></i>
                                                    </a>
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
                                                <div class="form-button-action">
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-info"
                                                        href="detail_document.html"
                                                    >
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-danger"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-times"></i>
                                                    </a>
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
                                                <div class="form-button-action">
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-info"
                                                        href="detail_document.html"
                                                    >
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-danger"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-times"></i>
                                                    </a>
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
                                                <div class="form-button-action">
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-info"
                                                        href="detail_document.html"
                                                    >
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-primary btn-lg"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a
                                                        type="button"
                                                        title=""
                                                        class="btn btn-link btn-danger"
                                                        href="#"
                                                    >
                                                        <i class="fa fa-times"></i>
                                                    </a>
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
<style>
    .input-search-document {
        position: relative;
    }

    .search-input {
        padding-left: 35px; !important;
    }

    .input-search-document input {
        width: 500px;
    }

</style>
