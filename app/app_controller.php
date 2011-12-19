<?php
class AppController extends Controller {

    //var $uses = array('SysLog');
	
	public $components = array(
        'Session',
        'RequestHandler',
        'Captcha',
        'Security',
        'Acl',
        'Auth' => array(
            'authorize' => 'controller',
            'autoRedirect' => false,
            'loginRedirect' => array(
                'admin' => true,
                'controller' => 'platforms',
                'action' => 'index'
            ),
            'loginError' => '无效的用户名或口令',
            'authError' => 'You don\'t have the right permission'
        ),
        'Acl.AclFilter',		
	);

	public $helpers = array(
        'Html',
        'Form',
        'Session',
        'Text',
        'Js',
        'Time',
		'Xml'
	);
	
	function beforeFilter() {
	
        $this->Auth->authenticate = ClassRegistry::init('User');
		
		if (isset($this->params['admin']) && $this->params['admin']) {
			if(!$this->Session->check('Auth')) {
				$this->Session->setFlash(__('登录失效，请重新登录!', true));
			}
        }else{
            $this->Auth->allowedActions = array('*');
        }

        //$this->Auth->allowedActions = array('*');    
	   
	   // $browser = get_browser(null, true);
	   
 	   // $this->data['SysLog']['user_id'] = 1;
	   // $this->data['SysLog']['system_name'] = $browser['platform'];
	   // $this->data['SysLog']['brower_name'] = $browser['parent'];
	   // $this->data['SysLog']['ip'] = $this->RequestHandler->getClientIP();
	   // $this->data['SysLog']['page_name'] = $this->here;
	   // $this->data['SysLog']['type'] = 1;
	   // $this->data['SysLog']['module_id'] = 1;
	   
	   // $this->SysLog->save($this->data); 
	}
    
    public function isAuthorized() {
        return true;
    }

}
