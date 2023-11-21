<header>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand p-4" href="#">Cornalina Pub</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">

                    <a href="{{ route('empresas.index') }}" class="nav-link">Empresas</a>
                </li>
            </ul>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
               @if(Auth::user() )
               <a
               class="text-gray-300 block px-4 py-2 text-sm"
               href="route('logout')"
                       onclick="event.preventDefault();
                                   this.closest('form').submit();">
                   {{ __('Log Out') }}
               </a>
               @endif


            </form>

        </div>
    </nav>
</header>