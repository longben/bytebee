<?php
class CodesController extends AppController {

	var $name = 'Codes';


	function admin_index() {
		$this->Code->recursive = 0;
		$this->set('codes', $this->paginate());
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Code->create();
			if ($this->Code->save($this->data)) {
				$this->Session->setFlash(__('The code has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid code', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Code->save($this->data)) {
				$this->Session->setFlash(__('The code has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The code could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Code->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for code', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Code->delete($id)) {
			$this->Session->setFlash(__('Code deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Code was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>