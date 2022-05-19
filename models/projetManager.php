<?php

require_once "./models/projet.class.php";
require_once "./models/bdd.php";

class ProjetManager extends Bdd{
    
    public function addProjet(array $array ,int $id)
    {
        $req = "INSERT INTO projet(`user_id`, `nom_projet`, `description_projet`,`Investissement`, `duree`) VALUES (:email, :nom_projet, :description_projet, :invest_projet, :duree_projet)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':email', $id,PDO::PARAM_INT);
        $stmt->bindValue(':nom_projet', $array['nom_projet'], PDO::PARAM_STR);
        $stmt->bindValue(':description_projet', $array['description_projet'], PDO::PARAM_STR);
        $stmt->bindValue(':invest_projet',$array['invest_projet'],PDO::PARAM_STR);
        $stmt->bindValue(':duree_projet',$array['duree_projet'],PDO::PARAM_INT);
        $stmt->execute();
        $estAjouter = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estAjouter;
    }
    public function nbrProjetById(int $id){
        $req = "SELECT * FROM projet WHERE user_id = :user_id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_id", $id,PDO::PARAM_INT);
        $stmt->execute();
        $nbrProjet = $stmt->rowCount();
        $stmt->closeCursor();
        return $nbrProjet;
    }
    public function getProjetByIdProjet(int $id){
        $dataP = [];
        $req = "SELECT * FROM projet WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $data_projet = $stmt->fetchAll();
        $stmt->closeCursor();
        foreach($data_projet as $projet){
            $data = new Projet($projet);
            $dataP[] = $data;
        }
        return $data;
    }
    public function modificationProjetBdd(int $id, string $name_item, string $item)
    {
        $req = "UPDATE projet  SET " . $name_item . " = :item WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':item',$item,PDO::PARAM_STR);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->execute();
        $estModifer = $stmt->rowCount() > 0;
        $stmt->closeCursor();
        return $estModifer;
    }

    public function supprimerProjet(int $id)
    {
        $req = "DELETE FROM projet WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $estSupprimé = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estSupprimé;
    }

    public function getProjetById(int $user_id){
        $projets = [];
        $req = "SELECT * FROM projet WHERE user_id = :user_id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_id", $user_id,PDO::PARAM_INT);
        $stmt->execute();
        $datas = $stmt->fetchAll();
        $stmt->closeCursor();
        foreach($datas as $data){
            $projet = new Projet($data);
            $projets[] = $projet;
        }
        return $projets;
    }

    public function getNbrProjetTotal(){
        $req = "SELECT * FROM projet";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $nbrProjetsTotal = $stmt->rowCount();
        $stmt->closeCursor();
        return $nbrProjetsTotal;
    }

    public function getAllProjet(){
        $allProjets = [];
        $req = "SELECT * FROM projet";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $datas = $stmt->closeCursor();
        $stmt->closeCursor();
        foreach ($datas as $data) {
            $projet = new Projet($data);
            $allProjets[] = $projet;
        }
        return $allProjets;
    }

    public function getIdProjet(int $user_id){
        $req = "SELECT MAX(id) FROM projet WHERE user_id = :user_id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":user_id",$user_id,PDO::PARAM_INT);
        $stmt->execute();
        $id_projet = $stmt->fetchAll();
        $stmt->closeCursor();
        return $id_projet;
    }
}