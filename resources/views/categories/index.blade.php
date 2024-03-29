@extends('layouts.app')

@section('content')
    <div class="btn">
        <a href="{{route('category.create')}}">Добавить категорию</a>
    </div>
    Все категории
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Имя категории</th>
                <th>Кол-во продуктов</th>
                <th>Опубликовано</th>
                <th>Slug</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr>
                    {{--                {{dd($loop)}}--}}
                    <th scope="row">{{$loop->iteration}}</th>
                    <td><a href="{{$category->id}}">{{$category->title}}</a></td>
                    <td>{{count($category->products)}}</td>
                    <td>
                        @if($category->published == 1)
                            <i class="fas fa-check"></i>Опубликовано
                        @else
                            <i class="fas fa-times"></i>Не опубликовано
                        @endif
                    </td>
                    <td>{{$category->slug}}</td>
                    <td>
                        <div class="btn-group">
                            <button class="btn-light">
                                <a href="{{route('category.edit',$category->id)}}">Изменить</a>
                            </button>
                            <button class="btn-danger">
                                <a href="{{route('category.destroy',$category->id)}}">Удалить</a>
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr class="table-warning">
                    <td colspan="5">Категорий не обнаружено! Добавьте категорию!</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
