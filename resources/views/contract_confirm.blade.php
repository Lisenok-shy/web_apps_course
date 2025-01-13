@extends('basado')
@section('content')
    <h2>Подтверждение контракта (для администратора)</h2>
    <form method = "post" action={{url("contract/confirm/".$contract->id)}}>
        @csrf
        <span>Название контракта</span>
        <span>{{$contract->num}}</span>
        <br>
        <span>Дата начала</span>
        <span>{{$contract->date_begin}}</span>
        <br>
        <span>Дата окончания</span>
        <span>{{$contract->date_end}}</span>
        <br>
        <span>Дом</span>
        <span>{{$contract->house()->first()->address}}</span>
        <br>
        <label>Подверждено</label>
        <p><input name="confirmed" type="radio" value=1 @if($contract->confirmed == old('confirmed')) checked @endif> Подтвержден</p>
        <p><input name="confirmed" type="radio" value=0 @if($contract->confirmed == old('confirmed')) checked @endif> Не подтвержден</p>
        @error("confirmed")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <input type="submit" value="Отправить">
    </form>
@endsection

