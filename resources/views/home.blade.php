
@extends('layouts.app')

@section('content')


    <?php $purchases = App\Purchase::all()->where('phone',Auth::user()->phone)?>
<div class="container">
    <div class="row">
        @forelse($purchases as $purchase)
            <?php $product = App\Product::where('id',$purchase->product_id)->first() ?>
            <?php $gallery = App\Gallery::where('product_id',$product->id)->first() ?>
            <?php $img = App\Image::where('gallery_id',$gallery->id)->first() ?>
{{--        {{dd($product)}}--}}
            <div class="col-md-4">
                <div class="card">
                    <img src="{{$img->link}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->description}}</p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                    </div>
                </div>
            </div>
        @empty
            <div class=""> Нету заказов!</div>
        @endforelse
    </div>
</div>
@endsection
