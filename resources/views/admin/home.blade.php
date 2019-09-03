@extends('admin.layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link" href="#">Active</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="{{route('admin.product.index')}}"
                       role="button" aria-haspopup="true" aria-expanded="false">Продукты</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="{{route('admin.product.index')}}">Список продуктов</a>
                        <a class="dropdown-item" href="{{route('admin.product.create')}}">Добавить продукт</a>
                        <a class="dropdown-item" href="#">Статистика</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.category.index')}}">Категории</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.purchase.index')}}">Заказы</a>
                </li>
            </ul>
        </div>

    </div>
    <div class="col-md-12">
        <div class="col-md-3">
            <div class="jumbotron">
                Всего кол-во пользователей: {{count(\App\User::all())}}
            </div>
        </div>
        <div class="col-md-3">
            <div class="jumbotron">
                Всего кол-во подуктов: {{count(\App\Product::all())}}
            </div>
        </div>
    </div>
</div>

@endsection
