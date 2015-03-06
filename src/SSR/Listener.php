<?php namespace Phaza\SSR;

use Closure;
use JsonStreamingParser_Listener;
use stdClass;

/**
 * The listener package will separate out the features of the geojson file
 * and invoke the given $featureCallback for each feature.
 *
 * @package Phaza\SSR
 */
class Listener implements JsonStreamingParser_Listener {

	protected $stack = [];
	protected $keyStack =[];

	protected $features = [];

	/**
	 * @var Closure
	 */
	private $featureCallback;


	/**
	 * Create a new Listener. $featureCallback will be executed for each
	 * geojson feature found in the stream.
	 *
	 * @param Closure $featureCallback
	 */
	public function __construct(Closure $featureCallback) {

		$this->featureCallback = $featureCallback;
	}

	public function start_document() {
		// TODO: Implement start_document() method.
	}

	public function end_document() {
		// TODO: Implement end_document() method.
	}

	public function start_object() {
		$this->stack[] = new stdClass;
	}

	public function end_object() {

		$item = array_pop($this->stack);

		if(isset($item->type) && strcasecmp($item->type, 'feature') === 0) {
			call_user_func($this->featureCallback, new Feature($item));
		}
		else {
			$this->endItem($item);
		}
	}

	public function start_array() {
		$this->stack[] = [];
	}

	public function end_array() {
		$item = array_pop($this->stack);
		$this->endItem($item);
	}

	public function key( $key ) {
		$this->keyStack[] = $key;
	}

	public function value( $value ) {
		$item = array_pop($this->stack);

		$this->addValue($item, $value);

		$this->stack[] = $item;
	}

	public function whitespace( $whitespace ) {
		// TODO: Implement whitespace() method.
	}

	private function addValue( &$item, $value ) {
		if(is_array($item)) {
			$item[] = $value;
		}
		else {
			$key = array_pop($this->keyStack);
			$item->{$key} = $value;
		}
	}

	private function endItem($item) {
		if(empty($this->stack)) {
			return;
		}

		$this->value($item);
	}


}
