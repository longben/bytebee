<?php
class InterlinkagesController extends AppController {

	var $name = 'Interlinkages';

	function index() {
		$this->Interlinkage->recursive = 0;
		$this->set('interlinkages', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid interlinkage', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('interlinkage', $this->Interlinkage->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Interlinkage->create();
			if ($this->Interlinkage->save($this->data)) {
				$this->Session->setFlash(__('The interlinkage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interlinkage could not be saved. Please, try again.', true));
			}
		}
		$types = $this->Interlinkage->Type->find('list');
		$this->set(compact('types'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid interlinkage', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Interlinkage->save($this->data)) {
				$this->Session->setFlash(__('The interlinkage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interlinkage could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Interlinkage->read(null, $id);
		}
		$types = $this->Interlinkage->Type->find('list');
		$this->set(compact('types'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for interlinkage', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Interlinkage->delete($id)) {
			$this->Session->setFlash(__('Interlinkage deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Interlinkage was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Interlinkage->recursive = 0;
		$this->set('interlinkages', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid interlinkage', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('interlinkage', $this->Interlinkage->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Interlinkage->create();
			if ($this->Interlinkage->save($this->data)) {
				$this->Session->setFlash(__('The interlinkage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interlinkage could not be saved. Please, try again.', true));
			}
		}
		$types = $this->Interlinkage->Type->find('list');
		$this->set(compact('types'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid interlinkage', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Interlinkage->save($this->data)) {
				$this->Session->setFlash(__('The interlinkage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The interlinkage could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Interlinkage->read(null, $id);
		}
		$types = $this->Interlinkage->Type->find('list');
		$this->set(compact('types'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for interlinkage', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Interlinkage->delete($id)) {
			$this->Session->setFlash(__('Interlinkage deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Interlinkage was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>