<li>
    <a href="{{ $subChild->url ?? '#' }}" class="">{{ $subChild->name }}</a>
    @isset($subChild->file)<a class="btn btn-primary btn-sm rounded-3" style="margin-left:3px;" type="button" href="{{ route('app.intergrities.show',$subChild->id) }}" target="_blank"><i class="fas fa-file-pdf"></i></a>@endisset
    @canany(['update', 'delete'], $subChild)
    <a class="btn btn-success btn-sm rounded-3" style="margin-left:3px;" type="button" href="{{ route('app.intergrities.edit', $subChild->id)}}"><i class="fas fa-edit"></i></a>
    <a class="btn btn-danger btn-sm rounded-3" style="margin-left:3px;" type="button" onclick="deleteData({{ $subChild->id }})"><i class="fa fa-trash"></i></a>
    <form id="delete-form-{{ $subChild->id }}" action="{{ route('app.intergrities.destroy',$subChild->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>
    @endcanany
</li>
@if ($subChild->children)
    <ul>
        @foreach ($subChild->children as $childList)
            @include('admin.intergrity.subList', ['subChild' => $childList])
        @endforeach
    </ul>
@endif
