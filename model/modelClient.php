<?php

include("users/client.php");

class ClientModel extends Client

{
    public function clientInscription()
    {
        $bdd = Bdd::getConnection();

        $requete = "INSERT INTO client(nom_client, prenom_client, 
                                     adresse, code_postal, client_email,
                                     tel, mdp_client, id_role)
                    VALUES (:nom_client, :prenom_client, :adresse, 
                            :code_postal, :client_email,
                            :tel,:mdp_client, :id_role)";

        $newClient = $bdd->prepare($requete);
        $resultat =  $newClient->execute([
                 ":nom_client"=> $this->nom_client,":prenom_client"=> $this->prenom_client,
                 ":adresse"=> $this->adresse, ":code_postal"=>$this->code_postal,
                 ":client_email"=>$this->client_email, ":tel"=>$this->tel, 
                 ":mdp_client" =>$this->mdp_client, ":id_role"=>$this->id_role
        ]);

        $bdd = null; 

        return $resultat;

    }

    public function requetePourMeConnecter()
    {
         $bdd = Bdd::getConnection();

         $requete = ("SELECT * FROM client
                      INNER JOIN role 
                      ON client.id_role = role.id_role
                      WHERE client.client_email = :client_email");

         $client = $bdd->prepare($requete);
         $client->execute([":client_email" => $this->client_email]);  
         
         $clientResultat = $client->fetch();

         $bdd = null;
  
         return $clientResultat;



    }


}