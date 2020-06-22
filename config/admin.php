<?php

return [

    'models' => [
        'user' => 'App\User',
        'role' => 'App\User'
    ],

    'prefix' => env('DASHBOARD_PREFIX', 'admin'),

    'menu' => [

    ],

    'policies' => [
        'App\User' => 'Veldman\Dashboard\Policies\UserPolicy'
    ]
];
