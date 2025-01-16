@extends('basado')
@section('content')
<div class="container"></div>
@if(Auth::user() and Auth::user()->name)
<h2>Добро пожаловать. Снова. {{$user->name}}</h2>
<a href="{{url('logout')}}">Выйти из системы</a>
@else
<h2>Вход в систему</h2>
<form method="post" action={{url('auth')}}>
    <div class="form-group mt-3">
        @csrf
        <label>E-mail</label>
        <input class="form-control w-25" type="text" name="email" value="{{old('email')}}">
        @error('email')
        <div class='is_invalid'>{{$message}}</div>
        @enderror
        <br>
        <label>Password</label>
        <input class="form-control w-25" type="password" name="password" value="{{old('password')}}">
        @error('password')
        <div class='is_invalid'>{{$message}}</div>
        @enderror
        <input type="submit" class="btn btn-primary mt-5">
    </div>
</form>
@error('error')
<div class='is_invalid'>{{$message}}</div>
@enderror
<br>

@endif
@endsection