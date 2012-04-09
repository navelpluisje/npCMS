<?php /* Smarty version Smarty-3.0.8, created on 2011-11-03 20:19:21
         compiled from "../templates/admin/admin_login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7414089054eb2e93913b909-82699408%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5eda019092b623e8203670bd60e72be0fc46704c' => 
    array (
      0 => '../templates/admin/admin_login.tpl',
      1 => 1320347941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7414089054eb2e93913b909-82699408',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content" class="login">
	<h1>Login</h1>
	<form action="/admin.php" method="post">
		<span class="inputRow"><label for="user">Naam</label><input type="text" name="name" /></span>
		<span class="inputRow"><label for="password">Wachtwoord</label><input type="password" name="password" /></span>
		<span class="inputRow"><input type="submit" name="submit" value="inloggen" /></span>
	</form>
</div>

