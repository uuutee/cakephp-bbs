<?php
class CommentsController extends AppController {
	public $name = 'Comments';
	public $error = false;
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('*');
	}
	
	public function view($id = null) {
		// データを引っ張るには、あらかじめ、$this->Model->id にidを指定する必要がある
		$this->Comment->id = $id;
		// $this->Model->read() で読み出す
		$this->set('comment', $this->Comment->read());
	}

	public function add($id = null) {
		$this->set('id', $id);
		$this->set('title_for_layout', '新規追加');
		if (!empty($this->request->data)) {
			if ($this->Comment->save($this->request->data)) {
				$this->Session->setFlash('登録しました。', 'default', array('class' => 'flash-success'));
				$this->redirect(array('controller' => 'threads', 'action' => 'view', $this->request->data['thread_id']));
			} 
			else {
				$this->Session->setFlash('登録できませんでした。', 'default', array('class' => 'flash-error'));
			}
		}
	}
}
