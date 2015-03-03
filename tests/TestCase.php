<?php 

class TestCase extends PHPUnit_Framework_TestCase {

	protected $handle;

	public function setUp() {
//		$this->handle = fopen(__DIR__.'/../stedsnavn.geojson', 'r');
		$this->handle = fopen(__DIR__.'/data/partial.geojson', 'r');
	}

	public function tearDown() {
		fclose($this->handle);
	}
}
