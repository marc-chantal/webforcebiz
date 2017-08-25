<?php $this->layout('layout', ['title' => 'Liste des produits']) ?>

<?php $this->start('main_content') ?>

	<a href="<?= $this->url('products_add') ?>">Ajouter un produit</a>
	
	<h2>Liste des produits</h2>

	<?php if(count($products)) : ?>

	<ul>
	<?php foreach($products as $product) : ?>
		<li>
			<h4><a href="<?= $this->url('products_view', ['id' => $product['id']]) ?>"><?= $product['name'] ?></a></h4>
			<p><?= $product['image'] ?></p>
			<p><?= $product['price'] ?> €</p>
			<!-- <p><?= $product['description'] ?></p> -->
		</li>
	<?php endforeach; ?>
	</ul>

	<?php else : ?>

	<p>Il n'y a aucun produit dans la base de données.</p>

	<?php endif; ?>

<?php $this->stop('main_content') ?>
