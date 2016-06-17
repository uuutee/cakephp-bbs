<?php
class Thread extends AppModel {
	public $name = 'Thread';
	public $order = 'Thread.created ASC';

	public $hasMany = 'Comment';
}