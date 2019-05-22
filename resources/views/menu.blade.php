<nav class="navbar-default navbar-side" role="navigation">
<div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a @yield('menu') href="{{asset('index.php')}}"><i class="fa fa-home"></i> Inicio </a>
            </li>
            <li>
                <a @yield('menuBuscar') href="{{asset('index.php/Buscar')}}"><i class="fa fa-search"></i> Buscar</a>
            </li>
            @if( trim(\Auth::user()->grupo) == "Administrador" )
            <li>
                <a @yield('menuReporte') href="{{asset('index.php/Reporte')}}"><i class="fa fa-file"></i> Reporte </a>
            </li>
            <li>
                <a @yield('menuUsuario') href="{{asset('index.php/usuarios')}}"><i class="fa fa-user"></i> Usuarios </a>
            </li>
            @endif

        </ul>
    </div>
</nav>
