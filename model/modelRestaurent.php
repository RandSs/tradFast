<?php

include("controller/restaurent.php");
class RestaurentModel extends Restaurent
{

     
  //Déclarer une fonction pour récupérer les champs de la table restauraurent. 
  //Et pour se connecter à la base de donnée c'est grace à la fonction static getConnection() dans la class Bdd.
    
   public function getRestaurents()
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
// requete pour remplir la table [restaurent]. 
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
          //je récupère le dernier ID_restaurent grace à la fontion PHP lastInsertId()
          //et je le stock dans la variable $last_id 
                      $last_id = $bdd->lastInsertId();
                      echo  "New record created successfully. Last inserted ID is: " . $last_id;
        // requete pour remplir la table [specialite] grace au $last_id && id_cuisine
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
   // déclarer une fonction pour se connecter a son compte.
     public function seConnecter()
     {

          $bdd = Bdd::getConnection();

    //requete pour récupérer les information d'une seule ligne de la table [restaurent]
          $requete = ("SELECT * FROM restaurent
                       INNER JOIN role 
                       ON restaurent.id_role = role.id_role
                       WHERE  restaurent.email =:email");
                      
         $restau = $bdd->prepare($requete);
                    $restau->execute([
                           ":email"=> $this->email
                          ]);
        
         $resultatRestau = $restau->fetch();

         $bdd = null;

        return $resultatRestau;

     }
      

     /**
      * @param  $id_restaurent du restaurent que je veut récupérer.
      */
     public function getRestauCompte($id_restaurent)  
     {
         $bdd = Bdd::getConnection();
          $requete = ("SELECT * From restaurent 
                       WHERE id_restaurent = :id_restaurent");

          $restauCompte = $bdd->prepare($requete);
          $restauCompte->execute([":id_restaurent" => $id_restaurent]);
          $restauCompteResultat = $restauCompte->fetch();
          $bdd = null;

          return    $restauCompteResultat;

     }

     public function fetchRestaurentData($id_restaurent)
     {
   
      $bdd = Bdd::getConnection();

        
            $requete = ("SELECT * FROM restaurent 
            INNER JOIN role ON restaurent.id_role = role.id_role 
            INNER JOIN specialite ON restaurent.id_restaurent = specialite.id_restaurent 
            INNER JOIN type_cuisine ON specialite.id_cuisine = type_cuisine.id_cuisine 
            INNER JOIN menue ON restaurent.id_restaurent = menue.id_restaurent 
            INNER JOIN plat ON menue.id_menue = plat.id_menue 
            INNER JOIN commander ON plat.id_plat = commander.id_plat 
            INNER JOIN commande ON commander.id_commande = commande.id_commande 
            INNER JOIN client ON client.id_client = commande.id_client
            WHERE id_restaurent = :id_restaurent");
             
                      
      
                         $compteInfo = $bdd->prepare($requete);
                         $compteInfo->execute([":id_restaurent" => $id_restaurent]);
                         $compteInfoResultat =  $compteInfo->fetch();
         
            print_r(  $compteInfoResultat);

  
      $bdd = null;

      return $compteInfoResultat;
 
     }

}

