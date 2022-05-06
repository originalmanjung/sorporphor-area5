<div class="col" style="margin-bottom: 50px;">
    <div class="card-body">
        <h5 class="card-title">{{ $subChild->name }}</h5>
    </div>
    <div class="card h-100">
        @if(empty($subChild->file))
        <strong class="text-center pt-5 text-muted">ไม่พบไฟล์ข้อมูล</strong>
        @else
        <iframe class="vh-100" style="height: 100%" height="100%" width=100% src="{{ asset('storage/intergrity_files/'.$subChild->file) }}"></iframe>
        @endif
    </div>
</div>
@if ($subChild->children)
    @foreach ($subChild->children as $childList)
        @include('intergrity-plane-menual.intergritySub', ['subChild' => $childList])
    @endforeach
@endif
