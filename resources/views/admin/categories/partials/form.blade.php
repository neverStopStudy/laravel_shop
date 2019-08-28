<label for="">Имя категории</label>
{{--{{dd($category)}}--}}
<input type="text" class="form-control " name="title" placeholder="Заголовок категории"
       value="@if(isset($category->title)){{$category->title}}@else {{''}}@endif" required>
{{--<input type="text" class="form-control" name="title" placeholder="Заголовок категории" required>--}}

<label for="">Родительская категория</label>
<select name="parent_id" class="form-control">
    <option value="0">--Без родительской категории--</option>
    @include('admin.categories.partials.categories',['categories'=> $categories])
</select>

<label for="">Status</label>

{{--@foreach($categories as $category_list)--}}
{{--{{dd($category_list->children)}}--}}
{{--@endforeach--}}

<select name="published" class="form-control">

    @if(isset($category->id))
        <option value="0"@if($category->published == 0) selected="" @endif>Не опубликовано</option>
        <option value="1"@if($category->published == 1) selected="" @endif>Опубликовано</option>
    @else
        <option value="0">Не опубликовано</option>
        <option value="1">Опубликовано</option>
    @endif
</select>

<label for="">Slug</label>
<input type="text" class="form-control"  placeholder="Автоматическая генерация"
       disabled>
<input type="text" name="slug" class="form-control" hidden>
<p></p>
<input type="submit" class="btn btn-primary" value="Сохранить">
