<?php /* Smarty version Smarty-3.0.8, created on 2011-11-08 21:44:17
         compiled from "../templates/admin/admin_NewsPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14180864404eb994a17cf314-02554891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd6a72f7372d1f1064c03eeead9a61b2a4595751f' => 
    array (
      0 => '../templates/admin/admin_NewsPage.tpl',
      1 => 1320785055,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14180864404eb994a17cf314-02554891',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<?php if (!is_callable('smarty_function_cycle')) include '../smarty/plugins/function.cycle.php';
?><div id="content" class="news">
	<h1>Nieuws</h1>
	<div class="buttons top"><a href="/admin.php/news/new" class="add" title="Voeg item toe"></a></div>
	<div class="items">
		<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["i"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['name'] = "i";
$_smarty_tpl->tpl_vars['smarty']->value['section']["i"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('newsItems')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
				<a href="/admin.php/news/delete/<?php echo $_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="remove right" title="Verwijder item"></a>
				<a href="/admin.php/news/edit/<?php echo $_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
" class="edit left" title="Wijzig item"></a>
			</div>
			<h3><a href="/admin.php/news/edit/<?php echo $_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><?php echo $_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a></h3>
			<?php unset($_smarty_tpl->tpl_vars['smarty']->value['section']["j"]);
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['name'] = "j";
$_smarty_tpl->tpl_vars['smarty']->value['section']["j"]['loop'] = is_array($_loop=$_smarty_tpl->getVariable('users')->value) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
			<?php if ($_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['id']==$_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['user_id']){?>
			<h5>door: <?php echo $_smarty_tpl->getVariable('users')->value[$_smarty_tpl->getVariable('smarty')->value['section']['j']['index']]['screen_name'];?>
 | op: <?php echo date('d M Y',strtotime($_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['date_created']));?>
</h5>
			<?php }?>
			<?php endfor; endif; ?>
			<p><?php echo stripslashes($_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['body_text']);?>
</p>
		</div>
		<?php endfor; endif; ?>
	</div>
	<div class="buttons bottom"><a href="/admin.php/news/new" class="add" title="Voeg item toe"></a></div>
</div>
