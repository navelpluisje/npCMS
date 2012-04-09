<?php /* Smarty version Smarty-3.0.8, created on 2011-11-22 21:32:26
         compiled from "../templates/contentPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8929381564ecc06da3600f7-80256922%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8e07c1ec1eca9f1668e776cdc227884a240c0ef2' => 
    array (
      0 => '../templates/contentPage.tpl',
      1 => 1321993943,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8929381564ecc06da3600f7-80256922',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<div id="content" class="<?php echo $_smarty_tpl->getVariable('contentBlock')->value['name'];?>
">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/<?php echo $_smarty_tpl->getVariable('cPage')->value['parent_id'];?>
"><img src="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/img/html.png" alt="close" title="sluiten"/></a></span>
		<div class="listItem">
			<h1><?php echo $_smarty_tpl->getVariable('contentBlock')->value['page_title'];?>
</h1>
			<div class="itemList large">
				<?php echo stripslashes($_smarty_tpl->getVariable('contentBlock')->value['content']);?>

			</div>
		</div>
	</div>
</div>
