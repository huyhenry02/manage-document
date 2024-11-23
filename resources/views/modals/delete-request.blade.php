<div class="modal fade" id="deletedRequestModal" tabindex="-1" role="dialog"
     aria-labelledby="deletedRequestModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deletedRequestModalLabel">Xác nhận hủy yêu cầu</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('document.confirmRequest', $documentAction->id) }}" method="post">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="action" value="approved">
                    <span>
                            Bạn có chắc chắn muốn hủy yêu cầu này không?
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
