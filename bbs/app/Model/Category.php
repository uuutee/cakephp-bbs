<?php
class Category extends AppModel {
	public $name = 'Category';
	public $order = 'Category.created ASC';

	public $hasMany = 'Thread';
}