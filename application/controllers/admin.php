<?php
class Admin_Controller extends Template_Controller {
	protected static $actions = array(
		'blog'  => array('admin','blogger'),
		'forum' => array('admin'),
		'index' => array('admin','blogger'),
		'user'  => array('admin'),
	);
	
	public function _allowed($action) {
		return (bool) array_intersect($this->userRoles, self::$actions[$action]);
	} // function _allowed
	
	public function __construct() {
		parent::__construct();
		if (!$this->user) {
			throw new Kohana_404_Exception;
		}
		else {
			$this->userRoles = $this->user->roles->select_list();
		}

		// Basic permission-checking: a user must have at least one of the roles
		// in self::$actions[Router::$method] to access the page.
		if (!$this->_allowed(Router::$method)) {
			throw new Kohana_404_Exception;
		}
	} // function __construct
	
	public function index() {
	} // function index
	
	
} // class Admin_Controller
