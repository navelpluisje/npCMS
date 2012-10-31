<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();
include_once( '../classes/initials.php' );
include_once( $_DIR['admin']      . '/createAdminPage.php' );
include_once( $_DIR['configs']    . '/clMySmarty.php' );
include_once( $_DIR['dbElements'] . '/dbUser.php' );
$name = (isset($_POST['name']) ? $_POST['name'] : '' );
$pass = (isset($_POST['password']) ? $_POST['password'] : '' );

$tpl = new SmartyTemplate();
$tpl->assign( 'name', $name );
$tpl->assign( 'pass', $pass );
$tpl->assign( 'menu', false );
$tpl->assign( 'login', false );
$tpl->assign( 'attempts', ( isset($_SESSION['attempts']) ? $_SESSION['attempts'] : 0 ) );



if ( isset( $_GET['a'] )) {
	$param = preg_split('/\//', $_GET['a'] );
	array_unshift( $param, "" );
}
else if ( isset( $_SERVER['PATH_INFO'] )) {
	$param = preg_split( '/\//', $_SERVER['PATH_INFO'] );
}
else {
	$param = array();
}

unset( $param[0] );

if ( count( $param ) > 0 && $param[1] == 'logout' && $param[2] == 1 ) {
	session_destroy();
	$tpl->assign( 'login', true );
	$tpl->setTemplate( 'admin/admin_index.tpl' );
	$tpl->displayTemplate();
}
else {
	if ( session_id() == '' ) {
		session_start();
	}
	
	if ( ! isset($_SESSION['attempts'] )) {
	  $_SESSION['attempts'] = 0;
	}
	
	//$_SESSION['loggedIn'] = false;
	
	if ( ! isset($_SESSION['loggedIn'] )) {
		$tpl->setTemplate( 'admin/admin_index.tpl' );
		if ($_SESSION['attempts'] > 2) {
			echo 'aantal pogingen is verlopen, uw account wordt geblokkeerd!';
			$_SESSION['attempts'] = 0;
		}
		else {
			if ( $name == '' || $pass == '' ) {
				$_SESSION['attempts']++;
				$tpl->assign( 'login', true );
			}
			else {
				$user = new DbUser;
				try {
					$password = $user->getPassword( $name );
//					$cleanpw = crypt(md5($pass),md5($name));
//					if ( $cleanpw == $password['password']) {
					if ( $pass == $password['password'] ) {
						$_SESSION['loggedIn'] = true;
						$_SESSION['user'] = $name;
						setPage();
					}
					else {
	  					$_SESSION['attempts']++;
						$tpl->assign( 'login', true );
					}
				}
				catch(Exception $e) {
					$tpl->assign( 'login', true );
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
	if ( isset($_GET['a']) ) {
		$param = preg_split( '/\//', $_GET['a'] );
		array_unshift( $param, "" );
	}
	else if( isset( $_SERVER['PATH_INFO'] )){
		$param = preg_split( '/\//', $_SERVER['PATH_INFO'] );
	}
	else {
		$param = array();	
	}

	unset( $param[0] );
	if ( empty( $param ) || $param[1] == null ) {
		$param[1] = 1;
	}
	$newAdminPage = new CreateAdminPage( $param );
	
}

?>