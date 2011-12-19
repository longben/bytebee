<?php
class UserMetasController extends AppController {

	var $name = 'UserMetas';

	function index() {
		$this->UserMeta->recursive = 0;
		$this->set('userMetas', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid user meta', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('userMeta', $this->UserMeta->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->UserMeta->create();
			if ($this->UserMeta->save($this->data)) {
				$this->Session->setFlash(__('The user meta has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user meta could not be saved. Please, try again.', true));
			}
		}
		$roles = $this->UserMeta->Role->find('list');
		$this->set(compact('roles'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid user meta', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->UserMeta->save($this->data)) {
				$this->Session->setFlash(__('The user meta has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user meta could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->UserMeta->read(null, $id);
		}
		$roles = $this->UserMeta->Role->find('list');
		$this->set(compact('roles'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for user meta', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->UserMeta->delete($id)) {
			$this->Session->setFlash(__('User meta deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('User meta was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>