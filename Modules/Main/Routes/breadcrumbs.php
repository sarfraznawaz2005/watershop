<?php

// Home
Breadcrumbs::for('home', static function ($trail) {
    $trail->push('Dashboard', route('home', [' ']));
});

Breadcrumbs::for('login', function ($trail) {
    $trail->push('Login', route('login'));
});

Breadcrumbs::for('password.request', function ($trail) {
    $trail->push('Forgot Password', route('password.request'));
});

Breadcrumbs::for('register', function ($trail) {
    $trail->push('Register', route('register'));
});
