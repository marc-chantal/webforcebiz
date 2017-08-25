<?php $this->layout('layout', ['title' => 'Contact']) ?>

<?php $this->start('main_content') ?>


<div class="container">
	<h2>Écrire un message</h2>
	<form method="post">
		<div class="form-group">
			<label for="name">Votre nom</label>
			<input type="text" class="form-control" id="name" name="name" value="<?= $name ?>" />
		</div>
		<div class="form-group">
			<label for="email">Votre email</label>
			<input type="email" id="email" name="email" value="<?= $email ?>" />
		</div>
		<div class="form-group">
			<label for="message">Votre message</label>
			<textarea id="message" name="message" rows="8" cols="80"><?= $message ?></textarea>
		</div>
		<!-- Bouton de validation -->
		<button class="btn btn-primary" type="submit">Enregistrer</button>
	</form>
</div>


<?php $this->stop('main_content') ?>
