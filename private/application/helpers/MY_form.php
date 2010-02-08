<?php
class form extends form_Core {
	protected static $count = 0;
	
	public static function close() {
		return form::csrf() . '</fieldset></form>';
	} // function close

	public static function csrf() {
		return self::hidden('csrf', Session::instance()->get('csrf'));
	} // function csrf
	
	public static function dropdown($label, $name, array $values, $default = null, $validate = '') {
		$id = 'field' . ++self::$count;
		$label = Kohana::lang("form.label.$label");
		$valid = $validate ? " data-validation=\"$validate\"" : '';
		
		return "<label for=\"$id\">$label</label>\n"
		     . "<select name=\"$name\" id=\"$id\"$valid>\n"
		     . html::dropdown($values, $default)
		     . '</select><br />';
	} // function dropdown
	
	public static function email($label, $name, $value = '', $placeholder = '') {
		return self::input($label, $name, $value, $placeholder, 'email', 'email');
	} // function email

	public static function hidden($name, $value) {
		return "<input type=\"hidden\" name=\"$name\" value=\"$value\" />";
	} // function hidden

	public static function input($label, $name, $value = '', $placeholder = '', $validate = '', $type = 'text') {
		$id = 'field' . ++self::$count;
		$value = $value ? "value=\"$value\" " : '';
		$valid = $validate ? "data-validation=\"$validate\" " : '';
		$ph = $placeholder ? 'placeholder="' . Kohana::lang("form.placeholder.$placeholder") . '" ' : ''; 
		$label = Kohana::lang("form.label.$label");
		
		return "<label for=\"$id\">$label</label>\n"
		      ."<input type=\"$type\" name=\"$name\" id=\"$id\" $value$ph$valid/>\n";
	} // function input
		
	public static function open($action = null, $class = null, $multipart = false) {
		$action = $action ? $action : url::current(); // Use url current if no default action set
		$class = $class ? $class : 'columns'; // Default class is columns
		$MP = $multipart ? ' enctype="multipart/form-data"' : '';
		return "<form action=\"$action\" method=\"post\" class=\"$class\"$MP><fieldset>";
	} // function open

	public static function password($label, $name, $value = '', $placeholder = '') {
		return self::input($label, $name, $value, $placeholder, null, 'password');
	} // function password

	public static function radio($label, $name, $value, $checked = false) {
		$id = 'field' . ++self::$count;
		$label = Kohana::lang("form.label.$label");
		$checked = $checked ? ' checked="checked"' : '';
		return "<input type=\"radio\" name=\"$name\" id=\"$id\" value=\"$value\"$checked />"
		      ."<label for=\"$id\" class=\"radio\">$label</label>";
	} // function radio
	
	public static function submit($label) {
		$id = 'field' . ++self::$count;
		$label = str_replace(' ', '&nbsp;', Kohana::lang("form.label.$label")); // Replace spaces with nbsps to address IE glitches
		
		return "<button type=\"submit\" id=\"$id\">$label</button>\n";
	    
	} // function submit	

	public static function textarea($label, $name, $value = '', $validate = '', $class = '', $rows = 10, $cols = 40) {
		$id = 'field' . ++self::$count;
		$valid = $validate ? " data-validation=\"$validate\"" : '';
		$label = Kohana::lang("form.label.$label");
		$class = $class ? ' class="'.$class.'"' : '';
		
		return "<label for=\"$id\">$label</label>\n"
		      ."<textarea id=\"$id\" name=\"$name\" rows=\"$rows\" cols=\"$cols\"$valid$class>$value</textarea>\n";
	} // function textarea
	
	public static function valid() {
		if (request::method() == 'post' && Input::instance()->post('csrf') == Session::instance()->get('csrf')) {
			return true;
		}
		return false;
	} // function valid
	
} // class form