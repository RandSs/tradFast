<?php
namespace Entity;
use Entity\Restaurant;

class Commande
{
    public $id_commande;
    public $date_de_commande;

    public $date_de_livraison;
     
    public function __construct()
    {
   
      if(!isset($_SESSION['id_client'])){
       echo "vous ete pas connecter !";
    
      }

     if(!isset($_SESSION["panier"])){
       $_SESSION["panier"] = [];
      }
      
      
    }

   
    public function  add($id_plat)
    {
          $_SESSION['panier'][$id_plat] = 1;
     
    }
  
  
   
}