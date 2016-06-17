<?php
class CategoriesController extends AppController {
	public $name = 'Categories';
	public $error = false;
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('*');
	}
	
	public function view($id = null) {
		// データを引っ張るには、あらかじめ、$this->Model->id にidを指定する必要がある
		$this->Category->id = $id;
		// $this->Model->read() で読み出す
		$this->set('data', $this->Category->read());
	}

	public function add($id = null) {
		$this->set('id', $id);
		$this->set('title_for_layout', '新規追加');
		if (!empty($this->request->data)) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('登録しました。', 'default', array('class' => 'flash-success'));
				 $this->redirect(array('action' => 'view', $id));
			} 
			else {
				$this->Session->setFlash('登録できませんでした。', 'default', array('class' => 'flash-error'));
			}
		}
	}
}
