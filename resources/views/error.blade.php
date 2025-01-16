<div class="contrainer-sm" style="margin_top: 80px; max-width:200px">
    @error('email')
        <div class="alert alert-danger " role="alert">
            Проверьте логин
        </div>
    @enderror
    @error('password')
        <div class="alert alert-danger " role="alert">
            Проверьте пароль
        </div>
    @enderror
    @error('error')
        <div class="alert alert-danger" role="alert">
           Неверный логин/пароль
        </div>
    @enderror
    @error('success')
        <div class="alert alert-success " role="alert">
            Авторизация выполнена успешно
        </div>
    @enderror
    @error('contract')
        <div class="alert alert-danger " role="alert">
            У вас здесь нет власти
        </div>
    @enderror
    @error('common')
    <div class="alert alert-danger " role="alert">
            {{$message}}
    </div>
    @enderror
    @error('delete')
    <div class="alert alert-warning " role="alert">
            {{$message}}
    </div>
    @enderror
</div>