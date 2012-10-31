<div id="content" class="login">
	<h1>Bericht {if $new OR !$edit}toevoegen{else}wijzigen{/if}</h1>
	<form action="{if $new OR !$edit}{#pageBase#}/{#adminPage#}/news/add{else}{#pageBase#}/{#adminPage#}/news/change/{$newsItem.id}{/if}" method="post">
		<span class="inputRow">
			<label for="title">Titel</label>
			<input type="text" name="title" value="{if $edit}{$newsItem.title}{/if}"/>
		</span>
		<span class="inputRow">
			<label for="body_text">Bericht</label>
			<textarea id="body_text" name="body_text">
				{if $edit}
					{$newsItem.body_text|stripslashes}
					{$pBreak}
					{$newsItem.more_text|stripslashes}
				{/if}
			</textarea>
		</span>
		<span class="inputRow">
			<label for="user_id">Gebruiker</label>
			<select type="text" name="user_id">
				{section name=i loop=$users}
				<option value="{$users[i].id}" 	{if $edit && $users[i].id == $newsItem.user_id}
													selected="selected"
												{else if strtoupper($users[i].screen_name) == strtoupper($sessionUser) && $newItem}
													selected="selected"
												{/if}>
					{$users[i].screen_name}
				</option>
				{/section}
			</select>
		</span>
		<span class="inputRow">
			<label for="category_id">Category</label>
			<select type="text" name="category_id">
				{section name=i loop=$cats}
				<option value="{$cats[i].id}" {if $edit && $cats[i].id == $newsItem.category_id}selected="selected"{/if}>{$cats[i].name}</option>
				{/section}
			</select>
		</span>
		<input type="hidden" name="id" value="{if $edit}{$newsItem.id}{else}0{/if}"/></span>
		<div class="buttons">
			<input type="button" onclick="parent.location='{#pageBase#}/{#adminPage#}/news';" class="right" value="Annuleer" />
			<input type="submit" class="left" name="submit" value="{if $new OR !$edit}Voeg toe{else}Wijzig{/if}" />
		</div>
	</form>
	{if ! empty($error)}
	<div class="errorMessage">
		{$error}
	</div>
	{/if}
</div>

