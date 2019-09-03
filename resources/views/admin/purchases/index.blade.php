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
                        <th scope="row">{{$loop->iteration}}</th>
                        <td><a href="{{$purchase->product_id}}">{{$purchase-$product->name}}</a></td>
                        <td>{{ $purchase->price}}</td>
                        <td>{{ $product->price . " грн"}}</td>
                        <td>
                            @if($product->status == 1)
                                <i class="fas fa-check"></i>Опубликовано
                            @else
                                <i class="fas fa-times"></i>Не опубликовано
                            @endif
                        </td>
                        <td>{{ count($product->comments)}}</td>
                        <td>
                            <a href="{{route('admin.product.edit', $product->id)}}">Изменить</a>
                            <form action="{{route('admin.product.destroy', $product->id)}}" method="get">
                                @csrf
                                @method("DELETE")
                                <input type="submit" value="Удалить">
                            </form>
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
