<?php
use Ripository\ClientRepository;
use Entity\Client;

include("model/ClientRepository.php");

class ClientController extends Controller
{
   
  public function inscriptionControllerClient()
  {
    $clientProperties = new Client();
     
    $clientProperties->nom_client = $_POST["nom_client"];
    $clientProperties->prenom_client = $_POST["prenom_client"];
    $clientProperties->adresse = $_POST["adresse"];
    $clientProperties->code_postal = $_POST["code_postal"];
    $clientProperties->client_email = $_POST["client_email"];
    $clientProperties->mdp_client = $_POST["mdp_client"];
    $clientProperties->tel = $_POST["tel"];
    $clientProperties->id_role = $_POST["id_role"];

      if(isset($_POST["client_email"]) && isset($_POST["nom_client"]))
      {

        $message = "votre inscription na pas été prise en compte!"; 

          if(!$clientProperties->client_email)
          {
           echo   "Merci de rentrer votre email!";
          }
      }

      if($clientProperties->client_email && $clientProperties->prenom_client)
      {
        $clientProperties->mdp_client  = password_hash($_POST["mdp_client"], PASSWORD_DEFAULT);
          $inscription = new ClientRepository();
          if($inscription->clientInscription($clientProperties))
          {  
            echo $message = "<center class='alert alert-info>Inscription est pris en compte </center>";

          } else {
            // include("view/inscriptionClient.php");
          }

      }

     include("view/clientView/inscriptionClient.php");

    }

    public function jeMeConnect()
    {
        $clientProperties = new Client();
        $connection = new ClientRepository();
     
        if(isset($_POST["client_email"]) && isset($_POST["mdp_client"]))
        {
            $clientProperties->client_email = ($_POST["client_email"]);
            $client =  $connection->requetePourMeConnecter($clientProperties);

            var_dump($_POST["mdp_client"]) ; var_dump( $client["mdp_client"]);
        if(password_verify($_POST["mdp_client"], $client["mdp_client"]))
        {
            $_SESSION["id_client"] = $client["id_client"];
            $_SESSION["nom_client"] =  $client["nom_client"];
            $_SESSION["prenom_client"] =  $client["prenom_client"];
            $_SESSION["id_role"] = $client["id_role"];
            $_SESSION["role"] = $client["role"];

            $this->clientSignIn();

        } else {
         echo $message = "<center class='alert alert-danger'>Email ou mot de passe incorrect </center>";
         include("view/clientView/viewSignInClient.php");
        }

       }else{
        include("view/clientView/viewSignInClient.php");
       }
       
    }
  
  
}