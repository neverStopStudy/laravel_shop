@extends('layouts.app')
@section('content')

<div class="container">
    <div class="raw">
        <div class="card-group">
            @if(Session::has('cart'))
                @foreach ($products as $product)
                    <div class="col-md-12">
                        <div class="product card">
                            <div class="row no-gutters">
                                <div class="col-md-3">
                                    <div class="product__image card-img mw-100 ">
                                        <a href="{{route('product.show', $product['item']['id'])}}" class="card-link">
                                            <img src="{{\App\Gallery::where('product_id', $product['item']['id'])
                                            ->first()->images->first()->link}}" alt="" class="img-fluid">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="card-body">
                                        <div class="product__name card-title">{{$product['item']['name']}}</div>
                                        <div class="product__quantity card-text">Количество {{$product['quantity']}} шт.</div>
                                        @if($product['quantity'] > 1)
                                            <div class="product__price card-text text-muted">
                                                Цена за 1 шт {{$product['item']['price']}} грн
                                            </div>
                                        @endif
                                        <div>Сумма {{$product['price']}} грн
                                            <button class="btn-danger">
                                                <a href="#">Убрать</a>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="alert">Общая сумма {{$totalPrice}} грн</div>
            <button class="btn-success">
                <a href="#">Оплатить</a>
            </button>
            @else
                <div class="alert">Корзина пуста</div>
            @endif
    </div>
</div>
@endsection
