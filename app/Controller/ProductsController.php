<?php

namespace Controller;

use \W\Controller\Controller;
// équivalent à "use \W\Controller\Controller as Controller";
use \Manager\ProductsManager;

class ProductsController extends Controller
// on aurait pu écrire "extends \W\Controller\Controller"
{

	/**
	 * Liste des produits
	 */
	public function index()
	{
		$products = new ProductsManager;

		$this->show('products/index', [
			'products' => $products->findAll()
		]);
	}

	/**
	 * Ajout d'un produit
	 */
	public function add()
	{
		$name = null;
		$description = null;
		$image = null;
		$price = null;
		
		if($_SERVER['REQUEST_METHOD'] === 'POST') {

			$save = true;
			
			// Récupération des données de $_POST
			$name = $_POST['name'];
			$description = $_POST['description'];
			$image = $_POST['image'];
			$price = $_POST['price'];

			// Contrôle et formatage des données
			
			// Enregistrement en bdd
			if($save) {
				$products = new ProductsManager;
				$product = $products->insert([
					'name' => $name,
					'description' => $description,
					'image' => $image,
					'price' => $price
				]);
				
				// Redirection vers la page enregistrée
				$this->redirectToRoute('products_view', ['id' => $product['id']]);
			}
		}
		
		$this->show('products/add', [
			'name' => $name,
			'description' => $description,
			'image' => $image,
			'price' => $price
		]);
	}
	
	/**
	 * Lecture d'un produit
	 */
	public function view($id)
	{
		$products = new ProductsManager;
		$this->show('products/view', 
			$products->find($id)
		);
	}

	/**
	 * Modification d'un produit
	 */
	public function edit($id)
	{
		$products = new ProductsManager;
		$product = $products->find($id);
		$name = $product['name'];
		$description = $product['description'];
		$image = $product['image'];
		$price = $product['price'];
		
		if($_SERVER['REQUEST_METHOD'] === 'POST') {

			$save = true;
			
			// Récupération des données de $_POST
			$name = $_POST['name'];
			$description = $_POST['description'];
			$image = $_POST['image'];
			$price = $_POST['price'];

			// Contrôle et formatage des données
			
			// Enregistrement en bdd
			if($save) {
				$product = $products->update([
					'name' => $name,
					'description' => $description,
					'image' => $image,
					'price' => $price
				], $id);
				
				// Redirection vers la page enregistrée
				$this->redirectToRoute('products_view', ['id' => $product['id']]);
			}
		}
		
		$this->show('products/edit', [
			'id' => $id,
			'name' => $name,
			'description' => $description,
			'image' => $image,
			'price' => $price
		]);
	}

	/**
	 * Suppression d'un produit
	 */
	public function delete($id)
	{
		// Suppression
		$products = new ProductsManager;
		$products->delete($id);
		// Redirection vers la liste des produits
		$this->redirectToRoute('products_index');
	}

}