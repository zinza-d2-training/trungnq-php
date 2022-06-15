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
Breadcrumbs::for('user', function ($trail) {
    $trail->parent('home');
    $trail->push('List User', route("user.index"));
});
Breadcrumbs::for('edituser', function ($trail, $id) {
    $trail->parent('user');
    $trail->push('Edit', route("user.edit", ['id' => $id]));
});
Breadcrumbs::for('createuser', function ($trail) {
    $trail->parent('user');
    $trail->push('C reate', route("user.create"));
});

Breadcrumbs::for('company', function ($trail) {
    $trail->parent('home');
    $trail->push('Company', route("company.index"));
});
Breadcrumbs::for('editcompany', function ($trail, $id) {
    $trail->parent('company');
    $trail->push('Edit', route("company.edit", ['company' => $id]));
});
Breadcrumbs::for('createcompany', function ($trail) {
    $trail->parent('company');
    $trail->push('Create', route("company.create"));
});

Breadcrumbs::for('topic', function ($trail) {
    $trail->parent('home');
    $trail->push('Topic', route("topic.index"));
});
Breadcrumbs::for('edittopic', function ($trail, $id) {
    $trail->parent('topic');
    $trail->push('Edit', route("topic.edit", ['topic' => $id]));
});
Breadcrumbs::for('createtopic', function ($trail) {
    $trail->parent('topic');
    $trail->push('Create', route("topic.create"));
});
