<div id="content" class="contact">
	<div class="contentBlock background">
	</div>
	<div class="contentBlock forground">
		<span class="close"><a href="{$pageBase}/index/1"><img src="/npCMS/img/close.png" alt="close" title="sluiten"/></a></span>
		<h1>Contact</h1>
		<!-- Contactgegevens -->
		<span id="contactInfo">
			<h3>Gegevens</h3>
			<p>
				Mooi - IJsselstein<br/>
				Industrieweg 36<br/>
				3401 MA IJsselstein<br/>
			</p>
			<p>
				<a href="mailto:info@mooi-ijsselstein.nl">info@mooi-ijsselstein.nl</a><br/>
				030 687 84 65<br/>
			</p>
		</span>
		
		<!-- Contact form -->
		<div id="contactForm">
		{if $send}
			<h3>Bericht is met succes verzonden</h3>
		{else}
			<h3>Contactformulier</h3>
			<form action="{$pageBase}/index/{$pageId}/" method="post">
				<label>Naam</label>
				<input type="text" name="name" value="{if $errorMessage != ''}{$name}{/if}" />
				<label>Email</label>
				<input type="text" name="mail" value="{if $errorMessage != ''}{$mail}{/if}" />
				<label>Onderwerp</label>
				<input type="text" name="subject" value="{if $errorMessage != ''}{$subject}{/if}" />
				<label>Bericht</label>
				<textarea name="content">{if $errorMessage != ''}{$content}{/if}</textarea>
				<input type="submit" name="submit" value="Verzend" />
				<div class="errorMessage {if $errorMessage != ''}show{/if}">{$errorMessage}</div>
				<p><br />*alle velden zijn verplicht</p>
			</form>
		{/if}
		</div>
	</div>
</div>
