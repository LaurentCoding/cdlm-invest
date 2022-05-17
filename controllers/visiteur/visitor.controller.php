<?php
// mainController -> permet de générer les pages
require "./controllers/mainController.php";

 // Affichage : page qui sommes-nous
 public function quiSommesNous()
 {
     $nbrProjet = "";
     if(is_connected()){
         $nbrProjet = $this->projetManager->nbrProjetById($_SESSION['id']);
     }
     $data_page = [
         "nbrProjet"     => $nbrProjet,
         "page_titre"    => "Page qui sommes-nous?",
         "view"          => "./views/utilisateur/sommesNous.view.php",
         "template"      => "./views/commun/template.php"
     ];
     $this->genererPage($data_page);
 }