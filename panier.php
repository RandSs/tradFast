<?php
session_start();

class Panier
{
  
    public function panier()
    {

        $id = $_GET['id_plat'];
        $qte = $_GET['qte'];

         $_SESSION['id_client'][$id] = $qte;
       
       //echo json_decode($_SESSION['id_client']);
        //include('view/clientCompte.php');
     
    }

    
    
    
}

