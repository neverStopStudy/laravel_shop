@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="edit-title">Редактирование категории {{$category->id}}</div>
        <form action="{{route('category.update', $category->id)}}" method="post">
            @method("PUT")
            @csrf
            @include('categories.partials.form')
        </form>
    </div>
@endsection
