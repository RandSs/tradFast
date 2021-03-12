<?php

include("controller/restaurent.php");
class RestaurentModel extends Restaurent
{


 

  //Déclarer une fonction pour récupérer les champs de la table restauraurent. 
  //Et pour se connecter à la base de donnée c'est grace à la fonction static getConnection() dans la class Bdd.
    
   public function getRestaurent()
   {

        $bdd = Bdd::getConnection();

        $requete    = ('SELECT * FROM restaurent
                        INNER JOIN specialite
                        ON specialite.id_restaurent = restaurent.id_restaurent
                        INNER JOIN type_cuisine
                        ON type_cuisine.id_cuisine = specialite.id_cuisine');

                $restaurent = $bdd->prepare($requete);
                $restaurent->execute();
                $resultat = $restaurent->fetchAll();
                $bdd = null;
         
                return $resultat;
               
    }

 //Déclarer une fonction pour permetre à injecter les information à la base de donnés pour inscrir un restaurateur.
//Et pour se connecter à la base de donnée c'est grace à la fonction static getConnection() dans la class Bdd.

    public function inscription()
    {
         $bdd = Bdd::getConnection();

         $requete = "INSERT INTO restaurent(nom, pseudo, adresse, tel, 
                                            email, code_postal, mdp, image,id_role)
                                            VALUES (:nom, :pseudo, :adresse, 
                                            :tel, :email, :code_postal, :mdp, :image, :id_role)";

         $newRestaurent = $bdd->prepare($requete);
         $resultat = $newRestaurent->execute([

                      ":nom"=>$this->nom,":pseudo"=>$this->pseudo,
                      ":adresse"=>$this->adresse,":tel"=>$this->tel,
                      ":email"=>$this->email,":code_postal"=>$this->code_postal,
                      ":mdp"=>$this->mdp,":image"=>$this->image,
                      "id_role"=>$this->id_role      
                      
                      ]);
          
                      $last_id = $bdd->lastInsertId();
                      echo  "New record created successfully. Last inserted ID is: " . $last_id;

         $requeteTypeCuisine = "INSERT INTO specialite(id_cuisine, id_restaurent)
                                VALUES (:id_cuisine, :id_restaurent) ";

         $typeCuisine = $bdd->prepare($requeteTypeCuisine);
         $typeResultat =   $typeCuisine->execute([

                            ":id_cuisine" => $this->id_cuisine,
                            ":id_restaurent"=>$last_id

         ]);

         $bdd = null;
      
        return $resultat;
      
    }
   


}

