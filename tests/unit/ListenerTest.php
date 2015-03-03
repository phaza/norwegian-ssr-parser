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
}
