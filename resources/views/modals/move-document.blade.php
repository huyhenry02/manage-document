<div class="modal fade" id="moveDocumentsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chọn thư mục muốn di chuyển</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="folder-list">
                    @foreach( $folders as $folder )
                        <li>
                            <input type="radio" name="destination_folder" value="{{ $folder['id'] }}"> {{ $folder['name'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="confirmMoveButton">Di chuyển</button>
            </div>
        </div>
    </div>
</div>
