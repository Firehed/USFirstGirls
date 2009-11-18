<?php
abstract class Template_Controller extends Controller {
	public $template = 'main';

	// public $scripts    = array();
	// public $rawScripts = array();

	protected $titleValues = array();
	
	public function __construct() {
		parent::__construct();
		$this->template = new View($this->template);
		$this->template->controller = new View(Router::$controller);
		$this->tpl = $this->template->controller->method = new View(Router::$controller . '/' . Router::$method);
	
		Event::add('system.post_controller', array($this, '_render'));
		
	} // function __construct
	
	public function _render() {
		$this->template->title   = Kohana::lang('titles.' . Router::$controller . '.' . Router::$method, $this->titleValues);
		/*
		// Per-page javascript support
		$this->template->scripts = '';
		foreach ($this->rawScripts as $js) {
			$this->template->scripts .= $js;
		}
		foreach ($this->scripts as $script) {
			$this->template->scripts .= file_get_contents(APPPATH . 'views/' . $script) . "\n";
		}
		*/
		
		$this->template->errors = $this->session->get('errors');
		$this->template->messages = $this->session->get('messages');
		// Strictly speaking this shouldn't be necessary, but set_flash is a little flaky for same-page behavior
		$this->session->delete('errors');
		$this->session->delete('messages');
		
		
		$this->template->render(true);
		
	} // function _render
	
/*
	protected function rawScript($js) {
		$this->rawScripts[] = "$js\n";
	} // function rawScript

	protected function script($jsPath) {
		if (is_array($jsPath)) {
			$this->scripts = array_merge($this->scripts, $jsPath);
		}
		else {
			$this->scripts[] = $jsPath;
		}
	} // function script
*/	
} // class Template_Controller