{* Smarty *}
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	{include file='admin/admin_head.tpl'}
	<body>
		<div id="wrapper">
			<div id="title">
				WebAdmin
				<span class=" buttons titleUser">
					<a class="logout right" title="Uitloggen"></a>
					<a href="" class="login left" title="Ingelogd als...">{if $login!=true}{$sessionUser}{else}Uitgelogd{/if}</a>
				</span>
			</div>
			{if $menu == true}
				{include file='admin/admin_menu.tpl'}
			{/if}
			{if $login == true}
				{include file='admin/admin_login.tpl'}
			{else}
				{include file=$template}
			{/if}
			{include file='footer.tpl'}
			<div id="log"></div>
		</div>
	</body>
</html>