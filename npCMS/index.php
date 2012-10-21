<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once( '../classes/initials.php');
include_once( $_DIR['pages'].'/createPage.php');

if (isset($_GET['a'])) {
	$param = split('/',$_GET['a']);
	array_unshift($param, '');
}
else {
	$param = preg_split('/\//',$_SERVER['PATH_INFO']);
}
unset($param[0]);
if (empty($param) || $param[1] == null) {
	$param[1] = 1;
}

$newPage = new CreatePage($param);

?>