<?php /* Smarty version Smarty-3.0.8, created on 2011-11-29 23:10:59
         compiled from "../templates/admin/admin_BlogPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2760791014ed558731abec2-72250115%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b45cc439785ef1e488b0e7098591dde9a40aaafc' => 
    array (
      0 => '../templates/admin/admin_BlogPage.tpl',
      1 => 1322604654,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2760791014ed558731abec2-72250115',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '../smarty/plugins/function.cycle.php';
?><div id="content" class="news">
	<h1>Blogs</h1>
	<div class="items">
		<?php if ($_smarty_tpl->getVariable('empty')->value==true){?>
			<h3>Geen resultaten!!</h3>
		<?php }else{ ?>
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['name'] = "i";
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('blogItems')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<div class="item <?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
				<div class="buttons">
					<a href="/admin.php/blogs/delete/<?php echo $_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="remove right" title="Verwijder item"></a>
					<a href="/admin.php/blogs/ip/<?php echo $_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['guest_id'];?>
" class="ip center" title="Blokkeer IP"></a>
					<a href="/admin.php/blogs/guest/<?php echo $_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['guest_id'];?>
" class="guest center" title="Blokkeer Gast"></a>
					<a href="/admin.php/blogs/edit/<?php echo $_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="edit left" title="Wijzig item"></a>
				</div>
				<h3<?php if ($_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['visible']==0){?> class="blocked" title="Geblokkeerd"<?php }?>><a href="/admin.php/blogs/edit/<?php echo $_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><?php echo $_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a></h3>
				<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["j"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['name'] = "j";
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('guests')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['total']);
?>
				<?php if ($_smarty_tpl->getVariable('guests')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id']==$_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['guest_id']){?>
				<h5>door: <?php echo $_smarty_tpl->getVariable('guests')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['name'];?>
</h5>
				<?php }?>
				<?php endfor; endif; ?>
				<p><?php echo stripslashes($_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['body_text']);?>
</p>
			</div>
			<?php endfor; endif; ?>
		<?php }?>
	</div>
</div>

