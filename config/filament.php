<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Filament
    |--------------------------------------------------------------------------
    |
    | This configuration file is used to configure the Filament admin panel.
    |
    */

    'broadcasting' => [
        'echo' => [
            'key' => env('VITE_PUSHER_APP_KEY'),
        ],
    ],

    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'local'),

];
