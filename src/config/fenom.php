<?php return [

    /*
    |--------------------------------------------------------------------------
    | Fenom options
    |--------------------------------------------------------------------------
    |
    | Configure template engine to suit your needs or achieve best performance.
    |
    */

    'options' => [
        'disable_methods'      => env('FENOM_DISABLE_METHODS', false),
        'disable_native_funcs' => env('FENOM_DISABLE_NATIVE_FUNCS', false),
        'auto_reload'          => env('FENOM_AUTO_RELOAD', env('APP_DEBUG', false)),
        'force_compile'        => env('FENOM_FORCE_COMPILE', false),
        'disable_cache'        => env('FENOM_DISABLE_CACHE', false),
        'force_include'        => env('FENOM_FORCE_INCLUDE', false),
        'auto_escape'          => env('FENOM_AUTO_ESCAPE', true),
        'force_verify'         => env('FENOM_FORCE_VERIFY', false),
        'disable_statics'      => env('FENOM_DISABLE_STATICS', false),
        'strip'                => env('FENOM_STRIP', !env('APP_DEBUG', false)),
    ],

    'extension' => 'fenom.php',

    'compileDir' => storage_path() . '/framework/views',

];