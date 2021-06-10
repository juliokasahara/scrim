<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">



            <div class="container">
                <a class="navbar-brand">
  
                   Scrim
                </a>


            
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    @if(!Auth::guest())
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('usuario') }}">{{ __('Usuário') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('grupo') }}">{{ __('Grupo') }}</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('scrim') }}">{{ __('Scrim') }}</a>
                            </li>
                        </ul>
                    @endif

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrar') }}</a>
                                </li>
                            @endif
                        @else

                            <form action="{{ route('usuario.convite') }}" method="POST" action="/register">
                                @csrf
                                <div class="input-group">
                                    <input type="text" name="hash" class="form-control bg-light border-0 small" placeholder="Adicionar grupo" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-success" type="submit">
                                            <span class="fas fa-search fa-sm">+ Grupo</span>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
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