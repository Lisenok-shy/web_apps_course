@extends('basado')
@section('content')
    <h2>{{$category ? "Категория: ".$category->category : "venom"}}</h2>
    @if($category)
    <table>
    <thead>
        <td>id</td>
        <td>Название</td>
        <td>Площадь(кв.м)</td>
    </thead>
    @foreach ($category->houses as $house)
        <tr>
            <td>{{$house->id}}</td>
            <td>{{$house->address}}</td>
            <td>{{$house->area}}</td>
        </tr>
    @endforeach
    </table>
    @endif
@endsection
