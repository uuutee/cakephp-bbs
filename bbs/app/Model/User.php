<?php
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {
	public $name = 'User';
	public $order = 'User.id ASC';
}
