<div id="content" class="login">
	<h1>Blog {if $edit}wijzigen{else}toevoegen{/if}</h1>
	<form action="{if $edit}/admin/blogs/change/{$blogItem.id}{else}/admin/blogs/add{/if}" method="post">
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
						{$blogItem.body_text|stripslashes}
					{/if}
				</textarea>
			</span>
			<span class="inputRow">
				<label for="title">Verborgen</label>
				<input type="checkbox" name="hidden" {if $edit}{if $blogItem.visible == 0}checked{/if}{/if}/><br />
			</span>
		</fieldset>
		<fieldset>
			<legend>Gebruikergegevens</legend>
			<span class="inputRow">
				<label for="guest_id">Gebruiker</label>
				<select type="text" name="guest_id" disabled="true">
					{section name="i" loop=$guests}
					<option value="{$guests[i].id}" {if $guests[i].id == $blogItem.guest_id}selected="selected"{/if}>{$guests[i].name}</option>
					{/section}
				</select>
			</span>
			<span class="inputRow">
				<label for="title">Geblokkeerd</label>
				<input type="checkbox" name="blocked" {if $edit}{if $guest.banned==1}checked{/if}{/if}/><br />
			</span>
			<span class="inputRow">
				<label for="title">Email</label>
				<input type="text" name="email" disabled="true" value="{if $edit}{$guest.email}{/if}"/><br />
			</span>
			<span class="inputRow">
				<label for="title">IP-Adres</label>
				<input type="text" name="ip" disabled="true" value="{if $edit}{$guest.ip}{/if}"/><br />
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
			<a href="/admin/blogs/delete/{$blogItem.id}" class="remove right" title="Verwijder item"></a>
			<a href="/admin/blogs/ip/{$blogItem.guest_id}" class="ip center" title="Blokkeer IP"></a>
			<a href="/admin/blogs/guest/{$blogItem.guest_id}" class="guest center" title="Blokkeer gast"></a>
			<input type="submit" class="left login" value="{if $edit}Wijzig{else}Voeg toe{/if}" />
		</div>
	</form>
</div>

