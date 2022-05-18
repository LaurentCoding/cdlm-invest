
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
}