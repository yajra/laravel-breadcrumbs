<?php

class CustomServiceProviderTest extends TestCase
{
    public function testRender()
    {
        $html = Breadcrumbs::render('home');
        $this->assertXmlStringEqualsXmlFile(__DIR__ . '/../fixtures/CustomServiceProvider.html', $html);
    }

    protected function getPackageProviders($app)
    {
        return [
            CustomServiceProvider::class,
        ];
    }
}

class CustomServiceProvider extends Yajra\Breadcrumbs\ServiceProvider
{
    public function registerBreadcrumbs()
    {
        Breadcrumbs::register('home', function ($breadcrumbs) {
            $breadcrumbs->push('Home', '/');
        });
    }
}
