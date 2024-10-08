@extends('main.index')
@section('content')
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thông tin tài liệu</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('document.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">Tiêu đề</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="title"
                                        name="title"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="folderTree">Thư mục bài viết</label>
                                    <select class="form-select" id="folderTree" aria-label="Default select example" name="folder_id">
                                        <option selected>Chọn thư mục</option>
                                        @foreach ($folderTree as $folder)
                                            @include('partials.folder-option', ['folder' => $folder, 'level' => 0])
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox"
                                               id="flexCheckDefault" value="is_featured">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Bài viết nổi bật
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Nội dung</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="9" name="content"></textarea>
                                    </div>
                                    <div class="form-group" style="width: 40%">
                                        <label>Thời gian hiệu lực</label>
                                        <div class="d-flex">
                                            <label for="start_time"></label>
                                            <input id="start_time" class="form-control" type="date" name="start_time"/>
                                            <label for="end_time"></label>
                                            <input id="end_time" class="form-control" type="date" name="end_time"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="file">File đính kèm</label>
                                        <input type="file" class="form-control" id="file"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-action">
                            <button type="submit" class="btn btn-success">Tạo mới</button>
                            <button class="btn btn-danger">Hủy</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#folderTree').select2({
                placeholder: "Chọn thư mục",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
    <style>
        .form-select option {
            padding-left: 20px;
        }
        .form-select option.level-1 {
            padding-left: 30px;
            font-weight: normal;
        }
        .form-select option.level-2 {
            padding-left: 50px;
            font-style: italic;
            color: #555;
        }
        .form-select option.level-3 {
            padding-left: 70px;
            font-style: italic;
            color: #777;
        }

    </style>
@endsection
