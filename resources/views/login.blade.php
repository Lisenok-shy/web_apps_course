<html>
    <head>
            <title>605-41mE.A.</title>
            <style>.invalid {color:red;}</style>
    </head>
    <body>
        @if($user)
            <h2>Добро пожаловать. Снова {{$user->name}}</h2>
            <a href="{{url('logout')}}">Выйти из системы</a>
        @else
            <h2>Вход в систему</h2>
            <form method="post" action={{url('auth')}}/>
                @csrf
                <label>E-mail</label>
                <input type="text" name="email" value="{{old('email')}}">
                @error('email')
                <div class='is_invalid'>{{$message}}</div>
                @enderror
                <br>
                <label>Password</label>
                <input type="password" name="password" value="{{old('password')}}">
                @error('password')
                <div class='is_invalid'>{{$message}}</div>
                @enderror
                <input type="submit">
            </form>
            @error('error')
            <div class='is_invalid'>{{$message}}</div>
            @enderror
            <br>
        @endif
    </body>
<html>