<?php
class Session_Controller extends Template_Controller {
	
	public function signin() {
		if (!$this->session->get('referrer')) {
			$referrer = request::referrer();
			if (Router::$current_uri != $referrer AND Router::$routed_uri != $referrer) {
				$this->session->set('referrer', $referrer);
			}
		}
		
		if (form::valid()) {
			if ($this->auth->login($this->input->post('username'), $this->input->post('password'), true)) {
				$this->message('session.signin');
				url::redirect($this->session->get_once('referrer'), '');
			}
			else {
				$this->error('session.signin');
			}
		}
	} // function singin
	
	public function signout() {
		$this->auth->logout();
		url::redirect(request::referrer());
	} // function signout
	
	public function signup() {
		if (form::valid()) {
			$user = new User_Model;
			$user->email       = $this->input->post('email');
			$user->team_number = $this->input->post('teamNumber');
			$user->password    = $this->input->post('password');
			
			if ($user->add(ORM::factory('role', 'login')) AND $user->save()) {
				$this->auth->login($this->input->post('email'), $this->input->post('password'));
				$this->message('session.signup');
				url::redirect('team/edit');
			}
			else {
				$this->error($user->exceptions);
			}
		}
	} // function signup

} // class Session_Controller