<?php // routes/breadcrumbs.php

use Diglactic\Breadcrumbs\Breadcrumbs;


use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Home
Breadcrumbs::for('home', function (BreadcrumbTrail $trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('account', function ($trail) {
    $trail->parent('home');
    $trail->push('User Setting', route('account'));
});


