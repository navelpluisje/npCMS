{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	{include file='head.tpl'}
	<body>
		<div id="wrapper">
		<div class="twinkle"></div>
			<div id="title">
				<span class="titleText">
					<a href="{$pageBase}/"><img src="/npCMS/img/logo.png" /></a>
				</span>
			</div>
			<ul id="menu">
				{section name="i" loop=$links}
				<li id="menu_{$links[i].id}" title="{$links[i].short_description}" class="{$links[i].name|lower|replace:' ':''} menuItem"><a href="{$pageBase}/index/{$links[i].id}">{$links[i].name}</a></li>
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