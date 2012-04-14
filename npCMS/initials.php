<?php
/**
 * Create Globals for includes
 */
chdir('..');
$startDir = getcwd();
$dir = array();
$dir['dbElements']  = $startDir . '/dbElements';
$dir['pages']       = $startDir . '/pages';
$dir['configs']     = $startDir . '/configs';
$dir['classes']     = $startDir . '/classes';
$dir['admin']       = $startDir . '/admin';
$dir['smarty']      = $startDir . '/smarty';
$dir['cache']       = $startDir . '/cache';
$dir['templates']   = $startDir . '/templates';
$dir['templates_c'] = $startDir . '/templates_c';

/**
 * Global database login
 */

$config = parse_ini_file( $dir['configs'] . '/npCMSini.ini', true);

require_once('DB.php');
$db = DB::connect('mysql://'.$config['DBCONN']['pass'].':'.$config['DBCONN']['user'].'@'.$config['DBCONN']['host'].':'.$config['DBCONN']['port'].'/'.$config['DBCONN']['database']);
$db->setFetchMode(DB_FETCHMODE_ASSOC);

?>