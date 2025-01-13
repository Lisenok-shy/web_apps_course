@extends('basado')
@section('content')
@foreach ($categories as $category)
    <h2>
        <a class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="{{url('/category/' . $category->category)}}">{{$category->category}}</a2>
    </h2>
@endforeach
@endsection