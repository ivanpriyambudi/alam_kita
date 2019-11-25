<?php
return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],
    // Guard
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'api' => [
            'driver' => 'token',
            'provider' => 'users',
        ],
        'admin' => [
          'driver' => 'session',
          'provider' => 'admin',
        ],
        'admin-api' => [
            'driver' => 'token',
            'provider' => 'admin',
        ],
        'user' => [
          'driver' => 'session',
          'provider' => 'user',
        ],
        'user-api' => [
            'driver' => 'token',
            'provider' => 'user',
        ],
        'camp' => [
          'driver' => 'session',
          'provider' => 'camp',
        ],
        'camp-api' => [
            'driver' => 'token',
            'provider' => 'camp',
        ],
    ],
    //  Providers
    'providers' => [
        'user' => [
            'driver' => 'eloquent',
            'model' => App\User::class,
        ],
        'admin' => [
          'driver' => 'eloquent',
          'model' => App\Admin::class,
        ],
        'camp' => [
          'driver' => 'eloquent',
          'model' => App\Camp::class,
        ],
    ],
    // Password
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
        ],
    ],
];