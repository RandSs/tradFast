<?php

class Controller 
{
       public function signIn(){

        if($_SESSION){
            echo "<center><h1 class='alert alert-danger' >vous ete deja connecter</h1></center>";
         
        } else{
 
           include("view/signIn.php");
         }    

       }

   public function restaurantSignIn()
   {
       if($_SESSION){
        echo"<script>
        location.href = 'index.php?page=restaurantCompte'
        </script>";

        } else{

           
        }    
     

  }
  public function clientSignIn()
   {
       if($_SESSION){
        echo"<script>
        location.href = 'index.php?page=".$_SESSION['nom_client']."'
        </script>";

        } else{

           
        }    
     

  }
         
    public function signOut()
    {

        if($_SESSION == true ){

            echo"<script>
            location.href = 'index.php?page=accueil'
            </script>";

            session_destroy();
           
          }
     
    }




}