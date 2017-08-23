<?php $this->layout('layout', ['title' => 'Consulter le produit N°'.$id]) ?>

<?php $this->start('main_content') ?>

	<a href="<?= $this->url('products_edit', ['id' => $id]) ?>">Modifier le produit</a>
	<a href="<?= $this->url('products_delete', ['id' => $id]) ?>">Effacer le produit</a>

	<h2><?= $name ?></h2>
	<p><?= $image ?></p>
    <p>Description : <?= $description ?></p>
    <p>Prix : <?= $price ?></p>
    
<?php $this->stop('main_content') ?>
