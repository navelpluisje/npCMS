<div id="content" class="contact">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		
		<span class="close"><a href="{#pageBase#}/{#indexPage#}/{$pageId}"><img src="{#pageBase#}/img/close.png" alt="close" title="sluiten"/></a></span>
		<h1>Wat is</h1>
		<div class="itemList large">
			<div class="listItem">
				<h3>{$newsItems.title}<span class="date">{date('d M Y',strtotime($newsItems.date_created))}</span></h3>
				<p>{$newsItems.body_text|stripslashes}</p>
				<p>{$newsItems.more_text|stripslashes}</p>
			</div>
		</div>
	</div>
</div>
