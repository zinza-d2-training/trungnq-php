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

Breadcrumbs::for('tag', function ($trail) {
    $trail->parent('home');
    $trail->push('Tag', route("tag.index"));
});
Breadcrumbs::for('edittag', function ($trail, $id) {
    $trail->parent('tag');
    $trail->push('Edit', route("tag.edit", ['tag' => $id]));
});
Breadcrumbs::for('createtag', function ($trail) {
    $trail->parent('tag');
    $trail->push('Create', route("tag.create"));
});

Breadcrumbs::for('post', function ($trail) {
    $trail->parent('home');
    $trail->push('Post', route("post.index"));
});
Breadcrumbs::for('editpost', function ($trail, $id) {
    $trail->parent('post');
    $trail->push('Edit', route("post.edit", ['post' => $id]));
});
Breadcrumbs::for('createpost', function ($trail) {
    $trail->parent('post');
    $trail->push('Create', route("post.create"));
});

