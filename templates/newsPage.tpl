<div id="content" class="news">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="{#pageBase#}/{#indexPage#}/1"><img src="{#pageBase#}/img/close.png" alt="close" title="sluiten"/></a></span>
		<h1>Wat is</h1>
		<div class="itemList large">
		{if $empty==true}
			<div class="listItem">
				<h3>Er zijn nog geen nieuwsitems beschikbaar!!</h3>
				<p>
					Er wordt gewerkt aan het maken van nieuwsitems. 
				</p>
			</div>
		{else}
			{section name=i loop=$newsItems}
			<div class="listItem">
				<h3><a href="{#pageBase#}/{#indexPage#}/{$pageId}/{$newsItems[i].id}">{$newsItems[i].title}</a><span class="date">{date('d M Y',strtotime($newsItems[i].date_created))}</span></h3>
				<p>
					{$newsItems[i].body_text|stripslashes}
					<a class="readmore" href="{#pageBase#}/{#indexPage#}/{$pageId}/{$newsItems[i].id}">meer&hellip;</a>
				</p>
			</div>
			{/section}
		{/if}
		</div>
	</div>
</div>

