<?php namespace Phaza\SSR\Feature;

use Phaza\SSR\Exceptions\UnknownTypeStatusException;

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
