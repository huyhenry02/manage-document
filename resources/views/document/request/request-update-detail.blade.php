@php use App\Models\User;use App\Models\DocumentAction; @endphp
@extends('main.index')
@section('content')
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex">
                    <h4 class="card-title text-center">Thông tin chính</h4>
                    @if( $documentAction->status === DocumentAction::STATUS_PENDING && auth()->user()->role_type === User::ROLE_ADMIN )
                        <button class="btn btn-secondary" id="approved-document-btn">
                            <i class="fa fa-check"></i>
                            Phê duyệt
                        </button>
                    @endif
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
                                        {{ $document->code ?? '' }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px !important;">
                                    <p>Tiêu đề</p>
                                </td>
                                <td style="padding: 5px !important;">
                                    <p class="text-muted">
                                        {{ $dataUpdate['title'] ?? '' }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px !important;">
                                    <p>Thời gian đăng tải</p>
                                </td>
                                <td style="padding: 5px !important;">
                                    <p class="text-muted">
                                        {{ $document->created_at->format('H:i d/m/Y') ?? '' }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px !important;">
                                    <p>Người yêu cầu</p>
                                </td>
                                <td style="padding: 5px !important;">
                                    <p class="text-muted">
                                        {{ $documentAction->createdBy->name ?? '' }}
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 5px !important;">
                                    <p>Lý do</p>
                                </td>
                                <td style="padding: 5px !important;">
                                    <p class="text-muted">
                                        {{ $documentAction->reason ?? '' }}
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
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-typo" style="width: 100%">
                                        <tbody>
                                        <tr>
                                            <td style="padding: 5px !important; vertical-align: middle;">
                                                <p>Thư mục</p>
                                            </td>
                                            <td style="padding: 5px !important; vertical-align: middle; max-width: 300px">
                                                <p class="text-muted">
                                                    {{ $document?->folder->name ?? '' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr class="file-attachments">
                                            <td style="padding: 5px !important;">
                                                <p>Tệp đính kèm</p>
                                            </td>
                                            <td style="padding: 5px !important; max-width: 300px">
                                                @if( !empty($document->attachmentFiles) && count($document->attachmentFiles) > 0 )
                                                    <table style="width: 100%">
                                                        <tbody>
                                                        @foreach( $document->attachmentFiles as $attachment )
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ $attachment->file_path }}" download>
                                                                        <i class="fas fa-file-pdf"></i>
                                                                        <span>{{ $attachment->file_name }}</span>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                @endif

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px !important;">
                                                <p>Nội dung</p>
                                            </td>
                                            <td style="padding: 5px !important; max-width: 300px">
                                                <p class="text-muted
                                                            ">
                                                    {{ $dataUpdate['content'] ?? '' }}
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px !important;">
                                                <p>Ghi chú</p>
                                            </td>
                                            <td style="padding: 5px !important; max-width: 300px">
                                                <p class="text-muted
                                                            ">
                                                    {{ $dataUpdate['note']  ?? '' }}
                                                </p>
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
    <!-- Popup Modal -->
    <div class="modal fade" id="approvedDocumentModal" tabindex="-1" role="dialog"
         aria-labelledby="approvedDocumentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approvedDocumentModalLabel">Xác nhận công khai tài liệu</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('document.confirmRequest', $documentAction->id) }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="action" value="approved">
                        <span>
                            Bạn có chắc chắn muốn phê duyệt chỉnh sửa thông tin tài liệu này không?
                        </span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary">Xác nhận</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#approved-document-btn').on('click', function () {
                $('#approvedDocumentModal').modal('show');
            });
            $('#rejected-document-btn').on('click', function () {
                $('#rejectedDocumentModal').modal('show');
            });

            $('#submit-comment').on('click', function () {
                const documentId = {{ $document->id }};
                const content = $('#comment-content').val();

                $.ajax({
                    url: '{{ route('user.comment') }}',
                    method: 'POST', // Đảm bảo phương thức là POST
                    data: {
                        document_id: documentId,
                        content: content,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        $('#comment-content').val('');

                        const commentsHtml = response.comments.map(comment => `
                    <div class="comment">
                        <p>
                            <strong>${comment.user.name}:</strong> ${comment.content}
                            <span class="comment-time">${new Date(comment.created_at).toLocaleTimeString([], {
                            hour: '2-digit',
                            minute: '2-digit'
                        })} ${new Date(comment.created_at).toLocaleDateString()}</span>
                        </p>
                    </div>
                `).join('');

                        $('#comments-list').html(commentsHtml);
                    },
                    error: function (xhr) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

    </script>
    <style>

        .comments-list {
            max-height: 300px;
            overflow-y: auto;
            margin-bottom: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        .comment {
            margin-bottom: 10px;
            padding: 8px;
            border-bottom: 1px solid #eee;
        }

        .comment p {
            margin: 0;
        }

        .comment-input {
            display: flex;
            flex-direction: column;
        }

        .comment-input textarea {
            resize: none;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            font-size: 1rem;
        }

        .comment-input .submit-comment {
            align-self: flex-end;
            padding: 10px 15px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .comment-input .submit-comment:hover {
            background-color: #0056b3;
        }

        .comment {
            margin-bottom: 15px;
        }

        .comment-time {
            float: right;
            font-size: 0.9em;
            color: #999;
        }

        #approved-document-btn {
            margin-left: auto;
            margin-right: 5px;
        }

        #approvedDocumentModal .modal-header {
            background-color: #2a2f5b;
            color: #fff;
        }

        #approvedDocumentModal .modal-footer {
            display: flex;
            justify-content: space-between;
        }

        #approvedDocumentModal .form-control {
            font-size: 1rem;
            padding: 10px;
        }

    </style>
@endsection
