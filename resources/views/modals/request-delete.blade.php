<!-- Modal xác nhận -->
<div class="modal fade" id="confirmRemoveModal" tabindex="-1" role="dialog" aria-labelledby="confirmRemoveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmRemoveModalLabel">Yêu cầu gỡ tài liệu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="removeDocumentForm" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="reason" class="form-label">Lý do gỡ tài liệu</label>
                        <textarea class="form-control" id="reason" name="reason" rows="4" placeholder="Nhập lý do..."></textarea>
                    </div>
                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="submit" class="btn btn-danger">Gửi yêu cầu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
