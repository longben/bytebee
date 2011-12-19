<?php
class GuestbooksController extends AppController {

	var $name = 'Guestbooks';

	function add() {
		if (!empty($this->data)) {
			$this->Guestbook->create();
			if ($this->Guestbook->save($this->data)) {
				$this->Session->setFlash(__('您的留言已经保存成功，留言会在管理员回复后显示。', true));
				$this->redirect(array('controller'=> 'eojia', 'action' => 'guestbook'));
			} else {
				$this->Session->setFlash(__('留言保存失败！', true));
			}
		}
	}
	
	function add2() {
		if (!empty($this->data)) {
			$this->Guestbook->create();
			if ($this->Guestbook->save($this->data)) {
				$this->Session->setFlash(__('您的加盟内容已经保存，工作人员处理后会同您联系。', true));
				$this->redirect('/investment/join_in');
			} else {
				$this->Session->setFlash(__('加盟内容保存失败！', true));
			}
		}
	}	

	function admin_index() {
        $this->layout = 'cake';

		$this->Guestbook->recursive = 0;

		$this->paginate['Guestbook'] = array(
		         'conditions' => 'Guestbook.message_type = 1', 
				 'recursive' => 0, //int
				 'order' => 'Guestbook.flag, Guestbook.created',
				 'limit' => 15, //int
				 'page' => null //int
		);
        
		$this->set('guestbooks', $this->paginate('Guestbook'));
	}
	
	function admin_index1() {
        $this->layout = 'cake';

		$this->Guestbook->recursive = 0;

		$this->paginate['Guestbook'] = array(
		         'conditions' => 'Guestbook.message_type = 0', 
				 'recursive' => 0, //int
				 'order' => 'Guestbook.flag, Guestbook.created',
				 'limit' => 15, //int
				 'page' => null //int
		);
        
		$this->set('guestbooks', $this->paginate('Guestbook'));
	}	


	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid guestbook', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
            if(empty($this->data['Guestbook']['reply_content'])){
               $this->data['Guestbook']['flag'] = 0;
            }else{
               $this->data['Guestbook']['flag'] = 1;
            }
			if ($this->Guestbook->save($this->data)) {
				$this->Session->setFlash(__('客户留言已经回复（修改）。', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The guestbook could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Guestbook->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for guestbook', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Guestbook->delete($id)) {
			$this->Session->setFlash(__('留言已经删除。', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Guestbook was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>