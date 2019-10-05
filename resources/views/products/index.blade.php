@extends('layouts.app')
{{--{{use App\Product as Product;}}--}}
<?php //use App\Product as Product ?>
@section('content')
    <style>
        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        > .col,
        > [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }
    </style>
    <div class="row no-gutters">
        <div class="left-side col-md-3">
            <div class="container-fluid">
{{--                <div class="btn btn-success">--}}
{{--                    <a href="{{route('product.create')}}">Добавить товар</a>--}}
{{--                </div>--}}
                <div class="btn">
                    <a href="{{route('category.index')}}">Категории</a>
                </div>
            </div>
        </div>
        <div class="main col-md-9 ">
            <div class="container">
                <div class="raw">
                    <div class="card-columns">
                        @foreach ($products as $product)
                            @include('products.card', ['product' => $product])
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
