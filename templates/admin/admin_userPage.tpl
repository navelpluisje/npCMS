<div id="content" class="news">
	<h1>Gebruikers</h1>
	<div class="buttons top"><a href="/admin/users/new" class="add" title="Voeg item toe"></a></div>
	<div class="items">
		{section name="i" loop=$users}
		<div class="item {cycle values='odd,even'}">
			<div class="buttons">
				<a href="/admin/users/delete/{$users[i].id}" class="remove right" title="Verwijder item"></a>
				<a href="/admin/users/edit/{$users[i].id}" class="edit left" title="Wijzig item"></a>
			</div>
			<img class="thumb" src="{if $users[i].picture!=''}/npCMS/{$users[i].picture}{else}/npCMS/img/thumbs/star.png{/if}" alt="thumb"/>
			<h3><a href="/admin/users/edit/{$users[i].id}" title="Wijzig item">{$users[i].screen_name}</a></h3>
			<h5>{$users[i].first_name}</h5>
			<p>{$users[i].last_name}</p>
		</div>
		{/section}
	</div>
	<div class="buttons bottom"><a href="/admin/users/new" class="add" title="Voeg item toe"></a></div>
</div>

