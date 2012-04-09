<div id="content" class="{$contentBlock.name}">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="{$pageBase}/index/{$cPage['parent_id']}"><img src="/npCMS/img/close.png" alt="close" title="sluiten"/></a></span>
		<div class="listItem">
			<h1>{$contentBlock.page_title}</h1>
			<div class="itemList large">
				{$contentBlock.content|stripslashes}
			</div>
		</div>
	</div>
</div>
