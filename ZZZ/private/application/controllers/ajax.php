<?php
class Ajax_Controller extends Controller {
	public function jsSupport() {
		$this->session->set('js', 'on');
		echo 'wooties';
		
	} // function jsSupport
	
} // class Ajax_Controller
