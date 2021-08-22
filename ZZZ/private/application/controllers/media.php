<?php
class Media_Controller extends Controller {
	
	public function __call($method, $args) {
		ini_set('memory_limit', '32M');
		
		$file = ORM::factory('file', $method);
		if ($file->loaded) {
			$file->escapeOutput(false);
			$file->cache();
			header('Content-type: ' . $file->type);
			header('Content-length: ' . $file->size);
			echo $file->data;
		}
		else {
			header('HTTP/1.1 404 Not Found');
		}
		
		Event::run('system.shutdown');
		exit;
	} // function __call
	
} // class Media_Controller