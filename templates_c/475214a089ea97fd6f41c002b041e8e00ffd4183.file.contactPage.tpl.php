<?php /* Smarty version Smarty-3.0.8, created on 2011-11-22 22:07:06
         compiled from "../templates/contactPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9582881564ecc0efaa70036-98701403%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '475214a089ea97fd6f41c002b041e8e00ffd4183' => 
    array (
      0 => '../templates/contactPage.tpl',
      1 => 1321996024,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9582881564ecc0efaa70036-98701403',
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
/index.php/1"><img src="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/img/html.png" alt="close" title="sluiten"/></a></span>
		<h1>Contact</h1>
		<!-- Contactgegevens -->
		<span id="contactInfo">
			<h3>Gegevens</h3>
			<p>
				Mooi - IJsselstein<br/>
				Industrieweg 36<br/>
				3401 MA IJsselstein<br/>
			</p>
			<p>
				<a href="mailto:info@mooi-ijsselstein.nl">info@mooi-ijsselstein.nl</a><br/>
				030 687 84 65<br/>
			</p>
		</span>
		
		<!-- Contact form -->
		<div id="contactForm">
		<?php if ($_smarty_tpl->getVariable('send')->value){?>
			<h3>Bericht is met succes verzonden</h3>
		<?php }else{ ?>
			<h3>Contactformulier</h3>
			<form action="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/<?php echo $_smarty_tpl->getVariable('pageId')->value;?>
/" method="post">
				<label>Naam</label>
				<input type="text" name="name" value="<?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?><?php echo $_smarty_tpl->getVariable('name')->value;?>
<?php }?>" />
				<label>Email</label>
				<input type="text" name="mail" value="<?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?><?php echo $_smarty_tpl->getVariable('mail')->value;?>
<?php }?>" />
				<label>Onderwerp</label>
				<input type="text" name="subject" value="<?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?><?php echo $_smarty_tpl->getVariable('subject')->value;?>
<?php }?>" />
				<label>Bericht</label>
				<textarea name="content"><?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?><?php echo $_smarty_tpl->getVariable('content')->value;?>
<?php }?></textarea>
				<input type="submit" name="submit" value="Verzend" />
				<div class="errorMessage <?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?>show<?php }?>"><?php echo $_smarty_tpl->getVariable('errorMessage')->value;?>
</div>
				<p><br />*alle velden zijn verplicht</p>
			</form>
		<?php }?>
		</div>
	</div>
</div>
