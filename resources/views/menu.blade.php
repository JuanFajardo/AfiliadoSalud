<nav class="navbar-default navbar-side" role="navigation">
<div id="sideNav" href=""><i class="fa fa-caret-right"></i></div>
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <a @yield('menu') href="{{asset('index.php')}}"><i class="fa fa-home"></i> Inicio </a>
            </li>
            <li>
                <a @yield('menuBuscar') href="{{asset('index.php/Buscar')}}"><i class="fa fa-search"></i> Buscar </a>
            </li>
            <li>
                <a @yield('menuAfiliado') href="{{asset('index.php/Afiliado/create')}}"><i class="fa fa-qrcode"></i> Registar Manual</a>
            </li>
            <!--<li>
                <a @yield('menuImportar') href="{{asset('index.php/Importar')}}"><i class="fa fa-qrcode"></i> Importar </a>
            </li>
            <li>
                <a @yield('menuReporte') href="{{asset('index.php/Reporte')}}"><i class="fa fa-file"></i> Resportes</a>
            </li>-->
        </ul>
    </div>
</nav>
