@php use App\Models\DocumentAction; @endphp
@extends('main.index')
@section('content')
    <div class="page-header d-flex align-items-center">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                        <div class="tab-pane fade show active" id="pills-all-nobd" role="tabpanel"
                             aria-labelledby="pills-all-tab-nobd">
                            <div class="table-responsive">
                                <div class="table-responsive">
                                    <table
                                        id="add-row-1"
                                        class="display table table-striped table-hover"
                                    >
                                        <thead>
                                        <tr>
                                            <th class="text-center">STT</th>
                                            <th class="text-center">Hành động</th>
                                            <th class="text-center">Lý do</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Thời gian</th>
                                            <th class="text-center" style="width: 10%">Hành động</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach( $requests as $key => $request )
                                            <tr>
                                                <td class="text-center">{{ $key + 1 }}</td>
                                                @switch( $request->action )
                                                    @case( DocumentAction::ACTION_PUBLIC_DOCUMENT)
                                                        <td class="text-center">Công khai tài liệu</td>
                                                        @break
                                                    @case( DocumentAction::ACTION_EDIT_DOCUMENT)
                                                        <td class="text-center">Yêu cầu chỉnh sửa tài liệu</td>
                                                        @break
                                                @endswitch
                                                <td class="text-center">{{ $request->reason ?? '' }}</td>
                                                @switch( $request->status )
                                                    @case( DocumentAction::STATUS_PENDING)
                                                        <td class="text-center text-primary">Chờ xác nhận</td>
                                                        @break
                                                    @case( DocumentAction::STATUS_APPROVED )
                                                        <td class="text-center text-success">Đã xác nhận</td>
                                                        @break
                                                    @case( DocumentAction::STATUS_REJECTED )
                                                        <td class="text-center text-danger">Từ chối</td>
                                                        @break
                                                @endswitch
                                                <td class="text-center">{{ $request->created_at ?? '' }}</td>
                                                <td class="text-center text-primary">
                                                    @if( $request->action === DocumentAction::ACTION_PUBLIC_DOCUMENT )
                                                        <a class="dropdown-item"
                                                           href="{{ route('document.showRequestPublicDetail', $request->id) }}">
                                                            <i class="fas fa-eye"></i> Xem
                                                        </a>
                                                    @else
                                                        <a class="dropdown-item"
                                                           href="{{ route('document.showRequestUpdateDetail', $request->id) }}">
                                                            <i class="fas fa-eye"></i> Xem
                                                        </a>
                                                    @endif
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

