<div id="content" class="blog">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="{#pageBase#}/{#indexPage#}/1"><img src="{#pageBase#}/img/close.png" alt="close" title="sluiten"/></a></span>
		<h1>Gastenboek</h1>
		<!-- Contactgegevens -->
		<span id="contactInfo">
			<h3>Spelregels</h3>
			<ul class="spelregels">
				<li>
					De redactie behoudt zich het recht voor om teksten in te korten en kwetsende of discriminerende teksten niet te plaatsen.
				</li>
				<li>
					De reacties kunnen niet te lang zijn, dus wordt een maximaal aantal woorden gehanteerd.
				</li> 
				<li>
					Reacties zonder naam en geldig emailadres worden niet geplaatst. 
				</li>
				<li>
					Bij verdenking van spam zullen uw gegevens geblokkeerd worden.
				</li>
			</ul>
		</span>
		
		<!-- Contact form -->
		{if $send}
			<h3>{$message}</h3>
			{if $explanation != ''}
				{$explanation}
			{/if}
		{else}
			<div id="contactForm"> 
				<h3>Nieuw bericht</h3>
				<form class="blog" action="{#pageBase#}/{#indexPage#}/{$pageId}/new" method="post">
					<label>Naam</label>
					<input type="text" name="name" value="{if $errorMessage != ''}{$name}{/if}" />
					<label>Email</label>
					<input type="text" name="mail" value="{if $errorMessage != ''}{$mail}{/if}" />
					<label>Titel</label>
					<input type="text" name="title" value="{if $errorMessage != ''}{$title}{/if}" />
					<label>Bericht</label>
					<textarea name="content">{if $errorMessage != ''}{$content}{/if}</textarea>
					<input type="submit" name="submit" value="Plaatsen" />
					<div class="errorMessage {if $errorMessage != ''}show{/if}">{$errorMessage}</div>
					<p><br />*alle velden zijn verplicht</p>
				</form>
			</div>
		{/if}
	</div>
</div>
