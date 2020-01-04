

<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a class="nav-item {{ setActive(['/']) }}" href="{{url('/')}}"><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li><a class="nav-item {{ setActive(['menu']) }}" href="{{url('/menu')}}"><i class="lnr lnr-dinner"></i> <span>Menu</span></a></li>
                <li><a class="nav-item {{ setActive(['meja']) }}" href="{{url('/meja')}}"><i class="lnr lnr-menu"></i> <span>Meja</span></a></li>
                <li><a class="nav-item {{ setActive(['pesanan']) }}" href="{{url('/pesanan')}}"><i class="lnr lnr-exit-up"></i> <span>Pesanan</span></a></li>
                <li><a class="nav-item {{ setActive(['transaksi']) }}" href="{{url('/transaksi')}}"><i class="lnr lnr-coffee-cup"></i> <span>Transaksi</span></a></li>
                @if(Auth::user()->level != 'admin')
                <li><a class="nav-item {{ setActive(['laporan']) }}" href="{{url('/laporan')}}"><i class="lnr lnr-book"></i> <span>Laporan</span></a></li>
                @endif
{{--                <li>--}}
{{--                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>--}}
{{--                    <div id="subPages" class="collapse ">--}}
{{--                        <ul class="nav">--}}
{{--                            <li><a href="page-profile.html" class="">Profile</a></li>--}}
{{--                            <li><a href="page-login.html" class="">Login</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li><a href="elements.html" class=""><i class="lnr lnr-code"></i> <span>Elements</span></a></li>--}}
{{--                <li><a href="charts.html" class=""><i class="lnr lnr-chart-bars"></i> <span>Charts</span></a></li>--}}
{{--                <li><a href="panels.html" class=""><i class="lnr lnr-cog"></i> <span>Panels</span></a></li>--}}
{{--                <li><a href="notifications.html" class=""><i class="lnr lnr-alarm"></i> <span>Notifications</span></a></li>--}}
{{--                <li>--}}
{{--                    <a href="#subPages" data-toggle="collapse" class="collapsed"><i class="lnr lnr-file-empty"></i> <span>Pages</span> <i class="icon-submenu lnr lnr-chevron-left"></i></a>--}}
{{--                    <div id="subPages" class="collapse ">--}}
{{--                        <ul class="nav">--}}
{{--                            <li><a href="page-profile.html" class="">Profile</a></li>--}}
{{--                            <li><a href="page-login.html" class="">Login</a></li>--}}
{{--                            <li><a href="page-lockscreen.html" class="">Lockscreen</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li><a href="tables.html" class=""><i class="lnr lnr-dice"></i> <span>Tables</span></a></li>--}}
{{--                <li><a href="typography.html" class=""><i class="lnr lnr-text-format"></i> <span>Typography</span></a></li>--}}
{{--                <li><a href="icons.html" class=""><i class="lnr lnr-linearicons"></i> <span>Icons</span></a></li>--}}
            </ul>
        </nav>
    </div>
</div>
