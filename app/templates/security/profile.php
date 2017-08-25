<?php $this->layout('layout', ['title' => 'Profil utilisateur']) ?>

<?php $this->start('main_content') ?>
	<h2>Informations d'utilisateur.</h2>
	<p> Infos de session :</p>
	<?php var_dump($session); ?>
	<p> Infos en base de données :</p>
	<?php var_dump($user); ?>
<?php $this->stop('main_content') ?>
