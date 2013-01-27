<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->User->recursive = 0;

		$this->paginate = array(
			'limit' => 5
		);

		$this->set('users', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @throws NotFoundException If the user cannot be found
 * @return void
 */
	public function admin_view($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('user', $this->User->findById($id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'Flash/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again'), 'Flash/error');
			}
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @throws NotFoundException If the user cannot be found
 * @return void
 */
	public function admin_edit($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is('post') || $this->request->is('put')) {
			//if no password is present then we won't update
			if (empty($this->request->data['User']['password'])) {
				unset($this->request->data['User']['password']);
			}
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been updated'), 'Flash/success');
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be updated Please, try again'), 'Flash/error');
			}
		} else {
			$this->request->data = $this->User->findById($id);
			//unset the password so it doesn't get overwritten
			unset($this->request->data['User']['password']);
		}
		$groups = $this->User->Group->find('list');
		$this->set(compact('groups'));
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @throws MethodNotAllowedException If the request method is not post
 * @throws NotFoundException If the user cannot be found
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'Flash/success');
			return $this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(__('User was not deleted'), 'Flash/error');
		$this->redirect($this->referer(array('action' => 'index')));
	}

/**
 * admin_login method
 *
 * @return void
 */
	public function admin_login() {
		$this->layout = 'login';
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect($this->Auth->redirect());
			} else {
				$this->Session->setFlash(__('Your username or password was incorrect'), 'Flash/error');
			}
		}
	}

/**
 * admin_logout method
 *
 * @return void
 */
	public function admin_logout() {
		$this->Session->setFlash(__('You have been logged out'), 'Flash/success');
		return $this->redirect($this->Auth->logout());
	}

/**
 * admin_profile method
 *
 * @return type
 */
	public function admin_profile() {
		if ($this->request->is('post') || $this->request->is('put')) {
			//if no password is present then we won't update
			if (empty($this->request->data['User']['password'])) {
				unset($this->request->data['User']['password']);
			}

			if ($this->User->Profile->saveAll($this->request->data)) {
				$this->Session->setFlash(__('Profile Updated'), 'Flash/success');
				return $this->redirect(array('action' => 'profile'));
			} else {
				$this->Session->setFlash(__('There were errors updating your profile'), 'Flash/error');
			}

			$this->request->data = Set::merge($this->User->find('first', array(
				'contain' => array('Profile.ProfileImage'),
				'conditions' => array('User.id' => $this->Auth->user('id')),
			)), $this->request->data);
		} else {
			$this->request->data = $this->User->find('first', array(
				'contain' => array('Profile.ProfileImage'),
				'conditions' => array('User.id' => $this->Auth->user('id')),
			));
			unset($this->request->data['User']['password']);
		}
	}

}
