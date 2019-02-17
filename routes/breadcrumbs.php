<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('projects', function ($trail) {
    $trail->parent('home');
    $trail->push('Проекты', route('home'));
});

// NSI
Breadcrumbs::for('nsi', function ($trail) {
    $trail->parent('home');
    $trail->push('НСИ', route('nsi'));
});

Breadcrumbs::for('nsi.clients.index', function ($trail) {
    $trail->parent('nsi');
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


Breadcrumbs::for('adm', function ($trail) {
    $trail->parent('home');
    $trail->push('Администрирование', route('adm'));
});
