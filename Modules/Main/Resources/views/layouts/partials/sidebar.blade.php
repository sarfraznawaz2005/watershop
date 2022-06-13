<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar animated bounceInLeft">
    @auth
        <ul class="app-menu">
            <li>
                <a class="app-menu__item {{active_link('home')}}" href="{{active_link('home')}}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Dashboard</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item {{active_link('admin.users.index')}}" href="#">
                    <i class="app-menu__icon fa fa-book"></i>
                    <span class="app-menu__label">Entries</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item {{active_link('admin.users.index')}}" href="#">
                    <i class="app-menu__icon fa fa-building"></i>
                    <span class="app-menu__label">Areas</span>
                </a>
            </li>
        </ul>
    @endauth
</aside>