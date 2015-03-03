<?php namespace Phaza\SSR\Feature;

use Phaza\SSR\Exceptions\UnknownStatusException;

class NameStatus {
	private $statuses = [
		'V' => 'Vedtatt (vedtak etter lov om stadnamn, vedtak på et Enkelt navn)',
		'G' => 'Godkjent etter gammel ordning',
		'S' => 'Samlevedtak etter lov om stadnamn',
		'A' => 'Avslått',
		'K' => 'Vedtak påklaget',
		'F' => 'Foreslått',
		'H' => 'Historisk',
		'P' => 'Privat',
		'U' => 'Uvurdert',
		'I' => 'Internasjonalt område'
	];

	private $status;

	public function __construct($status) {
		if(!in_array($status, array_keys($this->statuses))) {
			throw new UnknownStatusException(sprintf("Value was '%s'", $status));
		}

		$this->status = $status;
	}

	public function getStatusText() {
		return $this->statuses[$this->status];
	}

	public function getStatus() {
		return $this->status;
	}
}
