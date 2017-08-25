<?php $this->layout('layout', ['title' => 'S\'enregistrer']) ?>

<?php $this->start('main_content') ?>
	
	<h2>S'enregistrer</h2>

	<form method="POST">
		<div>
			<label for="username">Nom Prénom</label>
			<input type="text" id="username" name="username" value="<?= $username ?>" />
		</div>
		<div>
			<label for="email">E-mail</label>
			<input type="text" id="email" name="email" value="<?= $email ?>" />
		</div>
		<div>
			<label for="password">Mot de passe</label>
			<input type="password" id="password" name="password" value="" />
		</div>
		<div>
			<label for="password_repeat">Répétez votre mot de passe</label>
			<input type="password" id="password_repeat" name="password_repeat" value="" />
		</div>

		<button type="submit">S'inscrire</button>
	</form>


<?php $this->stop('main_content') ?>
