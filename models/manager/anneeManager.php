<?php

require_once "./models/bdd.php";
require_once "./models/class/annee.class.php";

class AnneeManager extends Bdd{

    public function addAnnee(int $duree, string $id_projet){
        $annees = ['debut N','Fin N'];
        for($i = 1 ; $i < $duree ; $i ++){
            $annees[] = "N+".$i;
        }
        foreach($annees as $annee){
            $req = "INSERT INTO annee(`projet_id`,`name_annee`,`chiffre_affaire`,`achats_annuels`,`charges_structures`,`amortissements`,`augmentation_bfr`, `valeur_residuelle_nette_is`) VALUES (:projet_id , :name_annee, 0 , 0 , 0, 0 ,  0, 0)";
            $stmt = $this->getBdd()->prepare($req);
            $stmt->bindValue(":projet_id", $id_projet, PDO::PARAM_INT);
            $stmt->bindValue(":name_annee", $annee, PDO::PARAM_STR);
            $stmt->execute();
            $stmt->closeCursor();
        }
        return true;
    }

    public function getAnneeByIdProjet(int $id_projet){
        $dataAnnées = [];
        $req = "SELECT * FROM annee WHERE projet_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id",$id_projet,PDO::PARAM_STR);
        $stmt->execute();
        $dataAnnée = $stmt->fetchAll();
        $stmt->closeCursor();
        foreach($dataAnnée as $data){
            $datas = new Annee($data);
            $dataAnnées[] = $datas;
        }
        return $dataAnnées;
    }

    public function deleteAnneeByIdProjet(int $id_projet)
    {
        $req = "DELETE FROM annee WHERE projet_id = :projet_id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':projet_id', $id_projet, PDO::PARAM_INT);
        $stmt->execute();
        $estSupprimer = $stmt->rowCount() > 0;
        $stmt->closeCursor();
        return $estSupprimer; 
    }

}