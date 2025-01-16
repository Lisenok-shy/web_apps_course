@extends('basado')
@section('content')
    <h2>Заведение дома в системе</h2>
    <form method = "post" action={{url("house/".$house->id)}}  enctype="multipart/form-data">
        @csrf
        <label>Адрес</label>
        <input type = "text" name = "address" value = {{$house->address}}>
        @error("address")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <label>Площадь</label>
        <input type = "number" name = "area" value = {{$house->area}}>
        @error("area")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <label>Цена</label>
        <input type = "number" name = "price" value = {{$house->price}}>
        @error("price")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <label>Изображения</label>
        <input type = "file" name = "files[]" multiple accept="image/png, image/jpeg, image/jpg">
        @error("files")
        <div class='invalid'>{{$message}}</div>
        @enderror
        <br>
        <input type='submit' value='Отправить на согласование'/>
    </form>
@endsection