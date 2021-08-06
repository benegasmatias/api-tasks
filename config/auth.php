<?php

return [
    'defaults' => [
        'guard' => 'api',
        'passwords' => 'users',
    ],

    'guards' => [
        'api' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ],'web' => [
            'driver' => 'jwt',
            'provider' => 'users',
        ]
    ],

    'ttl' => env('JWT_TTL', 120),

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => \App\Models\User::class
        ]
     
    ]
];