<?php

class DependantServiceProviderTest extends TestCase
{
    public function testRender()
    {
        $html = Breadcrumbs::render('home');
        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../fixtures/DependantServiceProvider.html', $html);
    }

    protected function getPackageProviders($app)
    {
        return [
            Yajra\Breadcrumbs\ServiceProvider::class,
            DependantServiceProvider::class,
        ];
    }

    protected function loadServiceProvider()
    {
        // Disabled - we want to test the automatic loading instead
    }
}

class DependantServiceProvider extends Illuminate\Support\ServiceProvider
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
