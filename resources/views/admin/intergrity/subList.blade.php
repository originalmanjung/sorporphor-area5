<li class="tree-content">
    <a href="{{ $subChild->url ?? '#' }}" class="text-secondary">{{ $subChild->name }}</a>
    <span class="ml-5" style="margin-left:20px;">
        @isset($subChild->file)<a class="" href="{{ route('app.intergrities.showPDF',$subChild->id) }}" target="_blank"><i class="fas fa-file-pdf"></i></a>@endisset
        @canany(['update', 'delete'], $subChild)
        <a class=""  href="{{ route('app.intergrities.edit', $subChild->id)}}"><i class="fas fa-edit"></i></a>
        <a class=""  onclick="deleteData({{ $subChild->id }})" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
        <form id="delete-form-{{ $subChild->id }}" action="{{ route('app.intergrities.destroy',$subChild->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        @endcanany
    </span>
</li>
@if ($subChild->children)
    <ul>
        @foreach ($subChild->children as $childList)
            @include('admin.intergrity.subList', ['subChild' => $childList])
        @endforeach
    </ul>
@endif
