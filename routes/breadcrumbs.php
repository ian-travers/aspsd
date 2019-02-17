<?php

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Главная', route('home'));
});

Breadcrumbs::for('projects', function ($trail) {
    $trail->parent('home');
    $trail->push('Проекты', route('home'));
});

Breadcrumbs::for('nsi', function ($trail) {
    $trail->parent('home');
    $trail->push('НСИ', route('nsi'));
});

Breadcrumbs::for('adm', function ($trail) {
    $trail->parent('home');
    $trail->push('Администрирование', route('adm'));
});
