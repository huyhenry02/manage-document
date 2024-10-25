<ul class="folder-list">
    @foreach($folders as $folder)
        <li>
            <span class="folder" onclick="toggleSubfolder(this)" data-folder-id="{{ $folder['id'] }}">
                <span>
                    <i class="fas fa-folder me-2"></i>{{ $folder['name'] ?? '' }}
                </span>
                <button class="btn btn-link p-0 ms-2" onclick="openCreateSubfolderModal(event, '{{ $folder['id'] }}', '{{ $folder['name'] }}')">
                    <i class="fas fa-plus" style="color:green"></i>
                </button>
                <button class="btn btn-link p-0 ms-2" onclick="confirmDeleteFolder(event, '{{ $folder['id'] }}')">
                    <i class="fas fa-times" style="color:red"></i>
                </button>
            </span>
            @if(!empty($folder['subfolder']))
                <ul class="subfolder">
                    @include('partials.folder-list', ['folders' => $folder['subfolder']])
                </ul>
            @endif
        </li>
    @endforeach
</ul>
