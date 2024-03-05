<header class="p-3 mb-3 border-bottom">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="/" class="nav-link px-2 link-secondary">Главная</a></li>
                <li><a href="{{ route('books.index') }}" class="nav-link px-2 link-dark">Товары</a></li>
                @guest
                    <li class="nav-link px-2"> Вы не авторизованы</li>
                @endguest
                @role('admin')
                    <li class="nav-link px-2"> Администратор: {{ auth()->user()->name}} </li>
                @endrole

                @role('user')
                    <li class="nav-link px-2"> Пользователь: {{ auth()->user()->name}}</li>
                @endrole
                @guest
                @else
                    <a href="/orders" class="btn btn-info btn-sm"> Заказы </a>
                @endguest

            </ul>

            <div class="dropdown text-end">
                <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1"
                   data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://png.pngtree.com/png-clipart/20191120/original/pngtree-outline-user-icon-png-image_5045523.jpg" alt="mdo" class="rounded-circle" width="32" height="32">
                </a>
                <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    @guest
                        <li><a class="dropdown-item" href="{{ route('login') }}">Войти</a></li>
                        <li><a class="dropdown-item" href="{{ route('register') }}">Регистрация</a></li>
                    @else
                        <li><a class="dropdown-item" href="">Профиль</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Выйти</button>
                        </form>
                    @endguest

                </ul>
            </div>
        </div>
    </div>
</header>
