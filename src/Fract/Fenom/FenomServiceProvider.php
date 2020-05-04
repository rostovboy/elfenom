<?php namespace Fract\Fenom;

use Fenom;
use Illuminate\Filesystem;
use Illuminate\Support\ServiceProvider;

class FenomServiceProvider extends ServiceProvider
{

    /**
     * {@inheritdoc}
     */
    public function register()
    {
        // nothing to do
    }

    /**
     * {@inheritdoc}
     */
    public function boot()
    {
        $extension = config('fenom.extension', 'fenom.php');

        $this->app['view']->addExtension($extension, 'fenom', function () use ($extension) {
            $provider = new FenomProvider($extension);
            $fenom = new Fenom($provider);
            $fenom->setCompileDir(config('fenom.compileDir', storage_path() . '/framework/views'));
            $fenom->setOptions(config('fenom.options', []));

            return new FenomEngine($fenom);
        });

        $this->publishes([__DIR__ . '/../../config/fenom.php' => config_path('fenom.php')]);
    }

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [];
    }
}