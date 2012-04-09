<?php
/**
 * Validation functions
 */

class Validation
{
	public function compareValues($pw1, $pw2) {
		$res = true;
		if ( ! empty($pw1) && ! empty($pw2)) {
			if (strcmp($pw1, $pw2) != 0) {
				$res = false;
			}
		}
		else {
			$res = false;
		}
		return $res;
	} 
	
	public function checkEmail($email) {
		$res = true;
		if (preg_match('/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/', $email) == 0) {
			$res = false;	
		}
		return $res;
	}
	
	public function checkFilled() {
		$res = true;
		$args = func_get_args();
		foreach ($args as $arg) {
			if (strlen($arg) == 0) {
				$res = false;
			}
		}
		return $res;
	}
}
 
?>