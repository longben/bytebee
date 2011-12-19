<?php
class CommoditiesController extends AppController {

	var $name = 'Commodities';

	function index() {
		$this->Commodity->recursive = 0;
		$this->set('commodities', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid commodity', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('commodity', $this->Commodity->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Commodity->create();
			if ($this->Commodity->save($this->data)) {
				$this->Session->setFlash(__('The commodity has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commodity could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid commodity', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Commodity->save($this->data)) {
				$this->Session->setFlash(__('The commodity has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commodity could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Commodity->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for commodity', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Commodity->delete($id)) {
			$this->Session->setFlash(__('Commodity deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Commodity was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Commodity->recursive = 0;
		$this->set('commodities', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid commodity', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('commodity', $this->Commodity->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Commodity->create();
			if ($this->Commodity->save($this->data)) {
				$this->Session->setFlash(__('The commodity has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commodity could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid commodity', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Commodity->save($this->data)) {
				$this->Session->setFlash(__('The commodity has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commodity could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Commodity->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for commodity', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Commodity->delete($id)) {
			$this->Session->setFlash(__('Commodity deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Commodity was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
