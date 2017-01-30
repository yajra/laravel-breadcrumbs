<?php

class DependantServiceProviderErrorTest extends TestCase
{
    /**
     * @expectedException Yajra\Breadcrumbs\Exception
     * @expectedExceptionMessage Breadcrumbs view not specified
     */
    public function testRender()
    {
        Breadcrumbs::render('home');
    }

    protected function getPackageProviders($app)
    {
        return [
            // These are in the wrong order
            DependantServiceProviderError::class,
            Yajra\Breadcrumbs\ServiceProvider::class,
        ];
    }

    protected function loadServiceProvider()
    {
        // Disabled - we want to test the automatic loading instead
    }
}

class DependantServiceProviderError extends Illuminate\Support\ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        Breadcrumbs::register('home', function ($breadcrumbs) {
            $breadcrumbs->push('Home', '/');
        });
    }
}
