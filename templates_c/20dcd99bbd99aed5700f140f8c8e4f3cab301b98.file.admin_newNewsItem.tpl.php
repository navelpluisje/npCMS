<?php /* Smarty version Smarty-3.0.8, created on 2011-11-11 21:54:30
         compiled from "../templates/admin/admin_newNewsItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:7771863174ebd8b8646bd43-15173181%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '20dcd99bbd99aed5700f140f8c8e4f3cab301b98' => 
    array (
      0 => '../templates/admin/admin_newNewsItem.tpl',
      1 => 1321044847,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7771863174ebd8b8646bd43-15173181',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content" class="login">
	<h1>Bericht <?php if ($_smarty_tpl->getVariable('new')->value||!$_smarty_tpl->getVariable('edit')->value){?>toevoegen<?php }else{ ?>wijzigen<?php }?></h1>
	<form action="<?php if ($_smarty_tpl->getVariable('new')->value||!$_smarty_tpl->getVariable('edit')->value){?>/admin.php/news/add<?php }else{ ?>/admin.php/news/change/<?php echo $_smarty_tpl->getVariable('newsItem')->value['id'];?>
<?php }?>" method="post">
		<span class="inputRow">
			<label for="title">Titel</label>
			<input type="text" name="title" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('newsItem')->value['title'];?>
<?php }?>"/>
		</span>
		<span class="inputRow">
			<label for="body_text">Bericht</label>
			<textarea id="body_text" name="body_text">
				<?php if ($_smarty_tpl->getVariable('edit')->value){?>
					<?php echo stripslashes($_smarty_tpl->getVariable('newsItem')->value['body_text']);?>

					<?php echo $_smarty_tpl->getVariable('pBreak')->value;?>

					<?php echo stripslashes($_smarty_tpl->getVariable('newsItem')->value['more_text']);?>

				<?php }?>
			</textarea>
		</span>
		<span class="inputRow">
			<label for="user_id">Gebruiker</label>
			<select type="text" name="user_id">
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['name'] = "i";
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('users')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total']);
?>
				<option value="<?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" 	<?php if ($_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->getVariable('newsItem')->value['user_id']){?>
													selected="selected"
												<?php }elseif($_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['screen_name']==$_smarty_tpl->getVariable('sessionUser')->value&&$_smarty_tpl->getVariable('newItem')->value){?>
													selected="selected"
												<?php }?>><?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['screen_name'];?>

				</option>
				<?php endfor; endif; ?>
			</select>
		</span>
		<span class="inputRow">
			<label for="category_id">Category</label>
			<select type="text" name="category_id">
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['name'] = "i";
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('cats')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['total']);
?>
				<option value="<?php echo $_smarty_tpl->getVariable('cats')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->getVariable('cats')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->getVariable('newsItem')->value['category_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('cats')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</option>
				<?php endfor; endif; ?>
			</select>
		</span>
		<input type="hidden" name="id" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('newsItem')->value['id'];?>
<?php }else{ ?>0<?php }?>"/></span>
		<div class="buttons">
			<input type="button" onclick="parent.location='/admin.php/news';" class="right" value="Annuleer" />
			<input type="submit" class="left" name="submit" value="<?php if ($_smarty_tpl->getVariable('new')->value||!$_smarty_tpl->getVariable('edit')->value){?>Voeg toe<?php }else{ ?>Wijzig<?php }?>" />
		</div>
	</form>
	<?php if (!empty($_smarty_tpl->getVariable('error',null,true,false)->value)){?>
	<div class="errorMessage">
		<?php echo $_smarty_tpl->getVariable('error')->value;?>

	</div>
	<?php }?>
</div>

