{{--<div class="col-md-12">--}}
    <div class="product card">
        <div class="card-body">
            <div class="product__image card-img">

{{--                <img src="{{\App\Product::find($product->id)->gallery->images->first()->link}}" alt="" class="img-fluid">--}}
                <img src="{{\App\Gallery::where('product_id', $product->id)->first()->images->first()->link}}" alt="" class="img-fluid">
            </div>
            <div class="product__name card-title">
                <a href="{{route('product.show',$product->id)}}">
                    <span>{{$product->name}}</span>
                </a>
            </div>
            <div class="product__description card-text">
                <p>{{$product->description}}</p>
            </div>
            <div class="product__price">
                <span>Цена {{$product->price}}</span>
            </div>
{{--            <form action="{{route('product.destroy',$product->id)}}" method="post">--}}
{{--                @csrf--}}
{{--                @method("DELETE")--}}
{{--                <button class="btn-success" type="submit">Удалить</button>--}}
{{--            </form>--}}
{{--            <a href="{{route('product.edit',$product->id)}}">Изменить</a>--}}
            <a href="{{route('product.addToCart',$product->id)}}">В корзину</a>
        </div>
    </div>
{{--</div>--}}
