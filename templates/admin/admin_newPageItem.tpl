<div id="content" class="login">
	<h1>Bericht {if $new OR !$edit}toevoegen{else}wijzigen{/if}</h1>
	<form action="{if $new OR !$edit}/admin/pages/add{else}/admin/pages/change/{$pageItem.id}{/if}" method="post">
		<div class="fields">
			<!-- Pagename -->
			<span class="inputRow">
				<label for="name">Naam</label>
				<input type="text" name="name" value="{if $edit}{$pageItem.name}{/if}"/>
			</span>
			<!-- Pagetitle -->
			<span class="inputRow">
				<label for="title">Titel</label>
				<input type="text" name="title" value="{if $edit}{$pageItem.page_title}{/if}"/>
			</span>
			<!-- Short description of the page -->
			<span class="inputRow">
				<label for="short" class="textAreaAlign">Beschrijving</label>
				<textarea name="short">{if $edit}{$pageItem.short_description}{/if}</textarea>
			</span>
			<!-- Page content -->
			<span class="inputRow">
				<label for="body_text">Inhoud</label>
				<textarea id="body_text" name="body_text">
					{if $edit}
						{$pageItem.content|stripslashes}
					{/if}
				</textarea>
			</span>
			<!-- User who created the page -->
			<span class="inputRow">
				<label for="user_id">Gebruiker</label>
				<select name="user_id">
					<option value="">Selecteer</option>
					{section name="i" loop=$users}
					<option value="{$users[i].id}" 	{if $users[i].id == $pageItem.user_id}
														selected="selected"
													{else if $users[i].screen_name==$sessionUser && $newItem}
														selected="selected"
													{/if}>{$users[i].screen_name}
					</option>
					{/section}
				</select>
			</span>
			<!-- Page parent -->
			<span class="inputRow">
				<label for="parent">Hoofdpagina</label>
				<select name="parent">
					<option value="">Selecteer</option>
					{section name="i" loop=$types}
					<option value="{$pages[i].id}" {if $pages[i].id == $pageItem.parent_id}selected="selected"{/if}>{$pages[i].name}</option>
					{/section}
				</select>
			</span>
			<!-- Page type -->
			<span class="inputRow">
				<label for="type_id">Paginatype</label>
				<select type="text" name="type_id">
					<option value="">Selecteer</option>
					{section name="i" loop=$types}
					<option value="{$types[i].id}" {if $types[i].id == $pageItem.type_id}selected="selected"{/if}>{$types[i].type}</option>
					{/section}
				</select>
			</span>
		</div>
		<input type="hidden" name="id" value="{if $edit}{$pageItem.id}{else}0{/if}"/></span>
		<!-- Buttons -->
		<div class="buttons">
			<input type="button" onclick="parent.location='/admin/news';" class="right" value="Annuleer" />
			<input type="submit" class="left" name="submit" value="{if $new OR !$edit}Voeg toe{else}Wijzig{/if}" />
		</div>
	</form>
	{if ! empty($error)}
	<div class="errorMessage">
		{$error}
	</div>
	{/if}
</div>

