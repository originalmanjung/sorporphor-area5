@if ($mainParent->parent)
    @include('admin.intergrity.parentNameList', ['mainParent' => $mainParent->parent])
@endif
<ul class="list-group">
    <li class="list-group-item @if(empty($mainParent->parent)) active @endif"><i class="fas fa-level-down-alt"></i> {{ $mainParent->name }}</li>
</ul>



