<?php

use Phaza\SSR\Feature;

class FeatureTest extends TestCase {


	/**
	 * @var stdClass
	 */
	protected $testData;

	public function setUp() {
		parent::setUp();

		$this->testData = json_decode(json_encode(include __DIR__.'/../fixtures.php'));
	}

	public function testCanCreate() {
		$item = new Feature($this->testData);

		$this->assertInstanceOf( Feature::class, $item );
	}

	public function testPositionIsParsedCorrectly() {
		$data = $this->testData;
		$data->geometry->coordinates[0] = 'lng';
		$data->geometry->coordinates[1] = 'lat';

		$item = new Feature($data);

		$this->assertEquals('lat', $item->getPosition()->getLat());
		$this->assertEquals('lng', $item->getPosition()->getLng());
	}

	public function testDateTimeFieldsAreParsed() {
		$data = $this->testData;
		date_default_timezone_set('Europe/Oslo');

		$time = mktime(date("H"), date("i"), date("s"), 9, 23, 1985);

		$data->properties->for_regdato = $data->properties->skr_sndato = $data->properties->for_sist_endret_dt = '19850923';

		$item = new Feature($data);

		$this->assertInstanceOf(DateTime::class, $item->getNameDecisionDate());
		$this->assertInstanceOf(DateTime::class, $item->getRegistrationDate());
		$this->assertInstanceOf(DateTime::class, $item->getUpdatedAt());

		$this->assertLessThan(2, $time - $item->getNameDecisionDate()->getTimestamp()); // In case someone has a slow machine
		$this->assertLessThan(2, $time - $item->getRegistrationDate()->getTimestamp()); // In case someone has a slow machine
		$this->assertLessThan(2, $time - $item->getUpdatedAt()->getTimestamp());        // In case someone has a slow machine

	}

}
