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
        $result = $this->testAction('/admin/users/index');
        //var_dump($result);
        //die();
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
        /*
        $this->Users->Session->write('Auth.User', array(
            'id' => 5,
            'email' => 'admin@eaxample.com',
            'group_id' => 1,
        ));
        */
        $data = array(
            'User' => array(
                'first_name'        => 'Test',
                'last_name'         => 'User',
                'email'             => 'test@email.com',
                'password'          => 'password',
                'confirm_password'  => '',
            ),
        );
        
        $result = $this->testAction('admin/users/add', array('data' => $data, 'method' => 'post', 'return' => 'view'));
        debug($this->vars);
        die();
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
