<?php
class ThreadsController extends AppController {
	public $name = 'Threads';
	public $error = false;
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('*');
	}
	
	public function view($id = null) {
		// データを引っ張るには、あらかじめ、$this->Model->id にidを指定する必要がある
		$this->Thread->id = $id;
		// $this->Model->read() で読み出す
		$data = $this->Thread->read();
		$this->set('data', $data);
		$this->set('title_for_layout', $data['Thread']['title']);


	}

	public function add($id = null) {		
		$this->set('id', $id);
		$this->set('title_for_layout', '新規追加');

		if (!empty($this->request->data)) {
			if ($this->Thread->save($this->request->data)) {
				$this->Session->setFlash('投稿しました。', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array('controller' => 'categories', 'action' => 'view', $this->request->data['category_id']));
			} 
			else {
				$this->Session->setFlash('投稿できませんでした。', 'default', array('class' => 'alert alert-danger'));
				$this->redirect(array('controller' => 'categories', 'action' => 'view', $this->request->data['category_id']));
			}
		}
	}

	public function delete() {
		if (!empty($this->request->data)) {
			$user = $this->Auth->user();

			$original = $this->Thread->find('first', array(
				'conditions' => array(
					'Thread.id' => $this->request->data['id'],
				),
			));

			if (isset($user) || $this->request->data['author_passwd'] === $original['Thread']['author_passwd']) {
				if ($this->Thread->save($this->request->data)) {
					$this->Session->setFlash('削除しました。', 'default', array('class' => 'alert alert-success'));
					$this->redirect(array('controller' => 'categories', 'action' => 'view', $this->request->data['category_id']));
				} 								
				else {
					$this->Session->setFlash('削除できませんでした。', 'default', array('class' => 'alert alert-danger'));
					$this->redirect(array('controller' => 'categories', 'action' => 'view', $this->request->data['category_id']));
				}
			}
			else {
				$this->Session->setFlash('パスワードが違います。', 'default', array('class' => 'alert alert-danger'));
				$this->redirect(array('controller' => 'threads', 'action' => 'view', $this->request->data['id']));
			}
		}		
	}
}
