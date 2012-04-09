<?php
include_once('../pages/createPage.php');

if (isset($_GET['a'])) {
	$param = split('/',$_GET['a']);
	array_unshift($param, "");
}
else {
	$param = split('/',$_SERVER['PATH_INFO']);
}
unset($param[0]);
if (empty($param) || $param[1] == null) {
	$param[1] = 1;
}

$newPage = new CreatePage($param);

?>