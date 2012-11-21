<?php
/* Users Test cases generated on: 2012-03-13 19:59:39 : 1331668779*/
App::uses('UsersController', 'Controller');

/**
 * TestUsersController *
 */
class TestUsersController extends UsersController {
/**
 * Auto render
 *
 * @var boolean
 */
	public $autoRender = false;

/**
 * Redirect action
 *
 * @param mixed $url
 * @param mixed $status
 * @param boolean $exit
 * @return void
 */
	public function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;                
	}   
       
}

/**
 * UsersController Test Case
 *
 */
class UsersControllerTestCase extends ControllerTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.user', 'app.group');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();

        $request = new CakeRequest();
        $response = new CakeResponse();
        
        $this->Users = new TestUsersController($request, $response);
        $this->Users->constructClasses();
        $this->Users->request->params['controller'] = 'users';
        $this->Users->request->params['pass'] = array();
        $this->Users->request->params['named'] = array();
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Users);

		parent::tearDown();
	}

/**
 * testAdminIndex method
 *
 * @return void
 */
	public function testAdminIndex() {
        
        $this->Users->Session->write('Auth.User', array(
            'id' => 5,
            'email' => 'liam@nanothree.net',
            'group_id' => 1,
        ));
        
        $this->testAction('admin/users/index');

    }

/**
 * testAdminView method
 *
 * @return void
 */
	public function testAdminView() {

	}

/**
 * testAdminAdd method
 *
 * @return void
 */
	public function testAdminAdd() {
        echo 'boom';
        $this->Users->Session->write('Auth.User', array(
            'id' => 5,
            'email' => 'liam@nanothree.net',
            'group_id' => 1,
        ));
        
        $this->Users->request->data = array(
            'User' => array(
                'first_name'        => 'Test',
                'last_name'         => 'User',
                'email'             => 'test@email.com',
                'password'          => 'password',
                'confirm_password'  => '',
            ),
        );
        
        $result = $this->testAction('admin/users/add', array('method' => 'post', 'type' => 'contents'));
        debug($this->Users);
        debug($this->vars);
        debug($this->view);
        debug($this->contents);
        debug($this->result);
        debug($result);
        //debug($this->data);
        debug($this->contents);
        debug($this);
        die();
        $this->assert();
	}

/**
 * testAdminEdit method
 *
 * @return void
 */
	public function testAdminEdit() {

	}

/**
 * testAdminDelete method
 *
 * @return void
 */
	public function testAdminDelete() {

	}

    
}
