<?php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

// Projector
Breadcrumbs::for('projector.projects.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Учет проектов', route('projector.projects.index'));
});

Breadcrumbs::for('projector.projects.create', function ($trail) {
    $trail->parent('projector.projects.index');
    $trail->push('Новый');
});

Breadcrumbs::for('projector.projects.edit', function ($trail) {
    $trail->parent('projector.projects.index');
    $trail->push('Редактирование');
});

Breadcrumbs::for('projector.projects.show', function ($trail, \App\Project $project) {
    $trail->parent('projector.projects.index');
    $trail->push($project->name, route('projector.projects.show', $project->id));
});

Breadcrumbs::for('projector.projects.docs.add', function ($trail, \App\Project $project) {
    $trail->parent('projector.projects.show', $project);
    $trail->push('Новый документ');
});

Breadcrumbs::for('projector.projects.docs.edit', function ($trail, \App\Project $project) {
    $trail->parent('projector.projects.show', $project);
    $trail->push('Редактирование документа');
});


// NSI
Breadcrumbs::for('nsi.', function ($trail) {
    $trail->parent('home');
    $trail->push('НСИ');
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
    $trail->push('Администрирование');
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

// Frontend
Breadcrumbs::for('projects.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Проекты', route('projects.index'));
});

Breadcrumbs::for('projects.show', function ($trail) {
    $trail->parent('projects.index');
    $trail->push('Просмотр проекта');
});

Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('home');
    $trail->push('Пользователи', route('users.index'));
});

Breadcrumbs::for('users.show', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Просмотр пользователя');
});


