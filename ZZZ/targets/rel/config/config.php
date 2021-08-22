<?php defined('SYSPATH') OR die('No direct access allowed.');
$config['site_domain'] = 'www.usfirstgirls.org/';
$config['site_protocol'] = '';
$config['index_page'] = '';
$config['url_suffix'] = '';
$config['internal_cache'] = FALSE;
$config['internal_cache_path'] = APPPATH.'cache/';
$config['internal_cache_encrypt'] = FALSE;
$config['internal_cache_key'] = ')nkB@Asu}3^Lww0^b>h{sTFKKK8S3f2&T~MQq}$T|{jJ&Dd|0SDJ@$ks1@|`xU';
$config['output_compression'] = FALSE;
$config['global_xss_filtering'] = TRUE;
$config['enable_hooks'] = FALSE;
$config['log_threshold'] = 1;
$config['log_directory'] = APPPATH.'logs';
$config['display_errors'] = TRUE;
$config['render_stats'] = TRUE;
$config['extension_prefix'] = 'MY_';
$config['modules'] = array(
	MODPATH.'auth',      // Authentication
);

