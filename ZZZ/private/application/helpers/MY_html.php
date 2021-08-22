<?php

class html extends html_core {
	public static function dropdown(array $values, $default = null) {
		$return = '';
		foreach ($values as $value => $text) {
			if (is_array($text)) {
				$return .= "<optgroup label=\"$value\">";
				
				foreach ($text as $value => $text) {
					$return .= self::dropdownOption($value, $text, $value == $default);
				}
				
				$return .= '</optgroup>';
			}
			else {
				$return .= self::dropdownOption($value, $text, $value == $default);
			}
		}
		
		return $return;
	} // function dropdown
	
	private static function dropdownOption($value, $text, $default = false) {
		$selected = $default ? ' selected="selected"' : '';
		return "<option value=\"$value\"$selected>$text</option>";
	} // function dropdownOption
	
}
