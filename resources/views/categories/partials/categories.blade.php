
@foreach($categories as $category_list)
    @if(!isset($delimeter))
        @if($category_list->parent_id == 0)
            {{$delimeter = ' '}}
        @else
            {{$delimeter = ' - '}}
        @endif
    @endif
    <option value="{{$category_list->id}}"
        @isset($category->id)
            @if($category->parent_id == $category_list->id)
                selected=""
            @endif
            @if ($category->id == $category_list->id)
                hidden=""
            @endif
        @endisset
    >
        {!! $delimeter !!}{{$category_list->title }}
    </option>

    @if (count($category_list->children) > 0)
        @include('categories.partials.categories',[
        'categories' => $category_list->children,
        'delimeter'  => ' - ' . $delimeter
        ])
    @endif
@endforeach
