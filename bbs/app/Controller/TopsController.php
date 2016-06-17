<?php
class TopsController extends AppController {
	public $name = 'Tops';
	// 複数modelのデータを扱う
	var $uses = array('Category', 'Thread', 'Comment');
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('*');
	}
	
	public function index() {
		$this->set('categories', $this->Category->find('all'));
		$this->set('threads', $this->Thread->find('all'));
		$this->set('comments', $this->Comment->find('all'));
	}
}
