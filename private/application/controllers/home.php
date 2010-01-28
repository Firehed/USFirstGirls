<?php
class Home_Controller extends Template_Controller {

	public function index() {
		// Nothing to see here... move along.
		$this->tpl->data = ORM::factory('data')->find_all()->select_list();
	} // function index
	
} // class Home_Controller
