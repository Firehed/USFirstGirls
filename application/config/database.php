<?php defined('SYSPATH') OR die('No direct access allowed.');
$config['default'] = array(
	'benchmark'     => TRUE,
	'persistent'    => FALSE,
	'connection'    => array(
		'type'     => 'mysqli',
		'user'     => 'root',
		'pass'     => 'clover',
		'host'     => 'localhost',
		'port'     => FALSE,
		'socket'   => FALSE,
		'database' => 'usfirstgirls'
	),
	'character_set' => 'utf8',
	'table_prefix'  => '',
	'object'        => TRUE,
	'cache'         => TRUE,
	'escape'        => TRUE
);