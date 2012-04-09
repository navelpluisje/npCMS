<?php /* Smarty version Smarty-3.0.8, created on 2011-11-03 21:36:47
         compiled from "../templates/admin/admin_userPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4818366204eb2fb5fc82ba4-87180063%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65d81b647214eda8f636892734d7ad452362aa88' => 
    array (
      0 => '../templates/admin/admin_userPage.tpl',
      1 => 1320352607,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4818366204eb2fb5fc82ba4-87180063',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '../smarty/plugins/function.cycle.php';
?><div id="content" class="news">
	<h1>Gebruikers</h1>
	<div class="buttons top"><a href="/admin.php/users/new" class="add" title="Voeg item toe"></a></div>
	<div class="items">
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
		<div class="item <?php echo smarty_function_cycle(array('values'=>'odd,even'),$_smarty_tpl);?>
">
			<div class="buttons">
				<a href="/admin.php/users/delete/<?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="remove right" title="Verwijder item"></a>
				<a href="/admin.php/users/edit/<?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="edit left" title="Wijzig item"></a>
			</div>
			<img class="thumb" src="<?php if ($_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['picture']!=''){?><?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['picture'];?>
<?php }else{ ?>/img/thumbs/star.png<?php }?>" alt="thumb"/>
			<h3><a href="/admin.php/users/edit/<?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" title="Wijzig item"><?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['screen_name'];?>
</a></h3>
			<h5><?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['first_name'];?>
</h5>
			<p><?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['last_name'];?>
</p>
		</div>
		<?php endfor; endif; ?>
	</div>
	<div class="buttons bottom"><a href="/admin.php/users/new" class="add" title="Voeg item toe"></a></div>
</div>

