<div id="content" class="login">
	<h1>Gebruiker {if $new OR !$edit}toevoegen{else}wijzigen{/if}</h1>
	<form enctype="multipart/form-data" action="{if $new OR !$edit}{#pageBase#}/{#adminPage#}/users/add{else}{#pageBase#}/{#adminPage#}/users/change/{$user.id}{/if}" method="post">
		<span class="userImage">
			<img src="{if $edit && $user.picture!=''}{#pageBase#}/{$user.picture}{else}{#pageBase#}/img/thumbs/star.png{/if}" alt="userImage" title="Klik op de afbeelding om te wijzigen."/>
      		<input id="imageFile" type="file" name="img" />
		</span>
		<span class="inputRow">
			<label for="title">Weergave naam</label>
			<input type="text" name="scr_name" value="{if $edit}{$user.screen_name}{/if}"/>
		</span>
		<span class="inputRow">
			<label for="title">Wachtwoord</label>
			<input type="password" name="password" value="{if $edit}{$user.password}{/if}"/>
		</span>
		<span class="inputRow">
			<label for="title">Herhaal ww</label>
			<input type="password" name="password2" value="{if $edit}{$user.password2}{/if}"/>
		</span>
		<span class="inputRow">
			<label for="title">Voornaam</label>
			<input type="text" name="f_name" value="{if $edit}{$user.first_name}{/if}"/>
		</span>
		<span class="inputRow">
			<label for="title">Achternaam</label>
			<input type="text" name="l_name" value="{if $edit}{$user.last_name}{/if}"/>
		</span>
		<span class="inputRow">
			<label for="title">Email</label>
			<input type="text" name="email" value="{if $edit}{$user.email}{/if}"/>
		</span>
		<span class="inputRow">
			<label for="title">Actief</label>
			<input type="checkbox" name="active" {if $edit}{$user.active==1}checked{/if}/>
		</span>
		<input type="hidden" name="user_type" value="{if $edit}{$user.user_type}{/if}"/>
		<input type="hidden" name="picture" value="{if $edit}{$user.picture}{/if}"/>
		<input type="hidden" name="id" value="{if $edit}{$user.id}{else}0{/if}"/>
		<div class="buttons">
			<input type="button" onclick="parent.location='{#pageBase#}/{#adminPage#}/users';" class="right" value="Annuleer" />
			<input type="submit" class="left" name="submit" value="{if $new OR !$edit}Voeg toe{else}Wijzig{/if}" />
		</div>
	</form>
	{if ! empty($error)}
	<div class="errorMessage">
		{$error}
	</div>
	{/if} 
</div>

