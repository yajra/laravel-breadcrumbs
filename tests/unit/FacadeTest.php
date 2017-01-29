<?php

class FacadeTest extends TestCase {

	public function testFacade()
	{
		$this->assertInstanceOf('Yajra\Breadcrumbs\Manager', Breadcrumbs::getFacadeRoot());
		$this->assertSame($this->app['breadcrumbs'], Breadcrumbs::getFacadeRoot());
	}

}
