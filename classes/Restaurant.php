<?php
namespace restaurant;



class Restaurant 
{

 //restaurant

    public $id_restaurant;
    public $nom;
    public $pseudo;
    public $adresse;
    public $tel;
    public $email;
    public $code_postal;
    

    public $mdp;
    public $image; 
  
    //commande

   
    //commander
   // public $quantite;

//   public $id_plat;

   //plat

  // public $plat;
  // public $ingredient;
   //public $prix;

   //menu
  // public $id_menu;
   //public $typeDePlat;

   //role
   public $id_role;
   //public $role;
   
   //specialite
   public $id_cuisine;

   //type_cuisine
   //public $cuisine;

    /**
     * getters 
     */

     public function getIdrestaurant(): int 
     {
         return $this->id_restaurant;
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