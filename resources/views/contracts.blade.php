@extends('basado')
@section('content')
<div class="container">
    @if(!Auth::user()->is_admin)
    <a class = "btn btn-warning" href="{{url('contract/create/')}}">Создать новый контракт</a>
    @endif
    <table class="table table-hover">
        <thead>
            <th scope="col" class="col-1">id</th>
            <th scope="col" class="col-1">номер</th>
            <th scope="col" class="col-1">цена</th>
            <th scope="col" class="col-1">buyer_id</th>
            <th scope="col" class="col-1">house_id</th>
            <th scope="col" class="col-1">начало</th>
            <th scope="col" class="col-1">конец</th>
            <th scope="col" class="col-1">подтвержден</th>
            <th scope="col" class="col-1">Действия</th>
        </thead>
        @foreach ($contracts->sortBy('id', SORT_REGULAR, false) as $contract)
        <tr>
            <td>{{$contract->id}}</td>
            <td>{{$contract->num}}</td>
            <td>{{$contract->price}}</td>
            <td>{{$contract->buyer_id}}</td>
            <td>{{$contract->house_id}}</td>
            <td>{{$contract->date_begin}}</td>
            <td>{{$contract->date_end}}</td>
            <td><input type="checkbox" disabled="disabled" @if($contract->confirmed) checked @endif></td>
            <td>
               
                <a href="{{url('contract/delete/' . $contract->id)}}">Удалить</a>
               
                @if(Auth::user()->is_admin)
                <a href="{{url('contract/edit/' . $contract->id)}}">Подтвердить</a>
                @endif
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection