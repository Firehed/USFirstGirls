<?php
class Session_Controller extends Template_Controller {
	
	public function signin() {
		if (form::valid()) {
			if ($this->auth->login($this->input->post('username'), $this->input->post('password'), (bool) $this->input->post('remember', false))) {
				url::redirect($this->session->get_once('referrer'), '');
			}
			else {
				$this->error(Kohana::lang('errors.session.login'));
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
			$user->username = $this->input->post('username');
			$user->email    = $this->input->post('email');
			$user->password = $this->input->post('password');
			
			if ($user->add(ORM::factory('role', 'login')) AND $user->save()) {
				$this->auth->login($this->input->post('username'), $this->input->post('password'));
				$this->message(Kohana::lang('messages.session.register'));
			}
			else {
				$this->error($user->exceptions);
			}
		}
	} // function signup

} // class Session_Controller