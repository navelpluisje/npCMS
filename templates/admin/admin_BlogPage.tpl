<div id="content" class="news">
	<h1>Blogs</h1>
	<div class="items">
		{if $empty}
			<h3>Geen resultaten!!</h3>
		{else}
			{section name=i loop=$blogItems}
			<div class="item {cycle values='odd, even'}">
				<div class="buttons">
					<a href="{#pagebase#}/{#adminPage#}/blogs/delete/{$blogItems[i].id}" class="remove right" title="Verwijder item"></a>
					<a href="{#pagebase#}/{#adminPage#}/blogs/ip/{$blogItems[i].guest_id}" class="ip center" title="Blokkeer IP"></a>
					<a href="{#pagebase#}/{#adminPage#}/blogs/guest/{$blogItems[i].guest_id}" class="guest center" title="Blokkeer Gast"></a>
					<a href="{#pagebase#}/{#adminPage#}/blogs/edit/{$blogItems[i].id}" class="edit left" title="Wijzig item"></a>
				</div>
				<h3{if $blogItems[i].visible == 0} class="blocked" title="Geblokkeerd"{/if}><a href="{#pagebase#}/{#adminPage#}/blogs/edit/{$blogItems[i].id}">{$blogItems[i].title|stripslashes}</a></h3>
				{section name="j" loop=$guests}
				{if $guests[j].id == $blogItems[i].guest_id}
				<h5>door: {$guests[j].name}</h5>
				{/if}
				{/section}
				<p>{$blogItems[i].body_text|stripslashes}</p>
			</div>
			{/section}
		{/if}
	</div>
</div>

