<?php

class AddPanier
{
    public $id_plat;

    public function ajouterAuPanier($id = null)
    {
    
    if(isset($_GET['id'])){
        $add = new Pannier();
        $platCommander = $add->query('SELECT id_plat FROM plat WHERE id_plat = :id_plat', array(':id_plat' => $_GET[$id]));
        var_dump($platCommander);
        
        include("view/voireRestaurant.php");
        if(empty($platCommander)){
            die("Ce plat n'existe pas!!");
        }
        $_SESSION;
   
     
    }else{
        die("Vous n'avais aucun plat dans votre panier! ");
    }

   include("view/voireRestaurant.php");
  
    }
}


