<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">
            Cine<span class="fw-bold">Magic</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            @auth
            @if (auth()->user()->tipo == 'A')
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link {{ (str_contains(url()->current(), 'home')) ? 'active' : '' }}"
                        href="{{ route('home') }}">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (str_contains(url()->current(), 'filme')) ? 'active' : '' }}"
                        href="{{ route('filmes.index') }}">Filmes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (str_contains(url()->current(), 'genero')) ? 'active' : '' }}"
                        href="{{ route('generos.index') }}">Géneros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (str_contains(url()->current(), 'utilizadores')) ? 'active' : '' }}"
                        href="{{ route('utilizadores.index') }}">Utilizadores</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (str_contains(url()->current(), 'salas')) ? 'active' : '' }}"
                        href="{{ route('salas.index') }}">Salas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ (str_contains(url()->current(), 'sessoes')) ? 'active' : '' }}"
                        href="{{ route('sessoes.index') }}">Sessões</a>
                </li>
            </ul>
            @endif
            @endauth

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest

                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Registar</a>
                </li>
                @endif

                @else

                @if (auth()->user()->tipo == 'A')
                <li class="nav-item">
                    <a class="nav-link {{ (str_contains(url()->current(), 'configuracoes')) ? 'active' : '' }}"
                        href="{{ route('configuracoes.edit') }}">Configurações</a>
                </li>
                @endif

                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <!-- do not show for users with tipo == 'F' -->
                        @if (Auth::user()->tipo != 'F')
                        <a class="dropdown-item" href="{{ route('utilizadores.adminProfile') }}">Perfil</a>
                        <hr class="dropdown-divider">
                        @endif

                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>