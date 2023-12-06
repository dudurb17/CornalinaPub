<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a style="color:white;" class="navbar-brand p-4" href="{{ route('dashboard') }}">Cornalina Pub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">

                    <a style="color:white;" href="{{ route('empresas.index') }}" class="nav-link">Empresas</a>
                </li>
                <li class="nav-item">

                    <a style="color:white;" href="{{ route('evento.index') }}" class="nav-link">Eventos</a>
                </li>
                <li class="nav-item">
                    <a style="color:white;" href="{{ route('lote.index') }}" class="nav-link">Lote de ingressos</a>
                    </li>
                <li class="nav-item">
                <a style="color:white;" href="{{ route('ingresso.index') }}" class="nav-link">Ingressos</a>
                </li>
            </li>
            <li class="nav-item">
            <a style="color:white;" href="{{ route('estatistic.index') }}" class="nav-link">Gráfico</a>
            </li>

            </ul>

            @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                   @if(Auth::user())
                   <a class="btn btn-ligth text-white px-4 py-2 text-sm"
           href="{{ route('logout') }}"
           onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
        </a>
                   @endif

                </form>
                @else
                    <a name="tipo" class="form-select btn text-white" href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                    @if (Route::has('register'))
                        <a name="tipo" class="form-select btn text-white" href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cadastrar</a>
                    @endif
                @endauth
            </div>
        @endif

        </div>
    </nav>
</header>
