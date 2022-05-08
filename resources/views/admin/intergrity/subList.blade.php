<li class="tree-content">
    <a href="{{ $subChild->url ?? '#' }}" class="text-secondary">{{ $subChild->name }}</a>
    <span class="ml-5" style="margin-left:20px;">
        @isset($subChild->file)<a class="" style="margin-right: 5px;" href="{{ route('app.intergrities.showPDF',$subChild->id) }}" target="_blank"><i class="fas fa-eye" data-toggle="tooltip" title="View PDF"></i></a>@endisset
        @canany(['update', 'delete'], $subChild)
        <a class="" style="margin-right: 5px;"  href="{{ route('app.intergrities.edit', $subChild->id)}}"><i class="fas fa-pencil-alt" data-toggle="tooltip" title="Edit"></i></a>
        <a class="" style="margin-right: 5px; cursor: pointer;"  onclick="deleteData({{ $subChild->id }})"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
        <form id="delete-form-{{ $subChild->id }}" action="{{ route('app.intergrities.destroy',$subChild->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
        @endcanany
        <a class="text-success" style="margin-right: 5px;"  href="{{ route('app.intergrities.edit', $subChild->id)}}"><i class="fas fa-plus-square" data-toggle="tooltip" title="Add"></i></a>
    </span>
</li>
@if ($subChild->children)
    <ul>
        @foreach ($subChild->children as $childList)
            @include('admin.intergrity.subList', ['subChild' => $childList])
        @endforeach
    </ul>
@endif
