@extends('main.index')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div class="action-buttons">
                        <a href="#" class="btn btn-outline-primary me-2"><i class="fa fa-plus"></i> Thêm thư mục</a>
                        <a href="#" class="btn btn-outline-secondary me-2"><i class="fas fa-pen"></i> Sửa thư mục</a>
                        <a href="#" class="btn btn-outline-danger me-2"><i class="fas fa-trash-alt"></i> Xóa thư mục</a>
                        <a href="#" class="btn btn-outline-info me-2"><i class="fas fa-th-large"></i> Di chuyển bài viết</a>
                        <a href="#" class="btn btn-outline-success me-2"><i class="fas fa-times"></i> Bỏ bài viết khỏi thư mục</a>
                    </div>
                    <div class="input-search-category">
                        <label>
                            <input type="text" placeholder="Tìm kiếm theo tiêu đề hoặc thư mục tài liệu  ..." class="form-control" />
                        </label>
                    </div>
                </div>

                <div class="card-body d-flex">
                    <div class="list-categories">
                        <ul class="folder-list">
                            <li>
                <span class="folder" onclick="toggleSubfolder(this)">
                    <i class="fas fa-folder me-2"></i>Folder 1
                </span>
                                <ul class="subfolder">
                                    <li>
                        <span class="folder" onclick="toggleSubfolder(this)">
                            <i class="fas fa-folder me-2"></i>Subfolder 1.1
                        </span>
                                        <ul class="subfolder">
                                            <li><i class="fas fa-folder me-2"></i>Subfolder 1.1.1</li>
                                            <li><i class="fas fa-folder me-2"></i>Subfolder 1.1.2</li>
                                        </ul>
                                    </li>
                                    <li><i class="fas fa-folder me-2"></i>Subfolder 1.2</li>
                                </ul>
                            </li>
                            <li>
                                            <span class="folder" onclick="toggleSubfolder(this)">
                                                            <i class="fas fa-folder me-2"></i>Folder 2
                                                </span>
                                <ul class="subfolder">
                                    <li><i class="fas fa-folder me-2"></i>Subfolder 2.1</li>
                                    <li><i class="fas fa-folder me-2"></i>Subfolder 2.2</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="list-document-of-category">
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="Tìm kiếm theo tiêu đề tài liệu ...">
                        </div>

                        <div class="list-group">
                            <div class="list-group-item">
                                <input type="checkbox" class="form-check-input me-2">
                                <label>Tất cả thư mục đang chọn</label>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <input type="checkbox" class="form-check-input me-2">
                                <a href="/assets/example-file/K56SD3_20D191141_Vũ Thị Hải Yến__KLTN.pdf"
                                   download class="file-link d-flex align-items-center">
                                    <i class="fas fa-file-download me-2"></i>
                                    <span>File 1</span>
                                </a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <input type="checkbox" class="form-check-input me-2">
                                <a href="/assets/example-file/K56SD3_20D191141_Vũ Thị Hải Yến__KLTN.pdf"
                                   download class="file-link d-flex align-items-center">
                                    <i class="fas fa-file-download me-2"></i>
                                    <span>File 2</span>
                                </a>
                            </div>
                            <div class="list-group-item d-flex align-items-center">
                                <input type="checkbox" class="form-check-input me-2">
                                <a href="/assets/example-file/K56SD3_20D191141_Vũ Thị Hải Yến__KLTN.pdf"
                                   download class="file-link d-flex align-items-center">
                                    <i class="fas fa-file-download me-2"></i>
                                    <span>File 3</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
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
        display: block;
        padding: 6px 0;
        color: #007bff;
    }

    .folder i {
        margin-right: 8px;
    }

    .folder:hover {
        color: #0056b3;
        text-decoration: underline;
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

</style>
<script>
    function toggleSubfolder(element) {
        var subfolder = element.nextElementSibling;
        if (subfolder.style.display === "block") {
            subfolder.style.display = "none";
            element.querySelector("i").classList.replace("fa-folder-open", "fa-folder");
        } else {
            subfolder.style.display = "block";
            element.querySelector("i").classList.replace("fa-folder", "fa-folder-open");
        }
    }
</script>
