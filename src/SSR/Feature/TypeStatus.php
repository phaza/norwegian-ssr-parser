<?php namespace Phaza\SSR\Feature;

use Phaza\SSR\Exceptions\UnknownTypeStatusException;

/**
 * Represents the status of the name of the Feature.
 * H = main name.
 *
 * @package Phaza\SSR\Feature
 */
class TypeStatus {
	private $statuses = [
		'H' => 'Hovednavn',
	  'S' => 'Sidenavn',
	  'U' => 'Undernavn'
	];

	private $status;

	public function __construct($status) {
		if(!in_array($status, array_keys($this->statuses))) {
			throw new UnknownTypeStatusException(sprintf("Value was '%s'", $status));
		}

		$this->status = $status;
	}

	public function getTypeStatusText() {
		return $this->statuses[$this->status];
	}

	public function getTypeStatus() {
		return $this->status;
	}
}
