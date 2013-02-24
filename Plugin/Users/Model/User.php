<?php
App::uses('UsersAppModel', 'Users.Model');
/**
 * User Model
 *
 * @property Group $Group
 */
class User extends UsersAppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'email';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'email' => array(
			'email' => array(
				'rule' => array('email'),
			),
			'unique' => array(
				'rule' => array('isUnique'),
				'message' => 'Email address is already in use',
			)
		),
		'password' => array(
			'between' => array(
				'rule' => array('between', 6, 20),
			),
			'notempty' => array(
				'rule' => array('notempty'),
				'required' => false,
			),
			'matches' => array(
				'rule' => array('matches', 'confirm_password'),
				'message' => 'Passwords do not match',
			),
		),
		'confirm_password' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'required' => false,
			),
			'matches' => array(
				'rule' => array('matches', 'password'),
				'message' => 'Passwords do not match',
			),
		),
		'group_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
			),
		),
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Group' => array(
			'className' => 'Users.Group',
			'foreignKey' => 'group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * belongsTo associations
 *
 * @var array
 */
	public $hasOne = array();

/**
 * beforeValidate callback
 */
	public function beforeValidate($options = array()) {
		//if the password is empty we won't validate the confirm field
		if (!isset($this->data['User']['password']) || empty($this->data['User']['password'])) {
			unset($this->validate['confirm_password']);
		}

		return true;
	}

/**
 * beforeSave callback
 */
	public function beforeSave($options = array()) {
		//encrypt the user password
		if (isset($this->data['User']['password'])) {
			$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		}
		
		return true;
	}

/**
 * Checks $field matches $compareField. Return true if the fields are
 * equal
 *
 * @param string $field
 * @param string $compareField
 * @return boolean
 */
	public function matches($field, $compareField) {
		return ($this->data[$this->alias][$compareField] === array_shift($field));
	}
}
