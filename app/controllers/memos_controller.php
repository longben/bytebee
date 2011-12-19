<?php
class MemosController extends AppController {

	var $name = 'Memos';

	function admin_index() {
		$this->layout = 'blank';
	}

	function admin_add() {
	
		$this->data['Memo']['id'] = $this->Session->read('id');
		$this->data['Memo']['description'] = $_POST['memo_data'];
		if (!empty($this->data)) {
			if ($this->Memo->save($this->data)) {
				$this->Session->setFlash(__('备忘录保存成功', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The memo could not be saved. Please, try again.', true));
			}
		}
	}
}
?>