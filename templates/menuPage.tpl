{* Smarty *}
{config_load file='npCMS.conf'}
<!DOCTYPE html>
<html>
	{include file='head.tpl'}
	<body>
		<div id="wrapper">
		<div class="twinkle"></div>
			<div id="title">
				<span class="titleText">
					<a href="{#pageBase#}/"><img src="{#pageBase#}/img/logo.png" /></a>
				</span>
			</div>
			<ul id="menu">
				{section name="i" loop=$links}
				<li id="menu_{$links[i].id}" title="{$links[i].short_description}" class="{$links[i].name|lower|replace:' ':''} menuItem"><a href="{#pageBase#}/{#indexPage#}/{$links[i].id}">{$links[i].name}</a></li>
				{/section}
			</ul>
			{if ! $template == ''}
			{include file=$template}
			{/if}
		</div>
		{include file='footer.tpl'}
		<div id="log"></div>
	</body>
</html>