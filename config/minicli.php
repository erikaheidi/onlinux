<?php

return [
    /****************************************************************************
     * Minicli Settings
     * You shouldn't need to change the next settings,
     * but you are free to do so at your own risk.
     *****************************************************************************/
    'app_path' => __DIR__ . '/../app/Command',
    'theme' => 'unicorn',
    'templates_path' => __DIR__ . '/../app/Resources/themes/default',
    'data_path' => __DIR__ . '/../app/Resources/data',
    'cache_path' => __DIR__ . '/../var/cache',
    'stencil_dir' => __DIR__ . '/../app/Resources/stencil',
    'stencil_locations' => [
        'post' => __DIR__ . '/../app/Resources/data/blog',
        'desksetup' => __DIR__ . '/../app/Resources/data/desksetup',
        'guide' => __DIR__ . '/../app/Resources/data/guides',
        'device' => __DIR__ . '/../app/Resources/data/devices'
    ]
];
