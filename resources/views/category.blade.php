@extends('basado')
@section('content')
<div class="container-sm">
    <h2>{{$category ? "Категория: ".$category->category : "venom"}}</h2>
    @if($category)

    <table class="table table-hover mt-3">
        <thead>
            <td scope="col" class="col-1">id</td>
            <td scope="col" class="col-3">Название</td>
            <td scope="col" class="col-3">Площадь(кв.м)</td>
            <td scope="col" class="col-1">Действия</td>
        </thead>
        @foreach ($category->houses as $house)
        <tr>
            <td>{{$house->id}}</td>
            <td>{{$house->address}}</td>
            <td>{{$house->area}}</td>
            <td><a class="fa fa-arrow-right" aria-hidden="true" href="{{url('house/' . $house->id)}}"></a></td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection