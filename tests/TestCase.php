<?php

abstract class TestCase extends Orchestra\Testbench\TestCase
{
    public function setUp()
    {
        parent::setUp();

        $this->loadServiceProvider();
    }

    protected function loadServiceProvider()
    {
        // Need to trigger register() to test the views
        $this->app->make('breadcrumbs');
    }

    public function tearDown()
    {
        $this->addToAssertionCount(Mockery::getContainer()->mockery_getExpectationCount());

        Mockery::close();
    }

    protected function getPackageProviders($app)
    {
        return [
            Yajra\Breadcrumbs\ServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'Breadcrumbs' => Yajra\Breadcrumbs\Facade::class,
        ];
    }
}
