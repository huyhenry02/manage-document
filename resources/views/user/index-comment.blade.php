@extends('main.index')
@section('content')
    <div class="page-header d-flex align-items-center">
        <div class="input-search-document position-relative">
            <label>
                <input
                    type="text"
                    placeholder="Tìm kiếm bình luận ..."
                    class="form-control search-input"
                />
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
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
                                        <th class="text-center" style="width: 3%">
                                            STT
                                        </th>
                                        <th class="text-center">Người bình luận</th>
                                        <th class="text-center">Tài liệu</th>
                                        <th class="text-center">Nội dung</th>
                                        <th class="text-center">Thời gian đăng</th>
                                        <th class="text-center" style="width: 10%">Hành động</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach( $comments as $key => $val )
                                        <tr>
                                            <td class="text-center" width="5%">
                                               {{ $key + 1 }}
                                            </td>
                                            <td class="text-center">
                                                {{ $val->user?->name ?? '' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $val->document?->title ?? '' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $val->content ?? '' }}
                                            </td>
                                            <td class="text-center">
                                                {{ $val->created_at->format('H:i d/m/Y') ?? '' }}
                                            </td>
                                            <td class="text-center text-primary">
                                                <a class="dropdown-item"
                                                   href="{{ route('document.detail', $val->document_id) }}">
                                                    <i class="fas fa-eye"></i> Xem
                                                </a>
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
