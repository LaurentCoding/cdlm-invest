<?php

class Annee{
    private $projet_id;
    private $name_annee;
    private $chiffre_affaire;
    private $achats_annuels;
    private $charges_structures;
    private $amortissements;
    private $augmentation_bfr;
    private $valeur_residuelle_nette_is;


    public function __construct(array $data)
    {
        $this->hydrate($data);
    }

    private function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Get the value of valeur_residuelle_nette_is
     */ 
    public function getValeur_residuelle_nette_is()
    {
        return $this->valeur_residuelle_nette_is;
    }

    /**
     * Set the value of valeur_residuelle_nette_is
     *
     * @return  self
     */ 
    public function setValeur_residuelle_nette_is($valeur_residuelle_nette_is)
    {
        $this->valeur_residuelle_nette_is = $valeur_residuelle_nette_is;

        return $this;
    }

    /**
     * Get the value of augmentation_bfr
     */ 
    public function getAugmentation_bfr()
    {
        return $this->augmentation_bfr;
    }

    /**
     * Set the value of augmentation_bfr
     *
     * @return  self
     */ 
    public function setAugmentation_bfr($augmentation_bfr)
    {
        $this->augmentation_bfr = $augmentation_bfr;

        return $this;
    }

    /**
     * Get the value of amortissements
     */ 
    public function getAmortissements()
    {
        return $this->amortissements;
    }

    /**
     * Set the value of amortissements
     *
     * @return  self
     */ 
    public function setAmortissements($amortissements)
    {
        $this->amortissements = $amortissements;

        return $this;
    }

    /**
     * Get the value of charges_structures
     */ 
    public function getCharges_structures()
    {
        return $this->charges_structures;
    }

    /**
     * Set the value of charges_structures
     *
     * @return  self
     */ 
    public function setCharges_structures($charges_structures)
    {
        $this->charges_structures = $charges_structures;

        return $this;
    }

    /**
     * Get the value of chiffre_affaire
     */ 
    public function getChiffre_affaire()
    {
        return $this->chiffre_affaire;
    }

    /**
     * Set the value of chiffre_affaire
     *
     * @return  self
     */ 
    public function setChiffre_affaire($chiffre_affaire)
    {
        $this->chiffre_affaire = $chiffre_affaire;

        return $this;
    }

    /**
     * Get the value of achats_annuels
     */ 
    public function getAchats_annuels()
    {
        return $this->achats_annuels;
    }

    /**
     * Set the value of achats_annuels
     *
     * @return  self
     */ 
    public function setAchats_annuels($achats_annuels)
    {
        $this->achats_annuels = $achats_annuels;

        return $this;
    }

    /**
     * Get the value of projet_id
     */ 
    public function getProjet_id()
    {
        return $this->projet_id;
    }

    /**
     * Set the value of projet_id
     *
     * @return  self
     */ 
    public function setProjet_id($projet_id)
    {
        $this->projet_id = $projet_id;

        return $this;
    }

    /**
     * Get the value of name_annee
     */ 
    public function getName_annee()
    {
        return $this->name_annee;
    }

    /**
     * Set the value of name_annee
     *
     * @return  self
     */ 
    public function setName_annee($name_annee)
    {
        $this->name_annee = $name_annee;

        return $this;
    }
}