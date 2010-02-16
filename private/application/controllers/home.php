<?php
class Home_Controller extends Template_Controller {

	public function index() {
		$data = ORM::factory('data')->find_all()->select_list();
		$this->tpl->data = $data;

		$percentGirls = round($data['girlCount'] / $data['studentCount'] * 100);
		$this->tpl->percentGirls = $percentGirls;
		$this->tpl->percentGuys  = 100 - $percentGirls;
		
		$percentNewGirls = round($data['addedCount'] / $data['girlCount'] * 100);
		$this->tpl->percentNewGirls = $percentNewGirls;
		$this->tpl->percentVeteranGirls = 100 - $percentNewGirls;

/*		http://chart.apis.google.com/chart?
		chs=250x100
		&chf=bg,s,5F0E84
		&chco=00ff00,008800
		&chd=t:70:30
		&cht=p3
		&chl=Students|Girls
*/		
	} // function index
	
} // class Home_Controller
