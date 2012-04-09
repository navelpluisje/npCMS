<?php /* Smarty version Smarty-3.0.8, created on 2011-11-22 22:05:08
         compiled from "../templates/blogPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1907710224ecc0e848367f5-32639911%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1347ef53f03a361d10ce3e26e1a8f91cec491680' => 
    array (
      0 => '../templates/blogPage.tpl',
      1 => 1321995869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1907710224ecc0e848367f5-32639911',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content" class="blog">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/1"><img src="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/img/html.png" alt="close" title="sluiten"/></a></span>
		<h1>Gastenboek</h1>
		<div class="itemList">
		<?php if ($_smarty_tpl->getVariable('empty')->value==true){?>
			<div class="listItem">
				<h3>Er zijn nog geen berichten geschreven!!</h3>
				<p>
					Bent u de eerste??</br>
					Klik op &acute;Toevoegen&acute;-knop om een bericht te schrijven.  
				</p>
			</div>
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
			<div class="listItem">
				<h3><?php echo stripslashes($_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['title']);?>
<span class="date"><?php echo date('d M Y',strtotime($_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['date_created']));?>
</span></h3>
				<p>
					<?php echo stripslashes($_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['body_text']);?>

				</p>
				<span>door: <?php echo $_smarty_tpl->getVariable('blogItems')->value[$_smarty_tpl->getVariable('smarty')->value['section']['i']['index']]['guest_name'];?>
</span>
			</div>
			<?php endfor; endif; ?>
		<?php }?>
		</div>
		<div class="itemListAdd">
			<a href="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/<?php echo $_smarty_tpl->getVariable('pageId')->value;?>
/add" class="add" title="Schrijf een bericht!!"><span>&nbsp;</span>Schrijven</a>
		</div>
	</div>
</div>

