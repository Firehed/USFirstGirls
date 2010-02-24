<?php
class Team_Controller extends Template_Controller {

	public function edit() {
		if (!$this->user) {
			$this->error('team.edit');
			url::redirect('');
		}
		
		$team = $this->tpl->team = $this->user->team;
		
		if (form::valid()) {
			if (!$team->loaded) {
				$team->number = $this->user->team_number;
			}
			$team->name      = $this->input->post('name');
			$team->location  = $this->input->post('location');
			$team->website   = $this->input->post('website');
			$team->recruited = $this->input->post('recruited');
			$team->methods   = $this->input->post('methods');
			$team->girls     = $this->input->post('girlsOnTeam');
			$team->size      = $this->input->post('teamSize');
			if ($team->save()) {
				url::redirect('profile');
			}
			else {
				$this->error($team->exceptions);
			}
		}
	} // function edit
	
	public function all() {
		$this->tpl->teams = ORM::factory('team')->find_all();
	} // function all
	
} // class Team_Controller
