<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	
	public $components = array(
		'Session',
		'Auth' => array(
			'loginRedirect' => array('controller' => 'members', 'action' => 'login'),
			'logoutRedirect' => array('controller' => 'members', 'action' => 'login'),
			'loginAction' => array('controller' => 'members', 'action' => 'login'),
			'authError' => 'ログインしてください。',
			'loginError' => 'ログインに失敗しました。',
			'authorize' => array('Controller'),
			'authenticate' => array('Form' => array('userModel' => 'Member', 'fields' => array('username' => 'email'), 'scope' => array('Member.flag' => 0)))
		)
	);
	
	public function isAuthorized($user) {
		return true;
	}
	
	public function beforeFilter() {
		// $this->set('member', $this->Auth->User());
		
		// キャリア判定
		if (DEVICE_TYPE === 'mobile' && MT_MOBILE_USE === '1') {
			//$this->redirect('http://' . $_SERVER['SERVER_NAME'] . '/');
			$this->layout = 'mobile';
		} elseif (DEVICE_TYPE === 'sphone' && MT_SPHONE_USE === '1') {
			$this->layout = 'sphone';
		}
	}
}
