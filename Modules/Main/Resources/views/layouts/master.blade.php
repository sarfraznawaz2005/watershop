<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('main::layouts.partials.head')
<body class="app sidebar-mini animated fadeIn">

@include('main::layouts.partials.nav')
@include('main::layouts.partials.sidebar')

<main class="app-content" id="app">

    @auth
        @if (config('main.breadcrumb'))
            {!! Breadcrumbs::render() !!}
        @endif
    @endauth

    @card(['type' => 'white', 'header_type' => 'light', 'classes' => 'mb3'])
    @slot('header')
        <strong class="page-title"><b class="fa fa-th-large"></b> {{Meta::get('title')}}</strong>
    @endslot

    @include('core::shared.flash')
    @include('core::shared.errors')

    @yield('content')
    @endcard

</main>

@include('main::layouts.partials.footer')

</body>
</html>
