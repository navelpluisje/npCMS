<?php
/**
 * Create Globals for includes
 */
$_DIR = array();
$_DIR['webRoot']     = 'http://' . $_SERVER['HTTP_HOST'];
chdir('..');
$startDir = getcwd();
$_DIR['dbElements']  = $startDir . '/dbElements';
$_DIR['pages']       = $startDir . '/pages';
$_DIR['configs']     = $startDir . '/configs';
$_DIR['classes']     = $startDir . '/classes';
$_DIR['admin']       = $startDir . '/admin';
$_DIR['smarty']      = $startDir . '/smarty';
$_DIR['cache']       = $startDir . '/cache';
$_DIR['templates']   = $startDir . '/templates';
$_DIR['templates_c'] = $startDir . '/templates_c';

$config = parse_ini_file( $_DIR['configs'] . '/npCMS.conf', true);
$_DIR['indexPage'] = $config['indexPage'];
$_DIR['adminPage'] = $config['adminPage'];
$_DIR['webRoot']   = $config['pageBase'];

/**
 * Global database login
 */
include_once('database.php');

$db = new database($config['.DBCONN']);
try {
	$db->connect();
} catch(PDOException $e) {
 	echo 'connectionError';
 }

?>