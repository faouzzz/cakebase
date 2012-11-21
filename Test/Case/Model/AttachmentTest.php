<?php
/* Attachment Test cases generated on: 2012-05-07 19:27:08 : 1336418828*/
App::uses('Attachment', 'Model');

/**
 * Attachment Test Case
 *
 */
class AttachmentTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.attachment');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

		$this->Attachment = ClassRegistry::init('Attachment');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Attachment);

		parent::tearDown();
	}

}
