<?php
class Controller extends Controller_Core {
	protected $errors = array();
	protected $messages = array();
	public $user;
	public $session;
	public $auth;
	protected $requiresLogin = false;

	public function __construct() {
		// Convert any triggered errors into thrown ErrorExceptions
		set_error_handler(create_function('$a, $b, $c, $d', 'throw new ErrorException($b, 0, $a, $c, $d);'), E_ALL);

		parent::__construct();
		
		$this->session = Session::instance();
		
		$this->session->get('csrf') OR $this->session->set('csrf', text::random('alnum', 32));
		$this->auth = Auth::instance();
		if ($this->auth->logged_in()) {
			$this->user = $this->auth->get_user();
		}
		if ($this->requiresLogin AND !$this->user) {
			$this->session->set('referrer', url::current());
			url::redirect('session/signin');
		}
		
	} // function __construct

	protected function error($message) {
		if (is_array($message)) {
			$this->errors = array_merge($this->errors, $message);
		}
		else {
			$this->errors[] = $message;
		}
		$this->session->set('errors', $this->errors);
		
	} // function error

	protected function message($message) {
		if (is_array($message)) {
			$this->messages = array_merge($this->messages, $message);
		}
		else {
			$this->messages[] = $message;
		}
		$this->session->set('messages', $this->messages);
		
	} // function message

} // class Controller