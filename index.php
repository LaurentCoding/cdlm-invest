<?php
// Start_session
session_start();

// création du constante URL (racine du projet)
define("URL", str_replace("index.php", "", (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

// mainController -> permet de générer les pages
require "./controllers/mainController.php";
// ----------------
require "./controllers/function.php";
// ----------------
require_once "./controllers/utilisateur/user.controller.php";
$userController = new UtilisateurController;
// ----------------
require_once "./controllers/admin/admin.controller.php";
$adminController = new AdministrateurController;
// ----------------
require_once "./controllers/visiteur/visitor.controller.php";
$visiteurController = new VisiteurController;


// GESTION DES ROUTES ---------------------------------------------------------------------------------------------------------
try {
	//vérification si on est sur la racine de l'URL
	if (empty($_GET['page'])) {
		$_SESSION['page'] = "accueil";
		$visiteurController->afficherAccueil();
	} else {
		// génerer un tableau des informations contenu dans l'url
		$url = explode("/", filter_var($_REQUEST['page']), FILTER_SANITIZE_URL);

		// gestion des routes en fonction de l'url
		switch($url[0]){
			case "accueil":
				$_SESSION['page'] = "accueil";
				$visiteurController->afficherAccueil();
			break;
			// gestion connexion
			case "connexion":
				$_SESSION['page'] = "connexion";
				$userController->afficherConnexion();
			break;
			case "goConnexion":
				$array = [
					"email"		=> data_secure($_POST['email']),
					"password"	=> hachage_password(data_secure($_POST['password']))
				];
				$userController->goConnection($array);
			break;
			
			// gestion inscription
			case "inscription":
				$_SESSION['page'] = "inscription";
				$visiteurController->afficherInscription();
			break;
			case "goInscription":
				$array = [
				"nom" 		=> data_secure($_POST['nom']),
				"prenom" 	=> data_secure($_POST['prenom']),
				"email" 	=> data_secure($_POST['email']),
				"password" 	=> hachage_password(data_secure($_POST['password1'])),
				"profil"	=> data_secure($_POST['profil'])
				];
				$userController->goInscription($array);
			break;

				// déconnexion
			case "logout":
				$userController->goDeconnexion();
			break;

			// Users
			case "user":
				if(is_connected()){
					if(isset($url[1])){
						if ($url[1] == "profil" && !isset($url[2])) {
							$_SESSION['page'] = "profil";
							$userController->afficherProfil();
						}elseif($url[1] == "profil" && isset($url[2])){
							if($url[2] == "name"){
								$userController->updateProfil($_SESSION['email'],$url[2],data_secure($_POST['name']));
							}elseif($url[2] == "surname"){
								$userController->updateProfil($_SESSION['email'],$url[2], data_secure($_POST['surname']));
							}elseif($url[2] == "company"){
								$userController->updateProfil($_SESSION['email'],$url[2], data_secure($_POST['company']));
							}elseif($url[2] == "avatar"){
								// vérification poid fichier
								if($_FILES['avatar']['size']/ 1000000 < 1){
									$informationFiles = pathinfo($_FILES['avatar']['name']);
									// vérification extension fichier
									if($informationFiles['extension'] == "jpg" || $informationFiles['extension'] == "png"){
										$newAdresse = "public/img/avatar/avatar_".$_SESSION['name']."_".time().".".$informationFiles['extension'];
										$userController->updateAvatarProfil($_SESSION['email'], $url[2], $newAdresse, $_FILES['avatar']['tmp_name']);
									}else {
										Toolbox::ajouterMessageAlerte("Formats autorisés : jpg, png.", Toolbox::COULEUR_ORANGE);
										header("location: " . URL . "user/profil");
									}
								}else{
									Toolbox::ajouterMessageAlerte("Trop volumineux 1mo maximum",Toolbox::COULEUR_ORANGE);
									header("location: ".URL."user/profil");
								}
							}elseif($url[2] == "grade_id"){
								$userController->updateProfil($_SESSION['email'],$url[2], data_secure($_POST['grade']));

							}else{
								throw new Exception("Erreur de requête");
							}
						}elseif($url[1] == "projet"){
							if(!isset($url[2])){
								$_SESSION['page'] = "projet";
								$userController->afficherProjet();
							}else{
								$_SESSION['page'] = "projet";
								if($url[2] == "new"){
									$userController->afficherAjoutProjet();
								}elseif($url[2] == "registerProjet"){
									$array_projet = [
										"nom_projet"			=> data_secure($_POST['nom_projet']),
										"description_projet"	=> data_secure($_POST['description_projet']),
										"invest_projet"			=> data_secure($_POST['invest_projet']),
										"duree_projet"			=> data_secure($_POST['duree_projet'])
									];

									if($array_projet['nom_projet'] != "" || $array_projet['invest_projet'] !="" || $array_projet['duree_projet'] != "")
									{
										$userController->ajouterProjet($array_projet);
									}else{
										Toolbox::ajouterMessageAlerte("Nom du projet et/ou investissement manquant",Toolbox::COULEUR_ORANGE);
										render('user/projet/new',"projet");
									}
								}elseif($url[2] == "delete"){
									$userController->supprimerProjet($url[3]);
								}elseif($url[2] == "afficher"){
									$userController->afficherDetailProjet($url[3]);
								}elseif($url[2] == "update"){
									if($url[3] == "nom_projet")
									{
										$userController->updateProjet($url[4], $url[3], data_secure($_POST['nomProjet']));
									}
									elseif($url[3] == "description_projet")
									{
										$userController->updateProjet($url[4], $url[3], data_secure($_POST['descriptionProjet']));
									}
								}
							}
						}
					}else{
						throw new Exception("Page introuvable");
					}
				}else{
					Toolbox::ajouterMessageAlerte("Vous devez être connecté", Toolbox::COULEUR_ORANGE);
					render('accueil',"accueil");
				}
			break;
			case "admin":
				if($_SESSION['admin'] == "1"){
					if (!isset($url[1])) {
						$adminController->afficherGestion();
					}
				}else{
					Toolbox::ajouterMessageAlerte("Vous devez êtres Admin",Toolbox::COULEUR_ROUGE);
					render("accueil","accueil");
				}
			break;

			case "qui-sommes-nous":
				$visiteurController->AfficherQuiSommesNous();
			break;
			case "nos-expertises":
				$visiteurController->AfficherNosExpertises();
			break;
			case "nos-solutions":
				$visiteurController->afficherNosSolutions();
			break;
			case "blog":
				$visiteurController->afficherBlog();
			break;
			case "contact":
				$visiteurController->afficherContact();
			break;
			default:
			$_SESSION['page'] = "";
			throw new Exception("page introuvable");
		}
	}
} catch (Exception $e) {
	$userController->error_404($e->getMessage());
}
