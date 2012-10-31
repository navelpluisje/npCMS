<div id="content" class="news">
	<h1>Pagina&acute;s</h1>
	<div class="buttons top"><a href="{#pageBase#}/{#adminPage#}/pages/new" class="add" title="Voeg item toe"></a></div>
	<div class="items">
		{section name="i" loop=$pageItems}
		<div class="item {cycle values='odd,even'}">
			<div class="buttons">
				<a href="{#pageBase#}/{#adminPage#}/pages/delete/{$pageItems[i].id}" class="remove right" title="Verwijder item"></a>
				<a href="{#pageBase#}/{#adminPage#}/pages/edit/{$pageItems[i].id}" class="edit left" title="Wijzig item"></a>
			</div>
			<h3><a href="{#pageBase#}/{#adminPage#}/pages/edit/{$pageItems[i].id}">{$pageItems[i].page_title}</a></h3>
			{section name="j" loop=$users}
			{if $users[j].id == $pageItems[i].user_id}
			<h5>door: {$users[j].screen_name} | op: {date('d M Y',strtotime($pageItems[i].date_created))}</h5>
			{/if}
			{/section	}
			<p>{$pageItems[i].content|stripslashes}</p>
		</div>
		{/section}
	</div>
	<div class="buttons bottom"><a href="/admin/pages/new" class="add" title="Voeg item toe"></a></div>
</div>

