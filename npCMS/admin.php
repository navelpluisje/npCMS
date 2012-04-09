<?php
session_start();
include_once('../admin/createAdminPage.php');
include_once('../configs/clMySmarty.php');
include_once('../dbElements/dbUser.php');

$name = $_POST['name'];
$pass = $_POST['password'];

$tpl = new SmartyTemplate();
$tpl->assign('name', $name);
$tpl->assign('pass', $pass);
$tpl->assign('menu', false);
$tpl->assign('login', false);
$tpl->assign('attempts', $_SESSION['attempts']);

if (isset($_GET['a'])) {
	$param = split('/',$_GET['a']);
	array_unshift($param, "");
}
else {
	$param = split('/',$_SERVER['PATH_INFO']);
}
unset($param[0]);

if ($param[1] == 'logout' && $param[2] == 1 ) {
	session_destroy();
	$tpl->assign('login', true);
	$tpl->setTemplate('admin/admin_index.tpl');
	$tpl->displayTemplate();
}
else {
	
	session_start();
	
	if ( ! isset($_SESSION['attempts'])) {
	  $_SESSION['attempts'] = 0;
	}
	
	//$_SESSION['loggedIn'] = false;
	
	if ( ! $_SESSION['loggedIn']) {
		if ($_SESSION['attempts'] > 2) {
			echo 'aantal pogingen is verlopen, uw account wordt geblokkeerd!';
			$_SESSION['attempts'] = 0;
		}
		else {
			if ($name == '' || $pass == '') {
				$_SESSION['attempts']++;
				$tpl->assign('login', true);
				$tpl->setTemplate('admin/admin_index.tpl');
			}
			else {
				$user = new DbUser;
				try {
					$password = $user->getPassword($name);
					if ( $pass == $password['password']) {
						$_SESSION['loggedIn'] = true;
						$_SESSION['user'] = $name;
						setPage();
					}
					else {
	  					$_SESSION['attempts']++;
						$tpl->assign('login', true);
						$tpl->setTemplate('admin/admin_index.tpl');
					}
				}
				catch(Exception $e) {
					$tpl->assign('login', true);
					$tpl->setTemplate('admin/admin_index.tpl');
				}
			}
		}
		$tpl->displayTemplate();
	}
	else {
		setPage();
	}
}

function setPage() {
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
	$newAdminPage = new CreateAdminPage($param);
	
}

?>