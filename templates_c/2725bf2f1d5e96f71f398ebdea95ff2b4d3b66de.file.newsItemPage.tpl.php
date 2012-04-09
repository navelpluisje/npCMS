<?php /* Smarty version Smarty-3.0.8, created on 2011-11-29 21:08:50
         compiled from "../templates/newsItemPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:11985378644ed53bd2248993-34872865%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2725bf2f1d5e96f71f398ebdea95ff2b4d3b66de' => 
    array (
      0 => '../templates/newsItemPage.tpl',
      1 => 1321993904,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11985378644ed53bd2248993-34872865',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content" class="contact">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		
		<span class="close"><a href="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/<?php echo $_smarty_tpl->getVariable('pageId')->value;?>
"><img src="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/img/html.png" alt="close" title="sluiten"/></a></span>
		<h1>Nieuws</h1>
		<div class="itemList large">
			<div class="listItem">
				<h3><?php echo $_smarty_tpl->getVariable('newsItems')->value['title'];?>
<span class="date"><?php echo date('d M Y',strtotime($_smarty_tpl->getVariable('newsItems')->value['date_created']));?>
</span></h3>
				<p><?php echo stripslashes($_smarty_tpl->getVariable('newsItems')->value['body_text']);?>
</p>
				<p><?php echo stripslashes($_smarty_tpl->getVariable('newsItems')->value['more_text']);?>
</p>
			</div>
		</div>
	</div>
</div>
