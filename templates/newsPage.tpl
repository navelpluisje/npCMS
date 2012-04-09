<div id="content" class="news">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="{$pageBase}/index/1"><img src="/npCMS/img/close.png" alt="close" title="sluiten"/></a></span>
		<h1>Nieuws</h1>
		<div class="itemList large">
			{section name="i" loop=$newsItems}
			<div class="listItem">
				<h3><a href="{$pageBase}/index/{$pageId}/{$newsItems[i].id}">{$newsItems[i].title}</a><span class="date">{date('d M Y',strtotime($newsItems[i].date_created))}</span></h3>
				<p>
					{$newsItems[i].body_text|stripslashes}
					<a class="readmore" href="{$pageBase}/index/{$pageId}/{$newsItems[i].id}">meer&hellip;</a>
				</p>
			</div>
			{/section}
		</div>
	</div>
</div>

