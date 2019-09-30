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
{{--                                        <div class="product__quantity card-text">Количество {{$product['quantity']}} шт.</div>--}}
{{--                                        @if($product['quantity'] > 1)--}}
{{--                                            <div class="product__price card-text text-muted">--}}
{{--                                                Цена за 1 шт {{$product['item']['price']}} грн--}}
{{--                                            </div>--}}
{{--                                        @endif--}}
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
                <a href="#">К Оплате</a>
            </button>

        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Оплатить
        </button>

        <!-- Модальное окно -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Введите данные</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="{{route('purchases.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
    {{--                        @if(Auth::check())--}}
    {{--                            <p>Пользователь ля ля ля потверждаете покупку</p>--}}
    {{--                            <p>После подтверждения Ярик с вами свяжеться</p>--}}
    {{--                        @else--}}

                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Телефон</label>
                                        <input type="text" class="form-control" name="phone" id="formGroupExampleInput2" placeholder="Телефон">
                                    </div>

    {{--                        @endif--}}
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                            <button type="submit" class="btn btn-primary">Отправить</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

            @else
                <div class="alert">Корзина пуста</div>
            @endif
    </div>
</div>
@endsection
