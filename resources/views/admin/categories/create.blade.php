@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.category.store')}}" method="post">
        @csrf
        @include('admin.categories.partials.form',['categories' => \App\ProductCategorie::all()])
    </form>
</div>
@endsection
