<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('projects', function ($trail) {
    $trail->parent('home');
    $trail->push('Проекты', route('home'));
});

// NSI
Breadcrumbs::for('nsi.', function ($trail) {
    $trail->parent('home');
    $trail->push('НСИ', route('nsi.'));
});

Breadcrumbs::for('nsi.clients.index', function ($trail) {
    $trail->parent('nsi.');
    $trail->push('Заказчики', route('nsi.clients.index'));
});

Breadcrumbs::for('nsi.clients.create', function ($trail) {
    $trail->parent('nsi.clients.index');
    $trail->push('Новый');
});

Breadcrumbs::for('nsi.clients.edit', function ($trail) {
    $trail->parent('nsi.clients.index');
    $trail->push('Редактирование');
});

// Adm
Breadcrumbs::for('adm.', function ($trail) {
    $trail->parent('home');
    $trail->push('Администрирование', route('adm.'));
});

Breadcrumbs::for('adm.users.index', function ($trail) {
    $trail->parent('adm.');
    $trail->push('Пользователи', route('adm.users.index'));
});

Breadcrumbs::for('adm.users.create', function ($trail) {
    $trail->parent('adm.users.index');
    $trail->push('Новый');
});

Breadcrumbs::for('adm.users.edit', function ($trail) {
    $trail->parent('adm.users.index');
    $trail->push('Редактирование');
});

Breadcrumbs::for('adm.projects.index', function ($trail) {
    $trail->parent('adm.');
    $trail->push('Проекты', route('adm.projects.index'));
});

Breadcrumbs::for('adm.projects.create', function ($trail) {
    $trail->parent('adm.projects.index');
    $trail->push('Новый');
});

Breadcrumbs::for('adm.projects.edit', function ($trail) {
    $trail->parent('adm.projects.index');
    $trail->push('Редактирование');
});

