<?php
App::uses('MetalPhrase', 'Model');

/**
 * MetalPhrase Test Case
 *
 */
class MetalPhraseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.metal_phrase'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MetalPhrase = ClassRegistry::init('MetalPhrase');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MetalPhrase);

		parent::tearDown();
	}

}
