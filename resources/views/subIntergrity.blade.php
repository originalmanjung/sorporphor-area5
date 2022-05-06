<li>
    <a href="{{ $subChild->url ?? '#' }}" class="">{{ $subChild->name }}</a>
    @isset($subChild->file)<a class="btn btn-primary btn-sm rounded-3" style="margin-left:3px;" type="button" href="{{ route('app.intergrities.show',$subChild->id) }}" target="_blank"><i class="fas fa-file-pdf"></i></a>@endisset
</li>
@if ($subChild->children)
    <ul>
        @foreach ($subChild->children as $childList)
            @include('subIntergrity', ['subChild' => $childList])
        @endforeach
    </ul>
@endif
