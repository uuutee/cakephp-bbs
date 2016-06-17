<?php
class Comment extends AppModel {
	public $name = 'Comment';
	public $order = 'Comment.created ASC';

	public $belongsTo = 'Thread';
}
