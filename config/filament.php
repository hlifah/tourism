<?php

return [
    'auth' => [
        'guard' => 'web',

        'pages' => [
            'login' => \Filament\Http\Livewire\Auth\Login::class,
        ],

        'middleware' => [
            'auth',
            \Filament\Http\Middleware\Authenticate::class,
        ],

        'authorization' => [
            'enabled' => true,

            // ✅ This must match the gate name defined in AppServiceProvider
            'gate' => 'viewFilament',
        ],
    ],
];
