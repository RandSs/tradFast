<?php



class Restaurent
{
    private $idRestaurent;
    public $nom;
    public $pseudo;
    public $adresse;
    public $codePostal;
    public $tel;
    public $email;
    public $mdp;
    public $image;
    public $typeCuisine;
  



    /**
     * getters 
     */

     public function getIdRestaurnet(): int 
     {
         return $this->idRestaurent;
     }
     public function getNom(): string
     {
         return $this->nom;
     }
     public function getPseudo(): string
     {
         return $this->pseudo;
     }
     public function getAdresse(): string
     {
         return $this->adresse;
     }
     public function getCodePostal(): string
     {
         return $this->codePostal;
     }
     public function getTel(): string
     {
         return $this->tel;
     }
     public function getEmail(): string
     {
         return $this->email;
     }
     public function getMdp(): string
     {
         return $this->mdp;
     }
     public function getImage(): string
     {
         return $this->image;
     }

     public function getTypeCuisine(): string
     {
         return $this->typeCuisine;
     }



}