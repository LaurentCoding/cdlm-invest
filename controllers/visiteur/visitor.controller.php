
<?php
// mainController -> permet de générer les pages
require "./controllers/mainController.php";

class VisiteurController extends MainController{

    public function quiSommesNous(){
        $data_page = [
            "page_titre"    => "Page qui sommes-nous?",
            "view"          => "./views/utilisateur/sommesNous.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function nosExpertises(){
        $data_page = [
            "page_titre"    => "Nos Expertises",
            "view"          => "./views/utilisateur/expertise.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function nosSolution(){
        $data_page = [
            "page_titre"    => "Nos solutions",
            "view"          => "./views/utilisateur/solution.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function blog(){
        $data_page = [
            "page_titre"    => "Super blog",
            "view"          => "./views/utilisateur/blog.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }
    public function contact(){
        $data_page = [
            "page_titre"    => "Contact",
            "view"          => "./views/utilisateur/contact.view.php",
            "template"      => "./views/commun/template.php"
        ];
        $this->genererPage($data_page);
    }

}