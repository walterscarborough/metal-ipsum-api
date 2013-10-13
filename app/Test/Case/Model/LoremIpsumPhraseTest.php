<?php
App::uses('LoremIpsumPhrase', 'Model');

/**
 * LoremIpsumPhrase Test Case
 *
 */
class LoremIpsumPhraseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lorem_ipsum_phrase'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->LoremIpsumPhrase = ClassRegistry::init('LoremIpsumPhrase');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->LoremIpsumPhrase);

		parent::tearDown();
	}

}
