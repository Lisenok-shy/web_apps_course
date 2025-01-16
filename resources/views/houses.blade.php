@extends('basado')
@section('content')
<div class="container">
    <h2>Список домиков</h2>
    @if(Auth::user()->is_admin)
    <div class="d-flex flex-row-reverse mt-3">
        <a href="house/create" class="btn btn-primary">Добавить запись</a>
    </div>
    @endif
    <table class="table table-hover mt-3" id="houseTable" data-toggle="table">
        <thead>
            <td scope="col" class="col-3">id</td>
            <td scope="col" class="col-3">Название</td>
            <td scope="col" class="col-3">Площадь(кв.м)</td>
            <td scope="col" class="col-1">Действия</td>
        </thead>
        @foreach ($houses as $house)
        <tr>
            <td scope="row">{{$house->id}}</td>
            <td scope="row">{{$house->address}}</td>
            <td scope="row">{{$house->area}}</td>
            <td>
                <a class="fa fa-arrow-right" aria-hidden="true" href="{{"house/".$house->id}}"></a>
                <br>
                <a href="{{"house/edit/".$house->id}}">Редактировать</a>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="pagination">
        {{ $houses->links() }}
    </div>
</div>
@endsection