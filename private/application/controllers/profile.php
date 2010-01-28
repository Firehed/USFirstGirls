<?php
class Profile_Controller extends Template_Controller {
	public function index() {
		if (!$this->user) {
			$this->error(Kohana::lang('errors.profile.index'));
			url::redirect('');
		}
		$this->tpl->user = $this->user;
		$this->tpl->team = $this->user->team;
	} // function index

	public function edit() {
		if (!$this->user) {
			$this->error(Kohana::lang('errors.profile.edit'));
			url::redirect('');
		}
		
		if (form::valid()) {
			$this->user->team_number = $this->input->post('teamNumber');
			$this->user->name        = $this->input->post('name');
			if ($this->user->save()) {
				url::redirect('profile');
			}
			else {
				$this->error($this->user->exceptions);
			}
		}

		$this->tpl->user = $this->user;
		$this->tpl->team = $this->user->team;
	} // function edit
	
} // class Profile_Controller
