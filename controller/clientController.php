<?php

include("model/modelClient.php");

class ClientController  extends ClientModel
{
   


  public function inscriptionControllerClient()
  {
      $this->nom_client = $_POST["nom_client"];
      $this->prenom_client = $_POST["prenom_client"];
      $this->adresse = $_POST["adresse"];
      $this->code_postal = $_POST["code_postal"];
      $this->client_email = $_POST["client_email"];
      $this->mdp_client = $_POST["mdp_client"];
      $this->tel = $_POST["tel"];
      $this->id_role = $_POST["id_role"];

      if(isset($_POST["client_email"]) && isset($_POST["nom_client"]))
      {

        $message = "votre inscription n'est pas prise en compte!"; 

          if(!$this->client_email)
          {
           echo   "Merci de rentrer votre email!";
          }
      }

      if($this->client_email && $this->prenom_client)
      {
          $this->mdp_client  = password_hash($_POST["mdp_client"], PASSWORD_DEFAULT);

          if($this->clientInscription())
          {
              
            echo $message = "<center class='alert alert-info>Inscription est pris en compte </center>";

           
          
         } else {
             include("view/inscriptionClient.php");
         }


      }
     include("view/inscriptionClient.php");

    }

    public function jeMeConnect()
    {
        if(isset($_POST["client_email"]) && isset($_POST["mdp_client"]))
        {
            $this->client_email = ($_POST["client_email"]);
            $client = $this->requetePourMeConnecter();
       
        if(password_verify($_POST["mdp_client"], $client["mdp_client"]))
        {
            $_SESSION["id_client"] = $client["id_client"];
            $_SESSION["nom_client"] =  $client["nom_client"];
            $_SESSION["prenom_client"] =  $client["prenom_client"];
            $_SESSION["id_role"] = $client["id_role"];
            $_SESSION["role"] = $client["role"];

            var_dump(  $client);

            header('Location: index.php?page=accueil');

        } else {
         echo $message = "<center class='alert alert-danger'>Email ou mot de passe incorrect </center>";

        }
       }
       include("view/viewSignInClient.php");
    
    }





  
}