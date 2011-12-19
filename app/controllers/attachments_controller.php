<?php
class AttachmentsController extends AppController {

	var $name = 'Attachments';
	
    function beforeFilter() {
        if ($this->action == 'upload') {
            $this->Session->id($this->params['pass'][0]);
            $this->Session->start();
        }
        parent::beforeFilter();
    }		

	function admin_index($type = 1) {
        $this->layout = 'cake';
		$this->Attachment->recursive = 0;
		$this->set('attachments', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid attachment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('attachment', $this->Attachment->read(null, $id));
	}

	function admin_add() {
	    $this->layout = 'cake';
		if (!empty($this->data)) {
			$this->Attachment->create();
			$this->data['Attachment']['url'] = $this->Session->read('uploadFile');
			if ($this->Attachment->save($this->data)) {
				$this->Session->setFlash(__('文件保存成功！', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.', true));
			}
		}
		$attachmentTypes = $this->Attachment->Type->find('list');
		$this->set(compact('attachmentTypes'));
	}

	function admin_edit($id = null) {
	    $this->layout = 'cake';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid attachment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
		    $this->data['Attachment']['url'] = $this->Session->read('uploadFile');
			if ($this->Attachment->save($this->data)) {
				$this->Session->setFlash(__('文件保存成功！', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The attachment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Attachment->read(null, $id);
		}
		$this->set('referer', $this->referer());
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for attachment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Attachment->delete($id)) {
			$this->Session->setFlash(__('attachment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('attachment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function upload(){
	
		if(isset($_REQUEST['PHPSESSID'])) {
		   session_id($_REQUEST['PHPSESSID']);
		}
	
	    Configure::write('debug', 0);
		App::import('Vendor', '/utils/file');		

			
		$upload_path = WWW_ROOT."files/download/";
		$_tmp_filename = $_FILES['uploadFile']['name'];
		$_new_filename = md5(time().$_tmp_filename).'.'.getFileExtension($_tmp_filename);
		$uploadfile = $upload_path . $_new_filename;
		
		move_uploaded_file($_FILES['uploadFile']['tmp_name'], $uploadfile);
			
		$this->Session->write('uploadFile', $_new_filename);
		
	}
	
}
?>