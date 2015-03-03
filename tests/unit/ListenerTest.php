<?php

use Phaza\SSR\Feature;
use Phaza\SSR\Listener;

class ListenerTest extends TestCase {

	protected $count = 0;

	public function testWhatever() {
		$time = microtime(true);
		$listener = new Listener(function(Feature $item) {
			$this->count++;
		});
		$parser = new JsonStreamingParser_Parser($this->handle, $listener);
		$parser->parse();

		$this->assertEquals(9, $this->count);
	}

	public function testUnzipOnTheFly() {
		$handle = fopen('compress.bzip2://'.__DIR__.'/../data/partial.geojson.bz2', 'r');
		$listener = new Listener(function(Feature $item) {
			$this->count++;
		});
		$parser = new JsonStreamingParser_Parser($handle, $listener);
		$parser->parse();

		$this->assertEquals(9, $this->count);
	}

	public function testUnzipOnTheFly2() {
		$handle = fopen(__DIR__.'/../data/partial.geojson.bz2', 'r');

		stream_filter_append($handle, 'bzip2.decompress', STREAM_FILTER_READ);

		$listener = new Listener(function(Feature $item) {
			$this->count++;
		});
		$parser = new JsonStreamingParser_Parser($handle, $listener);
		$parser->parse();

		$this->assertEquals(9, $this->count);
	}
}
