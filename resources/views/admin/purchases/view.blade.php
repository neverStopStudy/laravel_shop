@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="raw">
        <div class="raw">
            <div class="alert">Заказы пользователя c id= {{$user_id}}</div>
            <div class="alert">Всего заказов пользователя {{count($purchases)}}</div>
            <table class="table table-bordered">
                <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Имя Продукта</th>
                    <th>Категория</th>
                    <th>Цена</th>
                    <th>Оплачено</th>
                    <th>Дата заказа</th>
                    <th>Действия</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($purchases as $purchase)
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="{{$purchase->product_id}}">{{$purchase->product->name}}</a></td>
                            <td>{{ $purchase->product->category->title}}</td>
                            <td>{{ $purchase->product->price . " грн"}}</td>
                            <td>
                                @if($purchase->status == 1)
                                    <i class="fas fa-check"></i>Оплачено
                                @else
                                    <i class="fas fa-times"></i>Не оплачено
                                @endif
                            </td>
                            <td>{{$purchase->created_at}}</td>
                            <td>
                                <a href="{{route('admin.purchase.update', $purchase->id)}}">Изменить</a>
                                <form action="{{route('admin.purchase.destroy', $purchase->id)}}" method="get">
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
        </div>
    </div>
</div>
@endsection
