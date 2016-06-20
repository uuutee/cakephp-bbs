<?php
class Comment extends AppModel {
	public $name = 'Comment';
	public $order = 'Comment.created ASC';

	public $belongsTo = 'Thread';

	public $validate = array(
		'title' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => '*タイトルを入力してください。',
				'on' => 'create',
			),
		),
		'author_name' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => '*名前を入力してください。',
				'on' => 'create',
			),
		),
		'body' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => '*本文を入力してください。',
				'on' => 'create',
			),
		),
		'author_passwd' => array(
			'required' => array(
				'rule' => array('notEmpty'),
				'message' => '*パスワードを入力してください。',
				'on' => 'create',
			),
			'between' => array(
				'rule' => array('between', 4, 32),
				'message' => '*パスワードは4〜32文字で入力してください。',
				'on' => 'create',
			)
		),
	);
}
