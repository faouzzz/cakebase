<?php
App::uses('AppController', 'Controller');

/**
 * Groups Controller
 *
 * @property Group $Group
 */
class GroupsController extends AppController {

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Group->recursive = 0;
		$this->set('groups', $this->paginate());
	}

/**
 * admin_view method
 *
 * @param string $id
 * @throws NotFoundException If the group cannot be found
 * @return void
 */
	public function admin_view($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}

		$this->paginate = array(
			'User' => array('limit' => 5)
		);

		$this->set('users', $this->paginate('User'));

		$this->set('group', $this->Group->findById($id));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Group->create();
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been saved'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be saved. Please, try again'), 'Flash/error');
			}
		}
	}

/**
 * admin_edit method
 *
 * @param string $id
 * @throws NotFoundException If the group cannot be found
 * @return void
 */
	public function admin_edit($id = null) {
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Group->save($this->request->data)) {
				$this->Session->setFlash(__('The group has been updated'), 'Flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The group could not be updated Please, try again'), 'Flash/error');
			}
		} else {
			$this->request->data = $this->Group->findById($id);
		}
	}

/**
 * admin_delete method
 *
 * @param string $id
 * @throws MethodNotAllowedException If the request method is not post
 * @throws NotFoundException If the group cannot be found
 * @return void
 */
	public function admin_delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Group->id = $id;
		if (!$this->Group->exists()) {
			throw new NotFoundException(__('Invalid group'));
		}
		if ($this->Group->delete()) {
			$this->Session->setFlash(__('Group deleted'), 'Flash/success');
			$this->redirect($this->referer(array('action' => 'index')));
		}
		$this->Session->setFlash(__('Group was not deleted'), 'Flash/error');
		$this->redirect($this->referer(array('action' => 'index')));
	}
}