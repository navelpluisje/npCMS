<?php
/**
 * Global database login
 */

$config = parse_ini_file('../configs/npCMSini.ini', true);

require_once('DB.php');

$db = DB::connect('mysql://'.$config['DBCONN']['pass'].':'.$config['DBCONN']['user'].'@'.$config['DBCONN']['host'].':'.$config['DBCONN']['port'].'/'.$config['DBCONN']['database']);
$db->setFetchMode(DB_FETCHMODE_ASSOC);
?>