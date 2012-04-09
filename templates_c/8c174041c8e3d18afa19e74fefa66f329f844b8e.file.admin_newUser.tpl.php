<?php /* Smarty version Smarty-3.0.8, created on 2011-11-05 23:40:13
         compiled from "../templates/admin/admin_newUser.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3923450034eb5bb4dc808e0-32084062%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8c174041c8e3d18afa19e74fefa66f329f844b8e' => 
    array (
      0 => '../templates/admin/admin_newUser.tpl',
      1 => 1320532809,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3923450034eb5bb4dc808e0-32084062',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content" class="login">
	<h1>Gebruiker <?php if ($_smarty_tpl->getVariable('new')->value||!$_smarty_tpl->getVariable('edit')->value){?>toevoegen<?php }else{ ?>wijzigen<?php }?></h1>
	<form enctype="multipart/form-data" action="<?php if ($_smarty_tpl->getVariable('new')->value||!$_smarty_tpl->getVariable('edit')->value){?>/admin.php/users/add<?php }else{ ?>/admin.php/users/change/<?php echo $_smarty_tpl->getVariable('user')->value['id'];?>
<?php }?>" method="post">
		<span class="userImage">
			<img src="<?php if ($_smarty_tpl->getVariable('edit')->value&&$_smarty_tpl->getVariable('user')->value['picture']!=''){?><?php echo $_smarty_tpl->getVariable('user')->value['picture'];?>
<?php }else{ ?>/img/thumbs/star.png<?php }?>" alt="userImage" title="Klik op de afbeelding om te wijzigen."/>
      		<input id="imageFile" type="file" name="img" />
		</span>
		<span class="inputRow"><label for="title">Weergave naam</label><input type="text" name="scr_name" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['screen_name'];?>
<?php }?>"/></span>
		<span class="inputRow"><label for="title">Wachtwoord</label><input type="password" name="password" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['password'];?>
<?php }?>"/></span>
		<span class="inputRow"><label for="title">Herhaal ww</label><input type="password" name="password2" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['password2'];?>
<?php }?>"/></span>
		<span class="inputRow"><label for="title">Voornaam</label><input type="text" name="f_name" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['first_name'];?>
<?php }?>"/></span>
		<span class="inputRow"><label for="title">Achternaam</label><input type="text" name="l_name" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['last_name'];?>
<?php }?>"/></span>
		<span class="inputRow"><label for="title">Email</label><input type="text" name="email" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['email'];?>
<?php }?>"/></span>
		<span class="inputRow"><label for="title">Actief</label><input type="checkbox" name="active" <?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['active']==1;?>
checked<?php }?>/></span>
		<input type="hidden" name="user_type" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['user_type'];?>
<?php }?>"/></span>
		<input type="hidden" name="picture" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['picture'];?>
<?php }?>"/></span>
		<input type="hidden" name="id" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('user')->value['id'];?>
<?php }else{ ?>0<?php }?>"/></span>
		<div class="buttons">
			<input type="button" onclick="parent.location='/admin.php/users';" class="right" value="Annuleer" />
			<input type="submit" class="left" name="submit" value="<?php if ($_smarty_tpl->getVariable('new')->value||!$_smarty_tpl->getVariable('edit')->value){?>Voeg toe<?php }else{ ?>Wijzig<?php }?>" />
		</div>
	</form>
	<?php if (!empty($_smarty_tpl->getVariable('error',null,true,false)->value)){?>
	<div class="errorMessage">
		<?php echo $_smarty_tpl->getVariable('error')->value;?>

	</div>
	<?php }?>
</div>

