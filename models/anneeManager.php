<?php

require_once "./models/bdd.php";


class AnneeManager extends Bdd{

    public function addAnnee(int $duree, string $id_projet){
        $_SESSION['Je suis un message'] = $duree." | ".$id_projet;
    }

}