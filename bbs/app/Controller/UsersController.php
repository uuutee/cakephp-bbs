<?php
class UsersController extends AppController {
	public $name = 'Users';
	
	public function isAuthorized($user) {
		if (parent::isAuthorized($user)) {
			return true;
		}
		if ($this->action === 'login' || $this->action === 'logout') {
			return true;
		}
		$this->Session->setFlash('権限がありません。', 'default', array('class' => 'alert alert-danger'));
		return false;
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
	}
	
	public function login() {		
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				$this->Session->setFlash('ログインしました。', 'default', array('class' => 'alert alert-success'));
				$this->redirect($this->Auth->redirect());
			}
			 else {
				$this->Session->setFlash('ユーザー名またはパスワードが無効です。', 'default', array('class' => 'alert alert-danger'));
			}
		}
	}
	
	public function logout() {
		$this->Session->setFlash('ログアウトしました。', 'default', array('class' => 'alert alert-success'));
		$this->redirect($this->Auth->logout());
	}
}
