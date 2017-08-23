   <form method="post">
        <!-- Nom du produit -->
        <label for="name">Nom</label>
        <input type="text" id="name" name="name" value="<?= $name ?>" />
        <br/>
        <!-- Description -->
        <label for="description">Description</label>
        <textarea id="description" name="description"><?= $description ?></textarea>
        <br/>
        <!-- Image -->
        <label for="image">Image</label>
        <input type="text" id="image" name="image" value="<?= $image ?>" />
        <br/>
        <!-- Prix -->
        <label for="price">Prix</label>
        <input type="text" id="price" name="price" value="<?= $price ?>" /> €
        <br/>
        <!-- Bouton de validation -->
        <button type="submit">Enregistrer</button>
    </form>