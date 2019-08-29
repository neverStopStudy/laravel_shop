@extends('layouts.app')

{{--@extends('header')--}}
@section('content')
    <div class="container">
        <h3>Добавить продукт</h3>
        <div class="row">
            <div class="col-md-10">
                <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <p class="form-text">Название товара</p>
                        <input type="text" class="form-control" name="name" required value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <p class="form-text">Описание товара</p>
                        <textarea name="description" id="" cols="20" rows="5" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <p class="form-text">Цена</p>
                        <input type="text" class="form-control-sm" name="price">
                    </div>
{{--                    {{dd(\App\ProductCategorie::all())}}--}}
                    <div class="form-group">
                            <label for="">Родительская категория</label>
                            <select name="category_id" class="form-control">
                                <option value="0">--Без родительской категории--</option>
                                @include('admin.categories.partials.categories',['categories'=> \App\ProductCategorie::all()])
{{--                                @include('categories.partials.categories')--}}
                            </select>
                    </div>
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
