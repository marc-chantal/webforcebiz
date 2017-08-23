<?php

namespace Controller;

use \W\Controller\Controller;
use \Manager\ContactsManager;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}

	/**
	 * Page de contact
	 */
	public function contact()
	{
		$name = null;
		$email = null;
		$message = null;

		if($_SERVER['REQUEST_METHOD'] === 'POST') {

			$save = true;

			// Récupération des données du formulaire
			$name = $_POST['name'];
			$email = $_POST['email'];
			$message = $_POST['message'];

			// Vérification des données récupérées

			// Enregistrement dans la bdd
			if($save) {
				$contact_manager = new ContactsManager;
				$contact_manager->insert([
					'name' => $name,
					'email' => $email,
					'message' => $message
				]);

				// Redirection vers la page d'accueil
				// $this->redirectToRoute('home');

			}
		}

		// Affichage de la vue
		$this->show('default/contact', [
			'name' => $name,
			'email' => $email,
			'message' => $message,
		]);
	}

}