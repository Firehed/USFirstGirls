<?php
class text extends text_Core {
	public static function bytes($bytes, $force_unit = NULL, $format = NULL, $si = TRUE) {
		if ($bytes <= 1024) {
			return "$bytes B";
		}
		return parent::bytes($bytes, $force_unit, $format, $si);
	} // function bytes
	
	public static function relativeTime($time) {
		$diff = time() - $time;
		if ($diff == 0) {
			return 'moments ago';
		}
		elseif ($diff > 0) {
			if ($diff < 60) {
				return "$diff " . inflector::plural('second',$diff) . ' ago';
			}
			$diff = round($diff/60);
			if ($diff < 60) {
				return "$diff " . inflector::plural('minute', $diff) . ' ago';
			}
			$diff = round($diff/60);
			if ($diff < 24) {
				return "$diff " . inflector::plural('hour', $diff) . ' ago';
			}
			$diff = round($diff/24);
			if ($diff < 7) {
				return "$diff " . inflector::plural('day', $diff) . ' ago';
			}
			$diff = round($diff/7);
			if ($diff < 4) {

				return "$diff " . inflector::plural('week', $diff) . ' ago';
			}
		} // Positive diff
		else {
			$diff = -$diff; // Flip it for comparisons and display
			if ($diff < 60) {
				return "in $diff " . inflector::plural('second',$diff);
			}
			$diff = round($diff/60);
			if ($diff < 60) {
				return "in $diff " . inflector::plural('minute', $diff);
			}
			$diff = round($diff/60);
			if ($diff < 24) {
				return "in $diff " . inflector::plural('hour', $diff);
			}
			$diff = round($diff/24);
			if ($diff < 7) {
				return "in $diff " . inflector::plural('day', $diff);
			}
			$diff = round($diff/7);
			if ($diff < 4) {
				return "in $diff " . inflector::plural('week', $diff);
			}
		}
			
		return date('F j, Y', $time);
	} // function relativeTime
}