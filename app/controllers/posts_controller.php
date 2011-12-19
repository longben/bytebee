<?php
class PostsController extends AppController {

	var $name = 'Posts';
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax','Ck');

	var $uses = array('Post', 'Module');

	function beforeFilter() {

        if ($this->action == 'upload') {
            $this->Session->id($this->params['pass'][0]);
            $this->Session->start();
        }

        parent::beforeFilter();
	}
	

	function upload(){
		set_time_limit(1800);
		App::import('Vendor', '/utils/file');
		$this->layout = 'media';
		Configure::write('debug', 0);
		if(!empty($this->params['form']['Filedata'])) {
			$uploadpath = "files/download/";
			$_tmp_filename = $this->params['form']['Filedata']['name'];
			$_new_filename = md5(time().$_tmp_filename).'.'.getFileExtension($_tmp_filename);
			$uploadfile = $uploadpath . $_new_filename;
			if(move_uploaded_file($this->params['form']['Filedata']['tmp_name'], $uploadfile)){
				$this->set('txt',  $_new_filename);
			}else {
				$this->set('txt', '');
			}
		}
	}
	
	function download() {
		$this->view = 'Media';

        /**
         *Also, remember that 'path' is relative to your app directory and requires a trailing DS (directory separator).
         * Therefore if you have a path like /home/bob/cake/app/files_for_download, you specify: 'path'=>'files_for_download'.DS
         */
		App::import('Vendor', '/utils/file');
		$params = array(
			'id' => $this->params['named']['s'],
			'name' => $this->params['named']['t'],
			'download' => true,
			'extension' => getFileExtension($this->params['named']['s']),
			'path' => 'webroot' . DS . 'files' . DS . 'download' . DS
		);
		$this->set($params);
	}

	function admin_manage($category_id, $category_name) {
	    
		if(!empty($this->data['k'])){
			$_conditions = array('Post.post_status' => 'publish', 'Post.post_type' => 'post', 'Meta.category' => $category_id, 'Post.post_title LIKE' => '%'.$this->data['k'].'%');
			$this->set('k', $this->data['k']);
		}elseif(!empty($this->params['named']['k'])){
			$_conditions = array('Post.post_status' => 'publish', 'Post.post_type' => 'post', 'Meta.category' => $category_id, 'Post.post_title LIKE' => '%'.$this->params['named']['k'].'%');
			$this->set('k', $this->params['named']['k']);
		}else{
		    $_conditions = array('Post.post_status' => 'publish', 'Post.post_type' => 'post', 'Meta.category' => $category_id);
			$this->set('k', '');
		}
		
		$this->paginate['Post'] = array(
				 'conditions' => $_conditions, 
				 'recursive' => 0, //int
				 'fields' => array('Post.id', 'Post.post_title', 'Meta.elite','Post.post_status', 'Post.post_date', 'Meta.category'),
				 'order' => 'Meta.elite, Post.post_date desc',
				 'limit' => 15, //int
				 'page' => null //int
		);
		$this->set('posts', $this->paginate('Post'));

		$this->set('category_id', $category_id);
		$this->set('category_name', $category_name);

	}

	function admin_add($category_id, $category_name) {
	    $this->layout = 'cake';
		if (!empty($this->data)) {
			$reg = "/<img[^>]+src=(['\"])(.+)\\1/isU"; //过滤规则
			preg_match($reg, $this->data['Post']['post_content'], $matche);
			if(!empty($matche)){
				$this->data['Meta']['picture'] = $matche[2];
			}
			$this->Post->create();
			$this->data['Post']['post_date'] = date("Y-m-d H:i:s");
			$this->data['Post']['post_author'] = $this->Session->read('id');

			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('文章保存成功!', true));
				$this->redirect(array('action'=>'manage' , $this->data['Post']['category'], $this->data['Post']['category_name']));
			} else {
				$this->Session->setFlash(__('文章没有保存成功，请检查后重试。', true));
			}
		}
		$this->set('category_id', $category_id);
		$this->set('category_name', $category_name);
	}


	function admin_edit($id = null,$category_id = null, $category_name=null) {
	    $this->layout = 'cake';
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('无效的请求!', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('文章修改保存成功!', true));
				$this->redirect(array('action'=>'manage', $this->data['Post']['category'], $this->data['Post']['category_name']));
			} else {
				$this->Session->setFlash(__('文章没有保存成功，请检查后重试。', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
		$this->set('category_id', $category_id);
		$this->set('category_name', $category_name);
	}

	function admin_delete($id = null,$category_id, $category_name) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Post', true));
			$this->redirect(array('action'=>'manage', $category_id, $category_name));
		}
		$this->Post->id = $id;
		if ($this->Post->delete()) {
			$this->Session->setFlash(__('文章删除成功!', true));
			$this->redirect(array('action'=>'manage', $category_id, $category_name));
		}
	}


	function admin_index() {
	
		if(!empty($this->data['k'])){
			$_conditions = array('Post.post_status' => 'publish', 'Meta.picture <>' => null ,'Post.post_type' => 'post', 'Post.post_title LIKE' => '%'.$this->data['k'].'%');
			$this->set('k', $this->data['k']);
		}elseif(!empty($this->params['named']['k'])){
			$_conditions = array('Post.post_status' => 'publish', 'Meta.picture <>' => null ,'Post.post_type' => 'post', 'Post.post_title LIKE' => '%'.$this->params['named']['k'].'%');
			$this->set('k', $this->params['named']['k']);
		}else{
		    $_conditions = array('Post.post_status' => 'publish', 'Meta.picture <>' => null ,'Post.post_type' => 'post');
			$this->set('k', '');
		}
		
		$this->paginate['Post'] = array(
				 'conditions' => $_conditions, 
				 'recursive' => 0, //int
				 'fields' => array('Post.id', 'Post.post_title', 'Meta.elite','Post.post_status', 'Post.post_date', 'Meta.category'),
				 'order' => 'Post.post_date desc',
				 'limit' => 15, //int
				 'page' => null //int
		);
		$this->set('posts', $this->paginate('Post'));
	}
	
	function admin_update_elite($id){
	    $this->layout = 'ajax';
		$this->data = $this->Post->read(null, $id);
		
		if(1 == $this->data['Meta']['elite']){
		    $this->data['Meta']['elite'] = 0;
		}else{
		    $this->data['Meta']['elite'] = 1;
		}
		$this->Post->Meta->save($this->data);
		
		$this->Session->setFlash(__('状态更新成功!', true));
        $this->redirect(array('action'=>'index'));		
		
	}

	function view($id) {
		$this->layout = 'blank';
		$this->set('post', $this->Post->read(null, $id));
	}
}
?>