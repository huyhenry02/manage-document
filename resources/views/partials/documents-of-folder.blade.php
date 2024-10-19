<div class="mb-3">
    <span class="folder-name">{{ $folder->name }}</span>
</div>
<div class="list-group">
    <div class="list-group-item">
        <input type="checkbox" class="form-check-input me-2" id="selectAllCheckbox">
        <label for="selectAllCheckbox">Tất cả thư mục đang chọn</label>
    </div>
    @foreach( $documents as $document )
        <div class="list-group-item d-flex align-items-center document-item">
            <input type="checkbox" class="form-check-input me-2 document-checkbox" value="{{ $document->id }}">
            <a href="{{ route('document.detail', $document->id) }}" class="file-link d-flex align-items-center">
                <i class="fas fa-file-download me-2"></i>
                <span>{{ $document->title }}</span>
            </a>
        </div>
    @endforeach
</div>

