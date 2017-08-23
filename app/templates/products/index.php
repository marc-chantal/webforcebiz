<?php $this->layout('layout', ['title' => 'Liste des produits']) ?>

<?php $this->start('main_content') ?>

    <a href="<?= $this->url('products_add') ?>">Ajouter un produit</a>
	
    <h2>Liste des produits</h2>

    <?php foreach($products as $product) : ?>
        <h4><a href="<?= $this->url('products_view', ['id' => $product['id']]) ?>"><?= $product['name'] ?></a></h4>
        <p><?= $product['image'] ?></p>
        <p><?= $product['price'] ?> €</p>
        <!-- <p><?= $product['description'] ?></p> -->
    <?php endforeach; ?>

<?php $this->stop('main_content') ?>
