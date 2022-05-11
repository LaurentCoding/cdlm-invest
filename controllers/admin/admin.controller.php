<?php
// mainController -> permet de générer les pages
require_once "./controllers/mainController.php";
// -----------------------------------------------------
require_once "./models/projetManager.php";
require_once "./models/userManager.php";

// class administrateur
class AdministrateurController extends MainController
{

    private $UserManager;
    private $projetManager;

    

    public function __construct()
    {
        $this->projetManager = new ProjetManager();
        $this->UserManager = new UserManager();
    }

    public function afficherGestion(){
        $data_page = [
            "nbrUser"           => $this->UserManager->getNbrUser(),
            "nbrProjet"         => $this->projetManager->getNbrProjetTotal(),
            "page_titre"        => "Page de gestion administrateur",
            "view"              => "./views/admin/adminDash.view.php",
            "template"          => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }

}
