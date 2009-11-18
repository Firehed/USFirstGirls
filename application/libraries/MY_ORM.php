<?php
class ORM extends ORM_core {
	protected $exceptions = array();
	private $escapeOutput = true;
	
	public function __get($column) {
		// Automatic support of getters
		if (method_exists($this, $method = 'get' . $column)) {
			$return = $this->$method();
			if (is_string($return)) {
				return $this->escapeOutput ? htmlentities($return, ENT_NOQUOTES, 'UTF-8') : $return;
			}
			else {
				return $return;
			}
		}
		
		if (array_key_exists($column, $this->object)) {
			return $this->escapeOutput ? htmlentities($this->object[$column], ENT_NOQUOTES, 'UTF-8') : $this->object[$column];
		}
		
		return parent::__get($column);
	} // function __get

	public function __set($column, $value) {
		if (method_exists($this, $method = 'set' . ucfirst($column))) {
			try {
				$value = $this->$method($value);
			} catch (UnexpectedValueException $e) {
				$this->exceptions[] = $e->getMessage();
			}
		}
	
		parent::__set($column, $value);
	} // function __set
	
	// Fixes bug in Kohana ORM by adding object_plural
	public function __sleep() {
		return array('object_name', 'object_plural', 'object', 'changed', 'loaded', 'saved', 'sorting');
	}
	
	
	public function addStatus($statusBitmask) {
		if (!$this->status($statusBitmask)) {
			$this->status = $this->object['status'] + $statusBitmask;
		}
		return $this;
	} // function addStatus

	public function escapeOutput($mode = true) {
		$this->escapeOutput = $mode;
	} // function escapeOutput

	public function getExceptions() {
		return $this->exceptions;
	} // function getExceptions

	protected function preSaveValidate() {} // Designed to be overridden where necessary
	
	public function removeStatus($statusBitmask) {
		if ($this->status($statusBitmask)) {
			$this->status = $this->object['status'] - $statusBitmask;
		}
		return $this;
	} // function removeStatus
	
	public function save() {
		try {
			$this->preSaveValidate();
		} catch (ValidationException $e) {
			$this->exceptions[] = $e->getMessage();
		}
		
		if (!empty($this->exceptions)) {
			return false;
		}
		
		return parent::save();
		
	} // function save
	
	public function status($bitmask) {
		if (array_key_exists('status', $this->object)) {
			return (bool) ($this->object['status'] & $bitmask);
		}
		return false;
	} // function status
	
} // class ORM

class ValidationException extends UnexpectedValueException {
	public function __construct($error) {
		$args = array_slice(func_get_args(), 1);

		return parent::__construct(Kohana::lang($error, $args));
	} // function getMessage
}