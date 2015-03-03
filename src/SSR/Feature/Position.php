<?php namespace Phaza\SSR\Feature;

use stdClass;

class Position {
	/* @var float */
	protected $lat;

	/* @var float */
	protected $lng;

	public function __construct(stdClass $geometry) {
		$this->lat = $geometry->coordinates[1];
		$this->lng = $geometry->coordinates[0];
	}

	public function getLat() {
		return $this->lat;
	}

	public function getLng() {
		return $this->lng;
	}
}
