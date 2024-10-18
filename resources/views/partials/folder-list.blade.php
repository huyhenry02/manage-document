<ul class="folder-list">
    @foreach($folders as $folder)
        <li>
            <span class="folder" onclick="toggleSubfolder(this)" data-folder-id="{{ $folder['id'] }}"
                  oncontextmenu="openCreateSubfolderModal(event, '{{$folder['id']}}', '{{$folder['name']}}')">
                <i class="fas fa-folder me-2"></i>{{ $folder['name']  ?? '' }}
            </span>
            @if(!empty($folder['subfolder']))
                <ul class="subfolder">
                    @include('partials.folder-list', ['folders' => $folder['subfolder']])
                </ul>
            @endif
        </li>
    @endforeach
</ul>
