
<?php

// appelle du usermanager
// require "./models/userManager.php";

class VisiteurController extends MainController
{
    private $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager;
    }

    // Affichage : page accueil
    public function afficherAccueil()
    {
        $data_page = [
            "page_titre"    => "Quel est votre probléme?",
            "view"          => "./views/visiteur/accueil.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    // affichage page d'inscription
    public function afficherInscription()
    {
        $data_page = [
            "profils"            => $this->userManager->getGrade(),
            "page_titre"        => "Page d'inscription",
            "view"              => "./views/visiteur/inscription.view.php",
            "template"          => "./views/commun/template.php",
            "page_javascript"   => ["public/js/inscription.js"]
        ];
        $this->genererPage($data_page);
    }

    public function AfficherQuiSommesNous(){
        $data_page = [
            "page_titre"    => "Page qui sommes-nous?",
            "view"          => "./views/visiteur/sommesNous.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function AfficherNosExpertises(){
        $data_page = [
            "page_titre"    => "Nos Expertises",
            "view"          => "./views/visiteur/expertise.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficherNosSolutions(){
        $data_page = [
            "page_titre"    => "Nos solutions",
            "view"          => "./views/visiteur/solution.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficherBlog(){
        $data_page = [
            "page_titre"    => "Super blog",
            "view"          => "./views/visiteur/blog.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function afficherContact(){
        $data_page = [
            "page_titre"    => "Contact",
            "view"          => "./views/visiteur/contact.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }

}