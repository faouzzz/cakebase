<?php
/**
 * Command-line code generation utility to automate programmer chores.
 *
 * Bake is CakePHP's code generation script, which can help you kickstart
 * application development by writing fully functional skeleton controllers,
 * models, and views. Going further, Bake can also write Unit Tests for you.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         CakePHP(tm) v 1.2.0.5012
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('AppShell', 'Console/Command');
App::uses('Model', 'Model');
App::uses('Lib', 'Validation');
/**
 * Command-line code generation utility to automate programmer chores.
 *
 * Bake is CakePHP's code generation script, which can help you kickstart
 * application development by writing fully functional skeleton controllers,
 * models, and views. Going further, Bake can also write Unit Tests for you.
 *
 * @package       Cake.Console.Command
 * @link          http://book.cakephp.org/2.0/en/console-and-shells/code-generation-with-bake.html
 */
class UserShell extends Shell {

/**
 * Models required
 *
 * @var array
 */
	public $uses = array('Users.User', 'Users.Group');

/**
 * The connection being used.
 *
 * @var string
 */
	public $connection = 'default';


/**
 * Override main() to handle action
 *
 * @return mixed
 */
	public function main() {

		$this->out('User Shell');
		$this->hr();
		$this->out('[C]reate a user');
		$this->out('[Q]uit');

		$classToBake = strtoupper($this->in('What would you like to do?', array('C', 'Q')));
		switch ($classToBake) {
			case 'C':
				$this->hr();
				$this->create();
				break;
			case 'Q':
				exit(0);
				break;
			default:
				$this->out('You have made an invalid selection. Please choose an action from the list.');
		}
		$this->hr();
		$this->main();
	}

	public function create(){
		$this->out('Create A User');
		$this->hr();

		$groups = $this->Group->find('all', array('contain' => false));

		if(empty($groups)){
			$this->error("No groups are available. Run `cake Users.group create` to create some groups first");
			return false;
		}

		foreach($groups as $index => $group){
			$this->out(sprintf("%d. %s", $index + 1, $group['Group']['name']));
		}


		$group = false;

		while(!$group){
			$group = (int)$this->in("Choose a number from the list as the group for this user:");
			if(!intval($group) || !isset($groups[$group - 1])){
				$group = false;
				continue;
			}
			$group = $groups[$group - 1];
		}

		$email = false;

		while(!$email){
			$email = $this->in("Enter the user's email address:");

			if(!Validation::email($email)){
				$email = false;
				continue;
			}
		}

		$password = false;
		$passwordsDontMatch = true;

		while($passwordsDontMatch){
			$password = $this->in("Enter the user's password:");
			$confirmPassword = $this->in("Repeat the password:");

			if($password === $confirmPassword){
				$passwordsDontMatch = false;
			}else{
				$this->out('<error>Please enter matching passwords.</error>');
			}
		}

		$data = array('User' => array(
			'group_id' => $group['Group']['id'],
			'email' => $email,
			'password' => $password,
			'confirm_password' => $confirmPassword,
		));



		if($this->User->save($data)){
			$this->out("<success>User created!</success>");
		}else{
			$this->out("<error>User could not be created</error>");
			foreach($this->User->validationErrors as $field => $errors){
				foreach($errors as $error){
					$this->out("<info>$field: $error</info>");
				}
			}
			exit(0);
		}

		return true;
	}
}