<?php /* Smarty version Smarty-3.0.8, created on 2011-11-05 23:42:47
         compiled from "../templates/admin/admin_index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5595936224eb5bbe780a644-65700591%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0b268a58c3f2aee16cf7bbc67d0c6f6c06aba7d3' => 
    array (
      0 => '../templates/admin/admin_index.tpl',
      1 => 1320532966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5595936224eb5bbe780a644-65700591',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<?php $_template = new Smarty_Internal_Template('admin/admin_head.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
	<body>
		<div id="wrapper">
			<div id="title">
				WebAdmin
				<span class=" buttons titleUser">
					<a class="logout right" title="Uitloggen"></a>
					<a href="" class="login left" title="Ingelogd als..."><?php if ($_smarty_tpl->getVariable('login')->value!=true){?><?php echo $_smarty_tpl->getVariable('sessionUser')->value;?>
<?php }else{ ?>Uitgelogd<?php }?></a>
				</span>
			</div>
			<?php if ($_smarty_tpl->getVariable('menu')->value==true){?>
				<?php $_template = new Smarty_Internal_Template('admin/admin_menu.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			<?php }?>
			<?php if ($_smarty_tpl->getVariable('login')->value==true){?>
				<?php $_template = new Smarty_Internal_Template('admin/admin_login.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			<?php }else{ ?>
				<?php $_template = new Smarty_Internal_Template($_smarty_tpl->getVariable('template')->value, $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			<?php }?>
			<?php $_template = new Smarty_Internal_Template('footer.tpl', $_smarty_tpl->smarty, $_smarty_tpl, $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null);
 echo $_template->getRenderedTemplate(); $_template->rendered_content = null;?><?php unset($_template);?>
			<div id="log"></div>
		</div>
	</body>
</html>