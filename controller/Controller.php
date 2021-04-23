<?php

class Controller 
{
   public function signIn()
   {
       if($_SESSION){
           echo "<center><h1 class='alert alert-danger' >vous ete deja connecter</h1></center>";
        } else{

            var_dump($_SESSION);
            include("view/signIn.php");
        }    
     

  }
         
       
 
    public function signOut()
    {

        if($_SESSION == true ){

           include("view/viewAccueil.php");
            session_destroy();

            
          }
       
    }




}