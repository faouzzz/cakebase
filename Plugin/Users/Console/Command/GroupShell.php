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
class GroupShell extends Shell {

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

		$this->out('Group Shell');
		$this->hr();
		$this->out('[C]reate a group');
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
		$this->out('Create A Group');
		$this->hr();

		$name = $this->in('Please enter a group name:');

		$data = array('Group' => array('name' => $name));

		if($this->Group->save($data)){
			$this->out("<success>Group '$name' sucessfully created.</success>");
		}else{
			$this->out("<error>Group could not be created.</error>");
		}

		return true;
	}
}