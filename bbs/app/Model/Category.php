<?php
class Category extends AppModel {
	public $name = 'Category';
	public $order = 'Category.created ASC';

	public $hasMany = 'Thread';

	public $validate = array(
		'title' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => '*タイトルを入力してください。',
				'on' => 'create',
			),
		),
	);
}