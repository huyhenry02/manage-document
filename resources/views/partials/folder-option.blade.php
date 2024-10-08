<option value="{{ $folder['id'] }}" class="level-{{ $level }}">
    <i class="fa fa-folder"></i> {{ str_repeat('—', $level) }} {{ $folder['name'] }}
</option>

@if (!empty($folder['subfolder']))
    @foreach ($folder['subfolder'] as $subfolder)
        @include('partials.folder-option', ['folder' => $subfolder, 'level' => $level + 1])
    @endforeach
@endif
