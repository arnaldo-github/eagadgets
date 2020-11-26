<nav class="nav white black-text ">
    <div class="main-nav nav-wrapper">
        <a href="{{url('/')}}" class="brand-logo blue-text text-darken-2"><img class="logo" src="/logo1.png"></a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger black-text"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a class="main-nav-link black-text" href="/">Contacto <span class="icon-link right material-icons">perm_contact_calendar</span></a></li>
            <li><a class="main-nav-link black-text" href="/">Sobre nós <span class="icon-link right material-icons">info</span></a></li>
            <li><a class="main-nav-link black-text" href="/">Perguntas frequentes<span class="right icon-link material-icons">help_outline</span> </a></li>
            @if(Route::has('login'))
            @auth
            <li><a class="main-nav-link black-text dropdown-trigger btn waves-effect" style="border-radius: 30px;" href='#' data-target='dropdown1'>Perfil <span class=" right material-icons">keyboard_arrow_down</span></a></li>
            <!-- Dropdown Structure -->
            <ul id='dropdown1' class='dropdown-content'>
                <li><a href="/user/profile">Perfil</a></li>
                <li class="divider" tabindex="-1"></li>
                <li><form method="POST" action="{{ route('logout') }}">
                    @csrf<a class="red-text" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();" href="/user/profile">Logout</a>
                </form></li>
            </ul>
            @else
            <li><a class="main-nav-link black-text" href="/login">Login<span class="right icon-link material-icons">lock</span> </a></li>
            @if (Route::has('register'))
            <li><a class="main-nav-link black-text" href="/register">Registar<span class="right icon-link material-icons">lock</span> </a></li>
            @endif
            @endauth
            @endif
        </ul>
    </div>
</nav>

<ul class="sidenav" id="mobile-demo">
    @if(Route::has('login'))
    @auth
    <span class="collapsible">
        <li>
            <div style="padding: 0 32px;" class="collapsible-header">Minha Conta</div>
            <div style="padding: 0 0  32px 64px;" class="collapsible-body "><a class="black-text" href="/user/profile">Perfil</a></div>



            <div style="padding: 0 0  32px 64px !important;" class="collapsible-body">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf<a class="black-text" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            this.closest('form').submit();" href="/user/profile">Logout</a>
                </form>
            </div>
        </li>
    </span>
    @else
    <li><a href="/login">Login</a></li>
    @if (Route::has('register'))
    <li><a href="/register">Criar Conta</a></li>
    @endif
    @endauth
    @endif
    <li><a href="/">Contacto</a></li>
    <li><a href="/">Sobre nós</a></li>
    <li><a href="/">Perguntas frequentes</a></li>
</ul>