<header class="app-header">
    <a class="app-header__logo" href="{{url('/')}}">{{appName()}}</a>
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar"></a>

    <!-- Navbar Left -->


    <!-- Navbar Right Menu-->
    <ul class="app-nav">

    @auth
        <!-- User Menu-->
            <li class="dropdown">
                <a class="app-nav__item dropdown-toggle" data-toggle="dropdown" href="#">
                    {{user()->full_name}}
                </a>

                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-lg"></i> Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        @endauth


    </ul>
</header>
