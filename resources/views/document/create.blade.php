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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="title">Tiêu đề</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                />
                            </div>
                            <div class="form-group">
                                <label for="category">Thư mục bài viết</label>
                                <select class="form-select" aria-label="Default select example"
                                        id="category">
                                    <option selected>Chọn thư mục</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value=""
                                           id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        Bài viết nổi bật
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label>Nội dung</label>
                                    <textarea style="width: 100%"></textarea>
                                </div>
                                <div class="form-group" style="width: 40%">
                                    <label>Thời gian hiệu lực</label>
                                    <div class="d-flex">
                                        <label for="start_time"></label>
                                        <input id="start_time" class="form-control" type="date"/>
                                        <label for="end_time"></label>
                                        <input id="end_time" class="form-control" type="date"/>
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
                        <button class="btn btn-success">Tạo mới</button>
                        <button class="btn btn-danger">Hủy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
