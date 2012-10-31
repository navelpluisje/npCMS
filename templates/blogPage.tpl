<div id="content" class="blog">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="{#pageBase#}/{#indexPage#}/1"><img src="{#pageBase#}/img/close.png" alt="close" title="sluiten"/></a></span>
		<h1>Gastenboek</h1>
		<div class="itemList">
		{if $empty==true}
			<div class="listItem">
				<h3>Er zijn nog geen berichten geschreven!!</h3>
				<p>
					Bent u de eerste??</br>
					Klik op &acute;Schrijven&acute;-knop om een bericht te schrijven.  
				</p>
			</div>
		{else}
			{section name=i loop=$blogItems}
			<div class="listItem">
				<h3>{$blogItems[i].title|stripslashes}<span class="date">{date('d M Y',strtotime($blogItems[i].date_created))}</span></h3>
				<p>
					{$blogItems[i].body_text|stripslashes}
				</p>
				<span>door: {$blogItems[i].guest_name}</span>
			</div>
			{/section}
		{/if}
		</div>
		<div class="itemListAdd">
			<a href="{#pageBase#}/{#indexPage#}/{$pageId}/add" class="add" title="Schrijf een bericht!!"><span>&nbsp;</span>Schrijven</a>
		</div>
	</div>
</div>

