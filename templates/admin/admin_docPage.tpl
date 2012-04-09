<div id="content" class="news">
	<h1>Documenten</h1>
	<div class="buttons top"><a href="/admin.php/news/new" class="add"></a></div>
	<div class="items">
		{section name="i" loop=$docs}
		<div class="item {cycle values='odd,even'}">
			<div class="buttons">
				<a href="/admin.php/news/edit/{$newsItems[i].id}" class="edit"></a>
				<a href="/admin.php/news/delete/{$newsItems[i].id}" class="remove"></a>
			</div>
			<h3><a href="/admin.php/news/edit/{$newsItems[i].id}">{$docs[i]}</a></h3>
		</div>
		{/section}
	</div>
	<div class="buttons"><a href="/admin.php/news/new" class="add"></a></div>
</div>

