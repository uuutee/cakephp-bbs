<?php
class CategoriesController extends AppController {
	public $name = 'Categories';
	public $error = false;
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('view');
	}

	public function view($id = null) {
		// データを引っ張るには、あらかじめ、$this->Model->id にidを指定する必要がある
		$this->Category->id = $id;
		// $this->Model->read() で読み出す
		$data = $this->Category->read();
		$this->set('data', $data);
		$this->set('title_for_layout', $data['Category']['title']);
	}

	public function add($id = null) {
		$this->set('id', $id);
		$this->set('title_for_layout', '新規追加');
		if (!empty($this->request->data)) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash('登録しました。', 'default', array('class' => 'alert alert-success'));
				$this->redirect(array(
					'controller' => 'tops',
					'action'     => 'index',
				));
			} 
			else {
				$this->Session->setFlash('登録できませんでした。', 'default', array('class' => 'alert alert-danger'));
			}
		}
	}

	public function index() {
		$this->set('title_for_layout', 'カテゴリ一覧');

		$data = $this->Category->find(
			'all',
			array(
				'conditions' => array('Category.flag !=' => 1)
			)
		);
		$this->set('data', $data);		
	}

	public function delete() {
		if (!empty($this->request->data) && in_array('1', $this->request->data['Category'])) {
			$count = 1;
			$data = array();
			unset($this->request->data['Category']['check-all']);
			foreach ($this->request->data['Category'] as $key => $value) {
				if ($value === '1') {
					$data[$count]['id'] = $key;
					$data[$count]['flag'] = 1;
					$category_ids[] = $key;
				}
				$count++;
			}
			
			if ($this->Category->saveAll($data)) {
				$this->Session->setFlash('削除しました。', 'default', array('class' => 'alert alert-success'));
			} 
			else {
				$this->Session->setFlash('削除できませんでした。', 'default', array('class' => 'alert alert-danger'));
			}

			$this->redirect(array('action' => 'index'));
		} 
		else {
			$this->Session->setFlash('選択してください。', 'default', array('class' => 'alert alert-danger'));
			$this->redirect(array('action' => 'index'));
		}
	}
}
