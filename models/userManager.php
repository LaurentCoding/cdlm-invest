<?php

// appelle de la base de données
require_once "./models/bdd.php";

// class usermanager
class UserManager extends Bdd{

    public function emailDisponible(string $email)
    {
        $utilisateurEmail = $this->getInformationUser($email);
        return empty($utilisateurEmail);
    }

    public function verifCombinaison(array $array)
    {
        $passwordBdByEmail = $this->getInformationUser($array['email'])['password'];
        return $passwordBdByEmail === $array['password'];
    }

    public function getInformationUser(string $email)
    {
        $req    = "SELECT * FROM user WHERE email = :email";
        $stmt   = $this->getBdd()->prepare($req);
        $stmt->bindValue(':email',$email,PDO::PARAM_STR);
        $stmt->execute();
        $resultat = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $resultat;
    }


    public function modificationItemBdd(string $name_item,string $item,string $email)
    {
        $req = "UPDATE user SET " . $name_item . " = :item WHERE email = :email";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':item', $item, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        $estModifier = ($stmt->rowCount() > 0);
        $stmt->closeCursor();
        return $estModifier;
    }

    public function inscriptionUser(array $array)
    {
        $req = "INSERT INTO user(`surname`, `name`, `email`,`company`,`is_admin`, `password`,  `avatar`, `profil_id`) VALUES (:surname , :name, :email, :company, 0, :password, :avatar, :profil_id)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":surname",$array['prenom'],PDO::PARAM_STR);
        $stmt->bindValue(":name",$array['nom'],PDO::PARAM_STR);
        $stmt->bindValue(':email', $array['email'],PDO::PARAM_STR);
        $stmt->bindValue(':company',"none",PDO::PARAM_STR);
        $stmt->bindValue(':password',$array['password'], PDO::PARAM_STR);
        $stmt->bindValue(':avatar', "none",PDO::PARAM_STR);
        $stmt->bindValue(":profil_id", $array['profil'],PDO::PARAM_INT);
        $stmt->execute();
        $estAjouter = $stmt->rowCount() > 0 ;
        $stmt->closeCursor();
        return $estAjouter;
    }
    public function getNbrUser(){
        $req = "SELECT * FROM user";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $nbrUser = $stmt->rowCount();
        $stmt->closeCursor();
        return $nbrUser;
    }
    public function getGradeById(int $id)
    {
        $req = "SELECT * FROM grade WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id',$id,PDO::PARAM_INT);
        $stmt->execute();
        $profil = $stmt->fetchAll();
        $stmt->closeCursor();
        return $profil;
    }
    public function getGrade(){
        $req = "SELECT * FROM grade";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $dataProfil = $stmt->fetchAll();
        $stmt->closeCursor();
        return $dataProfil;
    }

}