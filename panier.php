<?php 

class Pannier
{
   public function __construct()
   {

  
         if(!isset($_SESSION))
         {
             session_start();
         }  

         if(!isset($_SESSION))
         {
             $_SESSION['panier']=array(); 
         }
   }


   public function query($requete , $data = array() )
   {
       $req = Bdd::getConnection()->prepare($requete);
       $req->execute($data);
       return $req->fetchAll(PDO::FETCH_OBJ);
   }

   


}