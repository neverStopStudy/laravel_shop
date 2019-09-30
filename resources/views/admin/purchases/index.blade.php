@extends('admin.layouts.app')

@section('content')

    <div class="container">
        <div class="raw">
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Имя Продукта</th>
                    <th>Заказчик</th>
                    <th>Цена</th>
                    <th>Статус</th>
                    <th>Дата</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                @forelse($purchases as $purchase)
                    <tr>
                        <?php $product = App\Product::where('id', $purchase->product_id)->get()->first()?>

                        <th scope="row">{{$loop->iteration}}</th>
                        <td><a href="{{$purchase->product_id}}">{{$product->name}}</a></td>
                        <td>{{ $purchase->phone}}</td>
                        <td>{{ $product->price . " грн"}}</td>
                        <td>
                            @if($product->status == 1)
                                <i class="fas fa-check"></i>Опачено
                            @else
                                <i class="fas fa-times"></i>Не оплачено
                            @endif
                        </td>
                        <td>{{$purchase->created_at}}</td>
                        <td>
{{--                            <a href="{{route('admin.product.edit', $product->id)}}">Изменить</a>--}}
{{--                            <form action="{{route('admin.product.destroy', $product->id)}}" method="get">--}}
{{--                                @csrf--}}
{{--                                @method("DELETE")--}}
{{--                                <input type="submit" value="Удалить">--}}
{{--                            </form>--}}
                        </td>
                    </tr>
                @empty
                    <tr class="table-warning">
                        <td colspan="7">Заказов не обнаружено! Плохо работаешь!</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
@endsection
