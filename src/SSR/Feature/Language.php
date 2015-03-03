<?php namespace Phaza\SSR\Feature;

use Phaza\SSR\Exceptions\UnknownLanguageException;

/**
 * Represents the language (for the name) for a given Feature
 *
 * @package Phaza\SSR\Feature
 */
class Language {
	private $languages = [
		'NO' => [ 'name' => 'Norsk',       'description' => 'Offisielt språk på stedsnavn i Norge, brukes i Norge og på Svalbard.' ],
		'KV' => [ 'name' => 'Kvensk',      'description' => 'Offisielt språk på stedsnavn i Norge, brukes i deler av Troms og Finmark.' ],
		'SN' => [ 'name' => 'Nordsamisk',  'description' => 'Offisielt språk på stedsnavn i Norge, brukes i Finnmark, Troms og Nordland sør til Tysfjord kommune' ],
		'SL' => [ 'name' => 'Lulesamisk',  'description' => 'Offisielt språk på stedsnavn i Norge, brukes i Nordland fra og med Tysfjord kommune sør til Meløy og Rana kommuner.' ],
		'SS' => [ 'name' => 'Sørsamisk',   'description' => 'Offisielt språk på stedsnavn i Norge, brukes fra og med Meløy og Rana kommuner til Engerdal (Hedmark).nord' ],
		'DA' => [ 'name' => 'Dansk',       'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'EN' => [ 'name' => 'Engelsk',     'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'FI' => [ 'name' => 'Finsk',       'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'FR' => [ 'name' => 'Fransk',      'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'FO' => [ 'name' => 'Færøysk',     'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'KL' => [ 'name' => 'Grønlandsk',  'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'GA' => [ 'name' => 'Irsk',        'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'IS' => [ 'name' => 'Islandsk',    'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'NL' => [ 'name' => 'Nederlandsk', 'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'RU' => [ 'name' => 'Russisk',     'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'SV' => [ 'name' => 'Svensk',      'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
		'DE' => [ 'name' => 'Tysk',        'description' => 'Språk på stedsnavn utenfor Norges fastland.' ],
	];


	private $language;

	/**
	 * Creates a new object with the given language
	 * @throws UnknownLanguageException
	 * @param $language
	 */
	public function __construct($language) {
		if(!in_array($language, array_keys($this->languages))) {
			throw new UnknownLanguageException(sprintf("Value was '%s'", $language));
		}

		$this->language = $language;
	}

	public function getLanguageDescription() {
		return $this->languages[$this->language]['description'];
	}

	public function getLanguageName() {
		return $this->languages[$this->language]['name'];
	}

	public function getLanguage() {
		return $this->language;
	}
}
