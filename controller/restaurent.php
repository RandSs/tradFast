<?php



class Restaurent
{

    private $id_restaurent;
    public $nom;
    public $pseudo;
    public $adresse;
    public $code_postal;
    public $tel;
    public $email;
    public $mdp;
    public $image;
    public $id_cuisine;
    public $id_role;
    public $typeCuisine;
  



    /**
     * getters 
     */

     public function getIdRestaurent(): int 
     {
         return $this->id_restaurent;
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