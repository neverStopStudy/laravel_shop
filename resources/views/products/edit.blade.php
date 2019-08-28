@extends('layouts.app')
@section('content')
    <div class="container">
        <h3>Изменить продукт id = {{$product->id}}</h3>
        <div class="row">
            <div class="col-md-10">
                <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <p class="form-text">Название товара</p>
                        <input type="text" class="form-control" name="name" required value="{{$product->name}}">
                    </div>
                    <div class="form-group">
                        <p class="form-text">Описание товара</p>
                        <textarea name="description" id="" cols="20" rows="5" class="form-control">{{$product->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <p class="form-text">Цена</p>
                        <input type="text" class="form-control-sm" name="price" value="{{$product->price}}">
                    </div>

{{--                    <div class="form-group">--}}
{{--                        <label for="">Родительская категория</label>--}}
{{--                        <select name="category_id" class="form-control" selected="{{$product->category_id}}">--}}
{{--                            <option value="0">--Без родительской категории--</option>--}}
{{--                            @include('categories.partials.categories',['categories'=> \App\ProductCategorie::all()])--}}
{{--                        </select>--}}
{{--                    </div>--}}
                    <p>В наличии <input type="checkbox" name="status" checked></p>

                    <div class="form-group">
                        <label>Загрузить фото</label>
                        <input type="file" name="imgs[]" class="form-control-file" multiple >
                    </div>
                    <div class="form-group">
                        <button class="form-control" type="submit" name="submit"> Добавить </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
