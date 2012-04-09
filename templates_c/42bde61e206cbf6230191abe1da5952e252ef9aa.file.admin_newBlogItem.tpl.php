<?php /* Smarty version Smarty-3.0.8, created on 2011-11-29 23:34:19
         compiled from "../templates/admin/admin_newBlogItem.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10187033854ed55deb632c95-28152597%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42bde61e206cbf6230191abe1da5952e252ef9aa' => 
    array (
      0 => '../templates/admin/admin_newBlogItem.tpl',
      1 => 1322606058,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10187033854ed55deb632c95-28152597',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content" class="login">
	<h1>Blog <?php if ($_smarty_tpl->getVariable('edit')->value){?>wijzigen<?php }else{ ?>toevoegen<?php }?></h1>
	<form action="<?php if ($_smarty_tpl->getVariable('edit')->value){?>/admin.php/blogs/change/<?php echo $_smarty_tpl->getVariable('blogItem')->value['id'];?>
<?php }else{ ?>/admin.php/blogs/add<?php }?>" method="post">
		<fieldset>
			<legend>Berichtgegevens</legend>
			<span class="inputRow">
				<label for="title">Titel</label>
				<input type="text" name="title" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo stripslashes($_smarty_tpl->getVariable('blogItem')->value['title']);?>
<?php }?>"/><br />
			</span>
			<span class="textAreaLabel inputRow">
				<label for="text" style="vertical-align:top;">Bericht</label>
				<textarea id="text" name="text">
					<?php if ($_smarty_tpl->getVariable('edit')->value){?>
						<?php echo stripslashes($_smarty_tpl->getVariable('blogItem')->value['body_text']);?>

					<?php }?>
				</textarea>
			</span>
			<span class="inputRow">
				<label for="title">Verborgen</label>
				<input type="checkbox" name="hidden" <?php if ($_smarty_tpl->getVariable('edit')->value){?><?php if ($_smarty_tpl->getVariable('blogItem')->value['visible']==0){?>checked<?php }?><?php }?>/><br />
			</span>
		</fieldset>
		<fieldset>
			<legend>Gebruikergegevens</legend>
			<span class="inputRow">
				<label for="guest_id">Gebruiker</label>
				<select type="text" name="guest_id" disabled="true">
					<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['name'] = "i";
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('guests')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<option value="<?php echo $_smarty_tpl->getVariable('guests')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" <?php if ($_smarty_tpl->getVariable('guests')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->getVariable('blogItem')->value['guest_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('guests')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</option>
					<?php endfor; endif; ?>
				</select>
			</span>
			<span class="inputRow">
				<label for="title">Geblokkeerd</label>
				<input type="checkbox" name="blocked" <?php if ($_smarty_tpl->getVariable('edit')->value){?><?php if ($_smarty_tpl->getVariable('guest')->value['banned']==1){?>checked<?php }?><?php }?>/><br />
			</span>
			<span class="inputRow">
				<label for="title">Email</label>
				<input type="text" name="email" disabled="true" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('guest')->value['email'];?>
<?php }?>"/><br />
			</span>
			<span class="inputRow">
				<label for="title">IP-Adres</label>
				<input type="text" name="ip" disabled="true" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?><?php echo $_smarty_tpl->getVariable('guest')->value['ip'];?>
<?php }?>"/><br />
			</span>
	<!--		<span class="inputRow">
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
" <?php if ($_smarty_tpl->getVariable('cats')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id']==$_smarty_tpl->getVariable('newsItems')->value['category_id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->getVariable('cats')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['name'];?>
</option>
					<?php endfor; endif; ?>
				</select>
	</span>-->
		</fieldset>
		<div class="buttons bottom border">
			<a href="/admin.php/blogs/delete/<?php echo $_smarty_tpl->getVariable('blogItem')->value['id'];?>
" class="remove right" title="Verwijder item"></a>
			<a href="/admin.php/blogs/ip/<?php echo $_smarty_tpl->getVariable('blogItem')->value['guest_id'];?>
" class="ip center" title="Blokkeer IP"></a>
			<a href="/admin.php/blogs/guest/<?php echo $_smarty_tpl->getVariable('blogItem')->value['guest_id'];?>
" class="guest center" title="Blokkeer gast"></a>
			<input type="submit" class="left login" value="<?php if ($_smarty_tpl->getVariable('edit')->value){?>Wijzig<?php }else{ ?>Voeg toe<?php }?>" />
		</div>
	</form>
</div>

