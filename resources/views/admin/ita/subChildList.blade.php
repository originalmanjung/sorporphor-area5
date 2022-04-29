@foreach($subcategories as $subcategory)
        <p data-id="{{$subcategory->id}}" data-parent="{{$dataParent}}" data-level = "{{$dataLevel + 1}}">
            <td data-column="name">{{$subcategory->name}}</td>
        </p>
	    @if(count($subcategory->children))
            @include('admin.ita.subChildList',['subchild' => $subcategory->subcategory, 'dataParent' => $subcategory->id, 'dataLevel' => $dataLevel ])
        @endif
@endforeach