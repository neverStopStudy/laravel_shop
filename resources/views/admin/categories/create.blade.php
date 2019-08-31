@extends('admin.layouts.app')

@section('content')
<div class="container">
    <form action="{{route('admin.category.store')}}" method="post">
        @csrf
        @include('admin.categories.partials.form')
    </form>
</div>
@endsection
