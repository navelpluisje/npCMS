<div id="content" class="news">
	<h1>Nieuws</h1>
	<div class="buttons top"><a href="{#pageBase#}/{#adminPage#}/news/new" class="add" title="Voeg item toe"></a></div>
	<div class="items">
	{if ! $empty}
		{section name="i" loop=$newsItems}
		<div class="item {cycle values='odd,even'}">
			<div class="buttons">
				<a href="{#pageBase#}/{#adminPage#}/news/delete/{$newsItems[i].id}" class="remove right" title="Verwijder item"></a>
				<a href="{#pageBase#}/{#adminPage#}/news/edit/{$newsItems[i].id}" class="edit left" title="Wijzig item"></a>
			</div>
			<h3><a href="{#pageBase#}/{#adminPage#}/news/edit/{$newsItems[i].id}">{$newsItems[i].title}</a></h3>
			{section name="j" loop=$users}
			{if $users[j].id == $newsItems[i].user_id}
			<h5>door: {$users[j].screen_name} | op: {date('d M Y',strtotime($newsItems[i].date_created))}</h5>
			{/if}
			{/section	}
			<p>{$newsItems[i].body_text|stripslashes}</p>
		</div>
		{/section}
	{/if}
	</div>
	<div class="buttons bottom"><a href="{#pageBase#}/{#adminPage#}/news/new" class="add" title="Voeg item toe"></a></div>
</div>

