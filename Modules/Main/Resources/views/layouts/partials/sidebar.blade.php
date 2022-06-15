<div class="app-sidebar__overlay" data-toggle="sidebar"></div>

<aside class="app-sidebar animated bounceInLeft">
    @auth
        <ul class="app-menu">
            <li>
                <a class="app-menu__item {{active_link('home')}}" href="{{url('/')}}">
                    <i class="app-menu__icon fa fa-dashboard"></i>
                    <span class="app-menu__label">Home</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item {{active_link('entries.*')}}" href="{{route('entries.index')}}">
                    <i class="app-menu__icon fa fa-book"></i>
                    <span class="app-menu__label">Entries</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item {{active_link('areas.*')}}" href="{{route('areas.index')}}">
                    <i class="app-menu__icon fa fa-building"></i>
                    <span class="app-menu__label">Areas</span>
                </a>
            </li>

            <li>
                <a class="app-menu__item {{active_link('backup.*')}}" href="{{route('backup.index')}}">
                    <i class="app-menu__icon fa fa-database"></i>
                    <span class="app-menu__label">Backup</span>
                </a>
            </li>

        </ul>
    @endauth
</aside>
