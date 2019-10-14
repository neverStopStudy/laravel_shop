@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="raw">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('admin.purchase.index')}}">Все</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.purchase.newpurchases')}}">Новые</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.purchase.paid')}}">Оплаченые</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('admin.purchase.unpaid')}}">Не Оплаченые</a>
                </li>
            </ul>
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
                @forelse($paginator as $purchase)
                    <tr>
                        <?php $product = App\Product::where('id', $purchase->product_id)->get()->first()?>

                        <th scope="row">{{$loop->iteration}}</th>
                        <td><a href="{{$purchase->product_id}}">{{$product->name}}</a></td>
                        <td>{{ $purchase->phone}}</td>
                        <td>{{ $product->price . " грн"}}</td>
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
            @if($paginator->total() > $paginator->count())

                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                {{$paginator->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
