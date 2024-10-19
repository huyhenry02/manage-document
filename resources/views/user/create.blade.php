@extends('main.index')
@section('content')
    <div class="page-header">
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thông tin Agent</div>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Tên Agent</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        id="name"
                                        name="name"
                                    />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                        type="email"
                                        class="form-control"
                                        id="email"
                                        name="email"
                                    />
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
        $(document).ready(function () {
            $('#folderTree').select2({
                placeholder: "Chọn thư mục",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endsection
