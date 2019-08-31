@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="raw">
            <div class="col-md-12">
                <div class="product">
                    <div class="product_images">
{{--                        {{\App\Product::find($product->id)->gallery->images}}--}}
{{--                        App\Product::find($product->id)->comments as $comment)--}}
<!--                        --><?php //$gallery = \App\Gallery::where('product_id',$product->id)->first() ?>
{{--    {{dd(session()->get('cart')->items)}}--}}
                        <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                                @forelse(\App\Product::find($product->id)->gallery->images as $image)
                                    @if($loop->first)
                                    <div class="carousel-item active">
                                        <img src="{{$image->link}}" class="d-block w-100 img-fluid" alt="...">
                                    </div>
                                    @else
                                    <div class="carousel-item ">
                                        <img src="{{$image->link}}" class="d-block w-100 img-fluid" alt="...">
                                    </div>
                                    @endif
                                @empty
                                    <div class="alert">NET FOTOCHEK</div>
                                @endforelse
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                    </div>
                    <div class="product__name"><p>{{$product->name}}</p></div>
                    <div class="product__descriprion"><p>{{$product->description}}</p></div>
                    <div class="product__price"><span>Cтоимость {{$product->price}}</span></div>
                    <div class="product__status"><span>{{$product->status}}</span></div>

                    <button class="btn-success"><a href="{{route('product.addToCart',$product->id)}}">BUY</a></button>
                </div>
            </div>
        </div>

        <div class="raw">
            <div class="col-md-12">
                <span>Coments</span>
                    @forelse($comments = App\Product::find($product->id)->comments as $comment)
                        <div class="card comment">
                            <div class="comment-author">
                                Aвтор: {{$comment->user->name}}
                            </div>
                            <div class="comment-text">
                                {{$comment->text}}
                            </div>
                            <div class="comment-date">
                                {{$comment->created_at}}
                            </div>
                        </div>
                    @empty
                        <div class="alert">Коментариев не обнаружено будьте первым!</div>
                    @endforelse
                    @if(Auth::check())
                        <form action="{{ route('comment.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <p class="form-text">Оставьте свой отзыв</p>
                                <input type="hidden" class="form-control" name="product_id" value="{{$product->id}}" >
                                <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}" >
                                <textarea name="text" cols="20" rows="5" class="form-control"></textarea>
                                <button class="form-control" type="submit">Добавить</button>
                            </div>
                        </form>
                    @else
                    <div class="alert">Чтоб оставлять коментарии войдите или зарегистрируйтесь!</div>
                    @endif


            </div>
        </div>
    </div>
@endsection
