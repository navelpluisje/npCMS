<?php /* Smarty version Smarty-3.0.8, created on 2011-11-22 22:05:00
         compiled from "../templates/newBlogPage.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21393252874ecc0e7cc53d67-44244116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd3f43054dbf3d15479a01371555855d3c9e5d768' => 
    array (
      0 => '../templates/newBlogPage.tpl',
      1 => 1321995900,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21393252874ecc0e7cc53d67-44244116',
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
		<!-- Contactgegevens -->
		<span id="contactInfo">
			<h3>Spelregels</h3>
			<ul class="spelregels">
				<li>
					De redactie behoudt zich het recht voor om teksten in te korten en kwetsende of discriminerende teksten niet te plaatsen.
				</li>
				<li>
					De reacties kunnen niet te lang zijn, dus wordt een maximaal aantal woorden gehanteerd.
				</li> 
				<li>
					Reacties zonder naam en geldig emailadres worden niet geplaatst. 
				</li>
				<li>
					Bij verdenking van spam zullen uw gegevens geblokkeerd worden.
				</li>
			</ul>
		</span>
		
		<!-- Contact form -->
		<?php if ($_smarty_tpl->getVariable('send')->value){?>
			<h3><?php echo $_smarty_tpl->getVariable('message')->value;?>
</h3>
			<?php if ($_smarty_tpl->getVariable('explanation')->value!=''){?>
				<?php echo $_smarty_tpl->getVariable('explanation')->value;?>

			<?php }?>
		<?php }else{ ?>
			<div id="contactForm"> 
				<h3>Nieuw bericht</h3>
				<form class="blog" action="<?php echo $_smarty_tpl->getVariable('pageBase')->value;?>
/index.php/<?php echo $_smarty_tpl->getVariable('pageId')->value;?>
/new" method="post">
					<label>Naam</label>
					<input type="text" name="name" value="<?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?><?php echo $_smarty_tpl->getVariable('name')->value;?>
<?php }?>" />
					<label>Email</label>
					<input type="text" name="mail" value="<?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?><?php echo $_smarty_tpl->getVariable('mail')->value;?>
<?php }?>" />
					<label>Titel</label>
					<input type="text" name="title" value="<?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?><?php echo $_smarty_tpl->getVariable('title')->value;?>
<?php }?>" />
					<label>Bericht</label>
					<textarea name="content"><?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?><?php echo $_smarty_tpl->getVariable('content')->value;?>
<?php }?></textarea>
					<input type="submit" name="submit" value="Plaatsen" />
					<div class="errorMessage <?php if ($_smarty_tpl->getVariable('errorMessage')->value!=''){?>show<?php }?>"><?php echo $_smarty_tpl->getVariable('errorMessage')->value;?>
</div>
					<p><br />*alle velden zijn verplicht</p>
				</form>
			</div>
		<?php }?>
	</div>
</div>
