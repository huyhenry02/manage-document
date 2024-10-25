@extends('main.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="action-buttons">
                        <button class="btn btn-outline-primary me-2" data-toggle="modal"
                                data-target="#createParentCategory"><i class="fa fa-plus"></i> Thêm thư mục
                        </button>
                        <button class="btn btn-outline-info me-2" id="moveButton"><i
                                class="fas fa-th-large"></i> Di chuyển bài viết
                        </button>
                    </div>
                </div>
                <div class="card-body d-flex">
                    <div class="list-categories">
                        @include('partials.folder-list', ['folders' => $data])
                    </div>
                    <div class="list-document-of-category">
                        @include('partials.documents-of-folder')
                    </div>
                </div>
            </div>

        </div>
    </div>
    {{--MODAL--}}
    @include('modals.create-children-folder')
    @include('modals.create-parent-folder')
    @include('modals.move-document', ['folders' => $folders])
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    function openCreateSubfolderModal(event, parentId, folderName) {
        event.preventDefault();
        document.getElementById('parentFolderName').innerText = folderName;
        document.getElementById('parentFolderId').value = parentId;
        $('#createChildrenCategory').modal('show');
    }

    function toggleSubfolder(element) {
        var subfolder = element.nextElementSibling;
        var folderId = element.getAttribute('data-folder-id');

        if (subfolder && subfolder.classList.contains('subfolder')) {
            if (subfolder.style.display === "block") {
                subfolder.style.display = "none";
                element.querySelector("i").classList.replace("fa-folder-open", "fa-folder");
            } else {
                subfolder.style.display = "block";
                element.querySelector("i").classList.replace("fa-folder", "fa-folder-open");
            }
        } else {
            console.warn("Subfolder element not found for:", element);
        }

        function setupCheckboxes() {
            $('.document-item input[type="checkbox"]').on('change', function () {
                const anyChecked = $('.document-item input[type="checkbox"]:checked').length > 0;
                $('#moveButton').prop('disabled', !anyChecked);
            });

            $('#selectAllCheckbox').on('change', function () {
                const isChecked = $(this).is(':checked');
                $('.document-item input[type="checkbox"]').prop('checked', isChecked).change();
            });
        }

        $.ajax({
            url: '{{ route('folder.documents', ['folder_id' => ':folder_id']) }}'.replace(':folder_id', folderId),
            method: 'GET',
            data: {folder_id: folderId},
            success: function (data) {
                $('.list-document-of-category').html(data);
                setupCheckboxes();
            },
            error: function () {
                console.error("Failed to load documents.");
            }
        });
    }

    $(document).ready(function () {
        function setupCheckboxes() {
            $('.document-item input[type="checkbox"]').on('change', function () {
                const anyChecked = $('.document-item input[type="checkbox"]:checked').length > 0;
                $('#moveButton').prop('disabled', !anyChecked);
            });

            $('#selectAllCheckbox').on('change', function () {
                const isChecked = $(this).is(':checked');
                $('.document-item input[type="checkbox"]').prop('checked', isChecked).change();
            });
        }

        setupCheckboxes();

        $('#moveButton').on('click', function () {
            $('#moveDocumentsModal').modal('show');
        });

        $('#confirmMoveButton').on('click', function () {
            const selectedDocuments = $('.document-item input[type="checkbox"]:checked').map(function () {
                return $(this).val();
            }).get();
            const destinationFolderId = $('input[name="destination_folder"]:checked').val();

            if (selectedDocuments.length > 0 && destinationFolderId) {
                $.ajax({
                    url: '{{ route('folder.moveDocuments') }}',
                    method: 'POST',
                    data: {
                        document_ids: selectedDocuments,
                        folder_id: destinationFolderId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        alert(response.message);
                        $('#moveDocumentsModal').modal('hide');
                    },
                    error: function () {
                        alert('Đã có lỗi xảy ra.');
                    }
                });
            } else {
                alert('Vui lòng chọn ít nhất một tài liệu và một thư mục.');
            }
        });
    });
    function confirmDeleteFolder(event, folderId) {
        event.preventDefault();
        if (confirm('Bạn có chắc chắn muốn xóa thư mục này, và đảm bảo thư mục này rỗng?')) {
            deleteFolder(folderId);
        }
    }

    function deleteFolder(folderId) {
        $.ajax({
            url: '{{ route('folder.delete', ['folder_id' => ':folder_id']) }}'.replace(':folder_id', folderId),
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (response) {
                if (response.success) {
                    alert('Xóa thành công.');
                    location.reload();
                } else {
                    alert(response.message);
                }
            },
            error: function () {
                alert('Xóa không thành công.');
            }
        });
    }
</script>
<style>
    .card-body {
        display: flex;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .list-categories {
        width: 55%;
        border-right: 1px solid #d3d3d3;
        padding-right: 20px;
    }

    .folder-list {
        list-style-type: none;
        padding-left: 0;
    }

    .folder-list li {
        padding: 10px 0;
    }

    .folder {
        font-size: 18px;
        font-weight: 500;
        cursor: pointer;
        position: relative;
        padding: 6px 10px;
        color: #007bff;
        display: flex;
        align-items: center;
    }

    .folder i {
        margin-right: 8px;
    }
    .folder span {
        flex-grow: 1;
    }

    .folder:hover {
        color: #0056b3;
        text-decoration: underline;
        background-color: #e9ecef;
    }

    .subfolder {
        list-style-type: none;
        margin-left: 20px;
        padding-left: 10px;
        border-left: 1px dashed #d3d3d3;
        display: none;
    }

    .list-document-of-category {
        width: 45%;
        padding-left: 20px;
    }

    .form-control {
        border: 1px solid #d3d3d3;
        border-radius: 4px;
        padding: 10px;
        font-size: 14px;
    }

    .list-group {
        background-color: #fff;
        border: 1px solid #d3d3d3;
        border-radius: 4px;
        margin-top: 10px;
    }

    .list-group-item {
        display: flex;
        align-items: center;
        padding: 10px;
        border-bottom: 1px solid #ececec;
        transition: background-color 0.3s;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .list-group-item:hover {
        background-color: #f1f1f1;
        text-decoration: none;
    }

    .form-check-input {
        width: 18px;
        height: 18px;
        margin-right: 10px;
    }

    .me-2 {
        margin-right: 8px;
    }

    .fas {
        color: #007bff;
    }

    .fas.fa-file-download {
        font-size: 18px;
    }

    .list-group-item span {
        font-size: 16px;
        font-weight: 500;
    }

    .folder i {
        color: #ffc107;
    }

    .folder-list li i {
        margin-right: 6px;
    }

    .folder-open i {
        color: #007bff;
    }

    .file-link {
        text-decoration: none;
        color: #000;
        width: 100%;
    }

    .file-link:hover {
        color: #007bff;
        text-decoration: underline;
    }

    .file-link .fas {
        margin-right: 8px;
    }

    .card-header {
        padding: 10px;
    }

    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .input-search-category {
        margin-left: auto;
    }

    .input-search-category input.form-control {
        width: 350px;
        padding: 8px 12px;
        border-radius: 20px;
        border: 1px solid #ced4da;
    }

    .card-header a {
        padding: 6px 10px;
    }

    .form-group label {
        font-weight: 500;
        margin-bottom: 0.5rem;
    }

    .form-control {
        padding: 10px;
        font-size: 1rem;
        border-radius: 6px;
        border: 1px solid #ced4da;
        box-shadow: none;
        transition: border-color 0.3s ease-in-out;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.2);
    }

    .btn-link {
        color: #007bff;
        text-decoration: none;
    }

    .btn-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }
</style>
