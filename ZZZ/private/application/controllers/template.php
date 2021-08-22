<?php
abstract class Template_Controller extends Controller {
	public $template = 'main';

	// public $scripts    = array();
	// public $rawScripts = array();

	protected $titleValues = array();
	protected $links       = array();
	
	public function __construct() {
		parent::__construct();
		$this->template = new View($this->template);
		$this->template->controller = new View(Router::$controller);
		$this->tpl = $this->template->controller->method = new View(Router::$controller . '/' . Router::$method);
	
		Event::add('system.post_controller', array($this, '_render'));
		
	} // function __construct
	
	public function _render() {
		$this->template->title   = Kohana::lang('titles.' . Router::$controller . '.' . Router::$method, $this->titleValues);

		// Per-page javascript support
		// Todo: cache this information? Compress it? Write it out?
		$JS = '';
		if (file_exists(APPPATH.'views/'.Router::$controller.'.js')) {
			$JS .= file_get_contents(APPPATH.'views/'.Router::$controller.'.js');
		}
		if (file_exists(APPPATH.'views/'.Router::$controller.'/'.Router::$method.'.js')) {
			$JS .= file_get_contents(APPPATH.'views/'.Router::$controller.'/'.Router::$method.'.js');
		}
		$this->template->JS = $JS;

		// Per-page links in <head>
		$links = '';
		foreach ($this->links as $link) {
			$links .= "<link rel=\"{$link['rel']}\" href=\"{$link['href']}\" title=\"{$link['title']}\" type=\"{$link['type']}\" />\n";
		}
		$this->template->links = $links;
		
		
		$this->template->errors = $this->session->get('errors');
		$this->template->messages = $this->session->get('messages');

		// Strictly speaking this shouldn't be necessary, but set_flash is a little flaky for same-page behavior
		$this->session->delete('errors');
		$this->session->delete('messages');
		
		$this->template->render(true);
		
	} // function _render
	
	public function _link($href, $type, $rel = 'alternate', $title = '') {
		$this->links[] = array(
			'href'  => $href,
			'type'  => $type,
			'rel'   => $rel,
			'title' => $title
		);
	} // function _link
	
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