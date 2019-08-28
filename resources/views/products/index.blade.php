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
                <div class="btn btn-success">
                    <a href="{{route('product.create')}}">Добавить товар</a>
                </div>
                <div class="btn">
                    <a href="{{route('category.index')}}">Категории</a>
                </div>
            </div>
        </div>
        <div class="main col-md-9 ">
            <div class="container">
                <div class="raw">
{{--                    <table class="table table-bordered">--}}
{{--                        <thead class="thead-light">--}}
{{--                        <tr>--}}
{{--                            <th>#</th>--}}
{{--                            <th>Имя Продукта</th>--}}
{{--                            <th>Категория</th>--}}
{{--                            <th>Цена</th>--}}
{{--                            <th>Опубликовано</th>--}}
{{--                            <th>Коментариев</th>--}}
{{--                            <th>Действия</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @forelse($products as $product)--}}
{{--                            <tr>--}}
{{--                                --}}{{--                {{dd($loop)}}--}}
{{--                                <th scope="row">{{$loop->iteration}}</th>--}}
{{--                                <td><a href="{{$product->id}}">{{$product->name}}</a></td>--}}
{{--                                <td>{{ $product->category['title']}}</td>--}}
{{--                                <td>{{ $product->price . " грн"}}</td>--}}
{{--                                <td>--}}
{{--                                    @if($product->status == 1)--}}
{{--                                        <i class="fas fa-check"></i>Опубликовано--}}
{{--                                    @else--}}
{{--                                        <i class="fas fa-times"></i>Не опубликовано--}}
{{--                                    @endif--}}
{{--                                </td>--}}
{{--                                <td>{{ count($product->comments)}}</td>--}}
{{--                                --}}{{--                                <td>{{$category->slug}}</td>--}}
{{--                                <td>--}}

{{--                                            <a href="{{route('product.edit', $product->id)}}">Изменить</a>--}}
{{--                                        <form action="{{route('product.destroy', $product->id)}}" method="get">--}}
{{--                                            @csrf--}}
{{--                                            @method("DELETE")--}}
{{--                                            <input type="submit" value="Удалить">--}}
{{--                                            --}}{{--                                            <a href="{{route('product.destroy',$product->id)}}">Удалить</a>--}}
{{--                                        </form>--}}


{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @empty--}}
{{--                            <tr class="table-warning">--}}
{{--                                <td colspan="5">Категорий не обнаружено! Добавьте категорию!</td>--}}
{{--                            </tr>--}}
{{--                        @endforelse--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
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
