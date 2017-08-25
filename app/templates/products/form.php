	<div class="container">
		<form method="post">
			<!-- Nom du produit -->
			<div class="form-group row">
				<label class="col-2 col-form-label" for="name">Nom</label>
				<div class="col-6">
					<input type="text" class="form-control" id="name" name="name" value="<?= $name ?>" />
				</div>
			</div>
			<!-- Description -->
			<div class="form-group row">
				<label class="col-2 col-form-label" for="description">Description</label>
				<div class="col-6">
					<textarea class="form-control" id="description" name="description"><?= $description ?></textarea>
				</div>
			</div>
			<!-- Image -->
			<div class="form-group row">
				<label class="col-2 col-form-label" for="image">Image</label>
				<div class="col-6">
					<input type="text" class="form-control" id="image" name="image" value="<?= $image ?>" />
				</div>
			</div>
			<!-- Prix -->
			<div class="form-group row">
				<label class="col-2 col-form-label" for="price">Prix</label>
				<span class="input-group-addon">€</span>
				<div class="col-6">
					<input type="text" class="form-control" id="price" name="price" value="<?= $price ?>" />
				</div>
			</div>
			<!-- Bouton de validation -->
			<div class="form-group row">
      			<div class="offset-4 col-4">
					<button class="btn btn-primary" type="submit">Enregistrer</button>
				</div>
			</div>
		</form>
	</div>
