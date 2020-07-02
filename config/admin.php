<?php

return [

    'models' => [
        'user' => 'App\User',
        'role' => 'Veldman\Dashboard\Models\Role'
    ],

    'prefix' => env('DASHBOARD_PREFIX', 'admin'),

    'menu' => [

    ],

    'policies' => [
        'App\User' => 'Veldman\Dashboard\Policies\UserPolicy'
    ]
];
