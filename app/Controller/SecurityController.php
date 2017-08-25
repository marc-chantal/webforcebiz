<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Security\AuthentificationManager;
use Manager\UsersManager;

class SecurityController extends Controller
{
	private $user_manager;
	private $authentification_manager;

	/**
	 * Constructeur
	 * instanciation d'un UserManager
	 */
	public function __construct() {
		$this->user_manager = new UsersManager;
		$this->authentification_manager = new AuthentificationManager;
	}


	/**
	 * Connexion
	 */
	public function signin()
	{

		if($_SERVER['REQUEST_METHOD'] === 'POST') {

			// Récupération des données du formulaire

			// Vérification de l'existence de l'utilisateur en bdd

			// Contrôle du mot de passe

			// Ouverture de session

			// Redirection

		}

		// Affichage du formulaire d'identification
		$this->show('security/signin');

	}

	/**
	 * Inscription
	 */
	public function signup()
	{
		$username = null;
		$email = null;
		$password = null;
		$password_repeat = null;

		if($_SERVER['REQUEST_METHOD'] === 'POST') {

			$save = true;

			// Récupération des données du formulaire
			$username = $_POST['username'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$password_repeat = $_POST['password_repeat'];

			// Contrôle des données du formulaire
			if(empty($email))
				$save = false;
			elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
				$save = false;

			// Comparaison des deux mots de passe
			if($password != $password_repeat)
				$save = false;

			// Vérification de l'existence de l'utilisateur en bdd
			if($this->user_manager->emailExists($email))
				$save = false;

			if($save) {
				// Sauvegarde des données dans la bdd
				$user = $this->user_manager->insert([
					'username' => $username,
					'email' => $email,
					'password' => $password
				]);

				// Ouverture de session
				// À noter que le session_start() est déjà fait lors de la construction d'un objet App dans index.php
				$this->authentification_manager->logUserIn($user);

				// Redirection
				$this->redirectToRoute('profile');
			}
			else
				// idéalement, il faudrait remplacer le echo ci-dessous pr un message dans un flashbag 
				echo " /!\ /!\ ERREUR D'ENREGISTREMENT /!\ /!\ ";
		
		}

		// Affichage du formulaire d'inscription
		$this->show('security/signup', [
			'username' => $username,
			'email' => $email
		]);

	}

	/**
	 * Déconnexion
	 */
	public function signout()
	{
		// Fermeture de session
		$this->authentification_manager->logUserOut();

		// Redirection
		$this->redirectToRoute('products_index');
	}

	/**
	 * Demande de changement de mot de passe
	 */
	public function lostPwd()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST') {

			// Récupération des données du formulaire

			// Vérification de l'existence de l'utilisateur en bdd

			// Création d'un token

			// Envoi d'un email de confirmation

			// Affichage de la prise en compte de la demande
			
		}

		// Affichage du formulaire (adresse email)
		$this->show('security/pwd/lost');

	}

	/**
	 * Confirmation du changement de mot de passe
	 */
	public function resetPwd()
	{
		if($_SERVER['REQUEST_METHOD'] === 'POST') {

			// Récupération des données du formulaire

			// Contrôle du token

			// Contrôle du nouveau mot de passe

			// Récupération de l'utilisateur dans la bdd

			// Mise à jour du mot de passe dans la bdd

			// Redirection

		}

		// Affichage du formulaire (mot de passe)
		$this->show('security/pwd/reset');


	}

	public function profile()
	{
		$user = $this->getUser();
		// Contrôle de l'accès
		if(!$user)
			echo "getUser() ne donne rien !<br>";
			// $this->redirectToRoute('signin');
		else 
		// Affichage de la vue du profil
		$this->show('security/profile', [
			'session' => $_SESSION['user'],
			'user' => $this->user_manager->find($user['id'])
		]);
	}

}