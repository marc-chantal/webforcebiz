<?php

namespace Controller;

use \W\Controller\Controller;
// équivalent à "use \W\Controller\Controller as Controller";
use \Manager\ProductsManager;

class ProductsController extends Controller
// on aurait pu écrire "extends \W\Controller\Controller"
{
	private $product_manager;

	/**
	 * Constructeur
	 * instanciation d'un ProductsManager
	 */
	public function __construct()
	{
		$this->product_manager = new ProductsManager;
	}

	/**
	 * Liste des produits
	 */
	public function index()
	{
		$this->show('products/index', [
			'products' => $this->product_manager->findAll()
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
			$price = floatval($_POST['price']);

			// Contrôle et formatage des données
			if(!$price) $save = false;

			if($save) {
				// Enregistrement en bdd
				$product = $this->product_manager->insert([
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
		$this->show('products/view', 
			$this->product_manager->find($id)
		);
	}

	/**
	 * Modification d'un produit
	 */
	public function edit($id)
	{
		$product = $this->product_manager->find($id);
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
			$price = floatval($_POST['price']);

			// Contrôle et formatage des données
			if(!$price) $save = false;

			if($save) {
				// Enregistrement en bdd
				$product = $this->product_manager->update([
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
		$product = $this->product_manager->find($id);

		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Suppression
			$this->product_manager->delete($id);
			// Redirection vers la liste des produits
			$this->redirectToRoute('products_index');
		}

		$this->show('products/delete', [
			'product' => $product
		]);



		
	}

}