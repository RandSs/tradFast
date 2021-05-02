<?php
use tradFast\Bdd;

include("entities/Client.php");
require_once("entities/Restaurant.php");

class ClientModel 

{
    public function clientInscription($clientInfos)
    {

        var_dump($clientInfos);
      
        $bdd = Bdd::getConnection();

        $requete = "INSERT INTO client(nom_client, prenom_client, 
                                     adresse, code_postal, client_email,
                                     tel, mdp_client, id_role)
                    VALUES (:nom_client, :prenom_client, :adresse, 
                            :code_postal, :client_email,
                            :tel,:mdp_client, :id_role)";

        $newClient = $bdd->prepare($requete);
        $resultat =  $newClient->execute([
                 ":nom_client"=>  $clientInfos->nom_client,":prenom_client"=>  $clientInfos->prenom_client,
                 ":adresse"=>  $clientInfos->adresse, ":code_postal"=> $clientInfos->code_postal,
                 ":client_email"=> $clientInfos->client_email, ":tel"=> $clientInfos->tel, 
                 ":mdp_client" => $clientInfos->mdp_client, ":id_role"=> $clientInfos->id_role
        ]);

        $bdd = null; 

        return $resultat;

    }

    public function requetePourMeConnecter($email)
    {

       var_dump($email);
         $bdd = Bdd::getConnection();

         $requete = ("SELECT * FROM client
                      INNER JOIN role 
                      ON client.id_role = role.id_role
                      WHERE client.client_email = :client_email");

         $client = $bdd->prepare($requete);
         $client->execute([":client_email" => $email->client_email]);  
         
         $clientResultat = $client->fetch();

         $bdd = null;
  
         return $clientResultat;



    }


}