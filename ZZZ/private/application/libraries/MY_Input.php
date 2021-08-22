<?php

class Input extends Input_Core {

	/*
	public function clean_input_data($str) {
		if (is_array($str)) {
			$new = array();
			foreach ($str as $key => $value) {
				$new[$this->clean_input_keys($key)] = $this->clean_input_data($value);
			}
			return $new;
	*/
	public function xss_clean($data, $tool = NULL) {
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				$data[$key] = $this->xss_clean($value);
			}
			return $data;
		}
		return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
	}
}
