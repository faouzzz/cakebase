<?php 
App::uses('Controller', 'Controller');
App::uses('View', 'View');
App::uses('ProgressHelper', 'View/Helper');

class MenuHelperTest extends CakeTestCase {
    public function setUp() {
		parent::setUp();
		$Controller = new Controller();
		$View = new View($Controller);
		$this->Menu = new MenuHelper($View);
    }

    public function testMenu() {
    	$result = $this->Menu->menu(array(
    		'Item 1' => array('controller' => 'users', 'action' => 'add')
		));
		die();
    }
}
?>