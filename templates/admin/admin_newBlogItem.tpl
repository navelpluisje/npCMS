<div id="content" class="login">
	<h1>Blog {if $edit}wijzigen{else}toevoegen{/if}</h1>
	<form action="{if $edit}{#pageBase#}/{#adminPage#}/blogs/change/{$blogItem.id}{else}{#pageBase#}/{#adminPage#}/blogs/add{/if}" method="post">
		<fieldset>
			<legend>Berichtgegevens</legend>
			<span class="inputRow">
				<label for="title">Titel</label>
				<input type="text" name="title" value="{if $edit}{$blogItem.title|stripslashes}{/if}"/><br />
			</span>
			<span class="textAreaLabel inputRow">
				<label for="text" style="vertical-align:top;">Bericht</label>
				<textarea id="text" name="text">
					{if $edit}
						{$blogItem.body_text|strip|stripslashes}
					{/if}
				</textarea>
			</span>
			<span class="inputRow">
				<label for="title">Verborgen</label>
				<input type="checkbox" name="hidden" value="hidden" {if $edit && $blogItem.visible == 0}checked{/if}/><br />
			</span>
		</fieldset>
		<fieldset>
			<legend>Gebruikergegevens</legend>
			<span class="inputRow">
				<label for="dis_guest_id">Gebruiker</label>
				<select type="text" name="dis_guest_id" disabled="true">
					{section name="i" loop=$guests}
					<option value="{$guests[i].id}" {if $guests[i].id == $blogItem.guest_id}selected="selected"{/if}>{$guests[i].name}</option>
					{/section}
				</select>
				<input type="hidden" name="guest_id" value="{$blogItem.guest_id}" />
			</span>
			<span class="inputRow">
				<label for="blocked">Geblokkeerd</label>
				<input type="checkbox" name="blocked" {if $edit}{if $guest.banned==1}checked{/if}{/if}/><br />
			</span>
			<span class="inputRow">
				<label for="dis_email">Email</label>
				<input type="text" name="dis_email" disabled="true" value="{if $edit}{$guest.email}{/if}"/><br />
				<input type="hidden" name="email" value="{if $edit}{$guest.email}{/if}"" />
			</span>
			<span class="inputRow">
				<label for="dis_ip">IP-Adres</label>
				<input type="text" name="dis_ip" disabled="true" value="{if $edit}{$guest.ip}{/if}"/><br />
				<input type="hidden" name="ip" value="{if $edit}{$guest.ip}{/if}" />
			</span>
	<!--		<span class="inputRow">
				<label for="category_id">Category</label>
				<select type="text" name="category_id">
					{section name="i" loop=$cats}
					<option value="{$cats[i].id}" {if $cats[i].id == $newsItems.category_id}selected="selected"{/if}>{$cats[i].name}</option>
					{/section}
				</select>
	</span>-->
		</fieldset>
		<div class="buttons bottom border">
			<a href="{#pageBase#}/{#adminPage#}/blogs/delete/{$blogItem.id}" class="remove right" title="Verwijder item"></a>
			<a href="{#pageBase#}/{#adminPage#}/blogs/ip/{$blogItem.guest_id}" class="ip center" title="Blokkeer IP"></a>
			<a href="{#pageBase#}/{#adminPage#}/blogs/guest/{$blogItem.guest_id}" class="guest center" title="Blokkeer gast"></a>
			<input type="submit" class="left login" value="{if $edit}Wijzig{else}Voeg toe{/if}" />
		</div>
	</form>
</div>

