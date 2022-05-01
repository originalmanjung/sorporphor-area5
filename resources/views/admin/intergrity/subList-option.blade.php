<?php $dash.='-- '; ?>
@foreach($subList as $subChild)
<option value="{{ $subChild->id }}" @if(isset($intergrity))
    {{ $intergrity->parent_id == $subChild->id ? 'selected' : '' }} @else
    {{ (collect(old('parent_id'))->contains($subChild->id)) ? 'selected':'' }} @endif>
    {{$dash}}{{ $subChild->name }}</option>
    @if(count($subChild->children))
        @include('admin.intergrity.subList-option',['subList' => $subChild->children])
    @endif
@endforeach
