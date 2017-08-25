<?php $this->layout('layout', ['title' => 'Effacer le produit  N°'.$product['id']]) ?>

<?php $this->start('main_content') ?>
	<h2>Êtes-vous vraiment sûr s'être tout à fait sûr et certain ?</h2>
	<p>Voulez-vous effacer le produit suivant : <?= $product['name'] ?> ?</p>
	<form method="POST">
		<button type='submit'>Oui</button>
	</form>
	<a href="<?= $this->url('products_view', ['id' => $product['id']]) ?>"><button>Non</button></a> 

<?php $this->stop('main_content') ?>
