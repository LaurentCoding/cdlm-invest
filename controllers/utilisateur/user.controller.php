<?php

// appelle du usermanager
require "./models/userManager.php";
// appelle profilManager
require "./models/projetManager.php";
// apelle Anne manager
require "./models/anneeManager.php";
// -----------------------------------------------------
// classe UsersController
class UtilisateurController extends MainController{
    private $userManager;
    private $projetManager;
    private $anneManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->projetManager = new ProjetManager();
        $this->anneManager = new AnneeManager();
    }



    // affichage : page de profil
    public function afficherProfil()
    {
        $profil = $this->userManager->getInformationUser($_SESSION['email']);
        $data_page = [
            "page_titre"        => "Page de profil",
            "profil"            => $profil,
            "gradeSelect"       => $this->userManager->getGradeById($profil['grade_id']),
            "allGrade"          => $this->userManager->getGrade(),
            "view"              => "./views/utilisateur/profil.view.php",
            "template"          => "./views/commun/template.php",
            "page_javascript"   => ["public/js/profils.js"]
        ];
        $this->genererPage($data_page);
    }
    public function updateProfil(string $email, string $name_item, string $item)
    {
        $data_user = $this->userManager->getInformationUser($email);
        if($data_user[$name_item] == $item){
            Toolbox::ajouterMessageAlerte($name_item." est identique",Toolbox::COULEUR_ORANGE);
            render("user/profil","profil");
        }else{
            if($this->userManager->modificationItemBdd($name_item,$item,$email)){
                Toolbox::ajouterMessageAlerte("Modification pris en compte",Toolbox::COULEUR_VERTE);
                render("user/profil","profil");
            }else{
                Toolbox::ajouterMessageAlerte("Une erreur est survenu", Toolbox::COULEUR_ORANGE);
                render("user/profil","profil");
            }
        }
    }
    public function updateAvatarProfil(string $email, string $name_item,string $new_adresse, string $adresse_provisoire){
        $ancien_adresse = $this->userManager->getInformationUser($email)['avatar'];
        if($ancien_adresse != $new_adresse){
            if($this->userManager->modificationItemBdd($name_item,$new_adresse,$email)){
                move_uploaded_file($adresse_provisoire, $new_adresse);
                if(file_exists($ancien_adresse)){
                    unlink($ancien_adresse);
                }
                $_SESSION['avatar'] = $new_adresse;
                Toolbox::ajouterMessageAlerte("Modification pris en compte", Toolbox::COULEUR_VERTE);
                render("user/profil","profil");
            }else{
                Toolbox::ajouterMessageAlerte("Une erreur est survenu", Toolbox::COULEUR_ORANGE);
                render("user/profil","profil");
            }
        }else{
            Toolbox::ajouterMessageAlerte("Avatar existant",Toolbox::COULEUR_ORANGE);
            render("user/profil","profil");
        }
        
    }
    // affichage : page projet
    public function afficherProjet()
    {
        $data_page = [
            "nbrProjet"         => $this->projetManager->nbrProjetById($_SESSION['id']),
            "projets"           => $this->projetManager->getProjetById($_SESSION['id']),
            "page_titre"        => "Page de mes projets",
            "view"              => "./views/utilisateur/projet.view.php",
            "template"          => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficherAjoutProjet()
    {
        $data_page = [
            "page_titre"        => "Page d'ajout de projet",
            "view"              => "./views/utilisateur/addprojet.view.php",
            "template"          => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function ajouterProjet(array $array_projet)
    {
        if($this->projetManager->nbrProjetById($_SESSION['id']) < 3){
            if($this->projetManager->addProjet($array_projet ,$_SESSION['id'])){
                if($this->anneManager->addAnnee($array_projet['duree_projet'], $this->projetManager->getIdProjet($_SESSION['id'])[0]["MAX(id)"])){
                    Toolbox::ajouterMessageAlerte("Projet ajouté", Toolbox::COULEUR_VERTE);
                    render("user/projet", "projet");
                }else{
                    Toolbox::ajouterMessageAlerte("Erreur : lors de la création de l'année.", Toolbox::COULEUR_ORANGE);
                    render("user/projet/new", "projet");
                }
            }else{
                Toolbox::ajouterMessageAlerte("Erreur : lors de la création du profils.",Toolbox::COULEUR_ORANGE);
                render("user/projet/new","projet");
            }
        }else{
            Toolbox::ajouterMessageAlerte("Vous pouvez avoir un maximum de 3 projets",Toolbox::COULEUR_ORANGE);
            render("user/projet","projet");
        }
    }
    public function supprimerProjet(int $id)
    {
        if($this->projetManager->supprimerProjet($id) && $this->anneManager->deleteAnneeByIdProjet($id)){
            Toolbox::ajouterMessageAlerte("Projet suprimé",Toolbox::COULEUR_ORANGE);
            render('user/projet', "projet");
        }else{
            Toolbox::ajouterMessageAlerte("Une Erreur est survenu", Toolbox::COULEUR_ORANGE);
            render('user/projet', "projet");
        }
    }
    public function updateProjet(int $id, string $name_item, string $item)
    {
        $data = $this->projetManager->getProjetByIdProjet($id);
        $geter = "get".$name_item;
        if($data->$geter() == $item ){
            Toolbox::ajouterMessageAlerte("Déjà pris en compte",Toolbox::COULEUR_ORANGE);
            render("user/projet","projet");
        }else{
            if($this->projetManager->modificationProjetBdd($id,$name_item,$item)){
                Toolbox::ajouterMessageAlerte("Modification pris en compte",Toolbox::COULEUR_VERTE);
                render('user/projet',"projet");
            }
        }
    }
    public function afficherDetailProjet(int $id)
    {
        $projet = $this->projetManager->getProjetByIdProjet($id);
        $data_page = [
            "projet"            => $projet,
            "annees"            => $this->anneManager->getAnneeByIdProjet($id),
            "page_titre"        => $projet->getNom_projet(),
            "view"              => "./views/utilisateur/detailProjet.view.php",
            "template"          => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    // affichage page de connexion
    public function afficherConnexion()
    {
        $data_page = [
            "page_titre"        => "Page de connexion",
            "view"              => "./views/utilisateur/connexion.view.php",
            "template"          => "./views/commun/template.php",
            "page_javascript"   => ["public/js/connexion.js"]
        ];
        $this->genererPage($data_page);
    }
    public function goConnection(array $array)
    {

        if($this->userManager->verifCombinaison($array))
        {
            $utilisateurData = $this->userManager->getInformationUser($array['email']);
            $_SESSION['connect']        = 1;
            $_SESSION['messageConnect'] = 1;
            $_SESSION['email']          = $utilisateurData['email'];
            $_SESSION['name']           = $utilisateurData['name'];
            $_SESSION['surname']        = $utilisateurData['surname'];
            $_SESSION['admin']          = $utilisateurData['is_admin'];
            $_SESSION['avatar']         = $utilisateurData['avatar'];
            $_SESSION['id']             = $utilisateurData['id'];
            render("accueil","accueil");
        }else{
            Toolbox::ajouterMessageAlerte("Combinaison EMAIL/MDP fausse",Toolbox::COULEUR_ORANGE);
            render("connexion","connexion");
        }
    }
    public function goInscription(array $array)
    {
        if($this->userManager->emailDisponible($array['email'])){
            if($this->userManager->inscriptionUser($array)){
                $_SESSION['inscription'] = 1;
                render("inscription","inscription");
            }else{
                Toolbox::ajouterMessageAlerte("Une erreur est survenue", Toolbox::COULEUR_ORANGE);
                render('inscription',"inscription");
            }
        }else{
            Toolbox::ajouterMessageAlerte("Email déjà utilisé",Toolbox::COULEUR_ORANGE);
            render("inscription","inscription");
        }
    }

    // déconnecter 
    public function goDeconnexion()
    {
        $data_page = [
            "view"      => "./views/utilisateur/logout.php",
            "template"  => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    // affichage page d'erreur
    public function error_404(string $message_error)
    {
        $data_page = [
            "message_error" => $message_error,
            "view"          => "./views/utilisateur/pageNotFound.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
}