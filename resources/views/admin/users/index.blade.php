@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="raw">
            <div class="raw">
                <table class="table table-bordered">
                    <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Имя Продукта</th>
                        <th>Категория</th>
                        <th>Цена</th>
                        <th>Зарегистрирован</th>
                        <th>Заказы</th>
{{--                        <th>Действия</th>--}}
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $user)
{{--                        {{dd($user->purchase)}}--}}
                        <tr>
                            <th scope="row">{{$loop->iteration}}</th>
                            <td><a href="{{$user->id}}">{{$user->name}}</a></td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->phone . " грн"}}</td>
                            <td>{{ $user->created_at }}</td>
                            @if(!App\Purchase::all()->find($user->id) == 0)
                            <td><a href="{{route('admin.purchase.view',['purchases' => App\Purchase::find($user->id)])}}">Заказы</a></td>
                            @else
                                <td>Нет Заказов</td>
                            @endif
{{--                            <td>{{ $purchases = App\Purchase::find($user->id) }}</td>--}}
{{--                            $comments = App\Purchse::find($product->id--}}
{{--                            <td>--}}
{{--                                @if($product->status == 1)--}}
{{--                                    <i class="fas fa-check"></i>Опубликовано--}}
{{--                                @else--}}
{{--                                    <i class="fas fa-times"></i>Не опубликовано--}}
{{--                                @endif--}}
{{--                            </td>--}}
    {{--                        <td>{{ count($product->comments)}}</td>--}}
    {{--                        <td>--}}
    {{--                            <a href="{{route('admin.product.edit', $product->id)}}">Изменить</a>--}}
    {{--                            <form action="{{route('admin.product.destroy', $product->id)}}" method="get">--}}
    {{--                                @csrf--}}
    {{--                                @method("DELETE")--}}
    {{--                                <input type="submit" value="Удалить">--}}
    {{--                            </form>--}}

    {{--                        </td>--}}
{{--                        </tr>--}}
                    @empty
                        <tr class="table-warning">
                            <td colspan="7">Пользователей не обнаружено!</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
