<?php
class form extends form_Core {

	public static function csrf() {
		return '<input type="hidden" name="csrf" value="' . Session::instance()->get('csrf') .'" />';
	} // function csrf

	public static function valid() {
		if (request::method() == 'post' && Input::instance()->post('csrf') == Session::instance()->get('csrf')) {
			return true;
		}
		return false;
	} // function valid
}