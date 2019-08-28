@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{route('category.store')}}" method="post">
        @csrf
        @include('categories.partials.form')
    </form>
</div>
@endsection
