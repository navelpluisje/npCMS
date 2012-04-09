<?php /* Smarty version Smarty-3.0.8, created on 2011-11-22 21:31:51
         compiled from "../templates/newsPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20458524ecc06b78de079-46200943%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '14a0fb508b96f3d6dea7d6f8f738d8327ecede44' => 
    array (
      0 => '../templates/newsPage.tpl',
      1 => 1321993909,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20458524ecc06b78de079-46200943',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content" class="news">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/1"><img src="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/img/html.png" alt="close" title="sluiten"/></a></span>
		<h1>Nieuws</h1>
		<div class="itemList large">
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
			<div class="listItem">
				<h3><a href="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/<?php echo $_smarty_tpl->getVariable('pageId')->value;?>
/<?php echo $_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
"><?php echo $_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title'];?>
</a><span class="date"><?php echo date('d M Y',strtotime($_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['date_created']));?>
</span></h3>
				<p>
					<?php echo stripslashes($_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['body_text']);?>

					<a class="readmore" href="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/<?php echo $_smarty_tpl->getVariable('pageId')->value;?>
/<?php echo $_smarty_tpl->getVariable('newsItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['id'];?>
">meer&hellip;</a>
				</p>
			</div>
			<?php endfor; endif; ?>
		</div>
	</div>
</div>

