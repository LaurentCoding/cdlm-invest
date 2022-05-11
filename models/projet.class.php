<?php

class Projet{
    private $id;
    private $user_id;
    private $nom_projet;
    private $description_projet;
    private $investissement;
    private $duree;

    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    private function hydrate(array $data){
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }


    /**
     * Get the value of duree
     */ 
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set the value of duree
     *
     * @return  self
     */ 
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get the value of investissement
     */ 
    public function getInvestissement()
    {
        return $this->investissement;
    }

    /**
     * Set the value of investissement
     *
     * @return  self
     */ 
    public function setInvestissement($investissement)
    {
        $this->investissement = $investissement;

        return $this;
    }

    /**
     * Get the value of description_projet
     */ 
    public function getDescription_projet()
    {
        return $this->description_projet;
    }

    /**
     * Set the value of description_projet
     *
     * @return  self
     */ 
    public function setDescription_projet($description_projet)
    {
        $this->description_projet = $description_projet;

        return $this;
    }

    /**
     * Get the value of user_id
     */ 
    public function getUser_id()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @return  self
     */ 
    public function setUser_id($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of nom_projet
     */ 
    public function getNom_projet()
    {
        return $this->nom_projet;
    }

    /**
     * Set the value of nom_projet
     *
     * @return  self
     */ 
    public function setNom_projet($nom_projet)
    {
        $this->nom_projet = $nom_projet;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}