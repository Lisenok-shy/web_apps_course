<nav class="navbar navbar-expand-md navbar-dark bg-dark" aria-label="Fourth navbar example">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample04">

      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="{{url('login')}}">Домашняя страница</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{url('contract')}}" tabindex="-1">Просмотр контрактов</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Просмотр домов</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown04">
            <li><a class="dropdown-item" href="{{url('house')}}">Все дома</a></li>
            <li><a class="dropdown-item" href="{{url('category')}}">Поиск по категориям</a></li>
          </ul>
        </li>
      </ul>
      @if(Auth::user())
      <ul class="nav-item my-2 my-md-0">
        <a class="text-light nav-link align-middle d-inline" href="{{url('logout')}}">Выйти</a>
      </ul>
      @else
      <ul class="nav-item my-2 my-md-0">
        <a class="text-light nav-link align-middle d-inline" href="{{url('login')}}">Войти</a>
      </ul>
      @endif
    </div>
  </div>
</nav>