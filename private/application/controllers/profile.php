<?php
class Profile_Controller extends Template_Controller {
	public function index() {
		if (!$this->user) {
			$this->error('profile.index');
			url::redirect('');
		}
		$this->tpl->user = $this->user;
	} // function index

	public function edit() {
		if (!$this->user) {
			$this->error('profile.edit');
			url::redirect('');
		}
		else {
			$profile = $this->user->profile_2011;
		}
		
		if (form::valid()) {
			foreach ($this->input->post() as $k => $v) {
				if (substr($k, 0, 8) == 'profile_') {
					$prop = substr($k, 8);
					$profile->$prop = $v;
				}
			}
			if ($profile->save()) {
				$this->message('woot');
				url::redirect('profile');
			}
			else {
				$this->error('fail');
			}
		}

		$this->tpl->user = $this->user;
		$this->tpl->profile = $profile;
	} // function edit
	
} // class Profile_Controller
