<?php

include("controller/restaurent.php");

class RestaurentModel extends Restaurent
{

     /* public function pagination()
    {
     $bdd = Bdd::getConnection();

     $page = (!empty($_GET['pL']) ? $_GET['pL'] : 1);
     $limite = 4;
     $debut = ($page - 1) * $limite;
    
     $nbRows = ('SELECT COUNT(id_restaurent) AS nb FROM restaurent');
     $nbRows= $bdd->query($nbRows);
     $result = $nbRows->execute();
     $resultNbRows =  $nbRows->fetchColumn();
     $nbDePage = ceil( $resultNbRows/ $limite);
    
      $query = ("SELECT * FROM restaurent LIMIT :limite  OFFSET :debut " );

      $query= $bdd->prepare($query);
      $query->bindValue('limite', $limite, PDO::PARAM_INT);
      $query->bindValue('debut', $debut, PDO::PARAM_INT);
   
      $resultat =  $query->execute();

     
      '<div class="container" >
        <div class="card-deck" style="margin-top: 1rem; ">';
        

        while ( $element = $query->fetch()) {
          echo
          '<div class="card " style="min-width: 14rem;   margin-top: 1rem; margin-bottom:5rem;">' .
          '<img class="card-img-top" src="' . $element["image"] . '"  alt="Card image cap">' .
          '<div class="card-body" >' .
          '<h5 class="card-title">' . strtoupper($element["nom"]) . " " .  strtoupper($element["pseudo"]) . '</h5>'.
          '<p class="card-text" style="color:green;"><b>Type de cuisine:' . $element["cuisine"] . '</b></p>'.
          '<p class=""><small class="text-muted"></small></p>' .
          '<a class="btn btn-outline-success" href="index.php?page=restaurant&id_restaurent=' .$element["id_restaurent"] . '"
          role="button"  style="margin-bottom: 2rem;" >Voir restaurant</a>' .
          '</div></div>';
          
        }
     }
       */





     //Déclarer une fonction pour récupérer les champs de la table restauraurent. 
     //Et pour se connecter à la base de donnée c'est grace à la fonction static getConnection() dans la class Bdd.

    /* public function getRestaurents()
     {

          $bdd = Bdd::getConnection();

          $requete    = ('SELECT * FROM restaurent
                         INNER JOIN specialite
                         ON specialite.id_restaurent = restaurent.id_restaurent
                         INNER JOIN type_cuisine
                         ON type_cuisine.id_cuisine = specialite.id_cuisine
                         LIMIT 4');

          $restaurent = $bdd->prepare($requete);
          $restaurent->execute();
          $resultat = $restaurent->fetchAll();
          $bdd = null;

          return $resultat;
     }
*/

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

               ":nom" => $this->nom, ":pseudo" => $this->pseudo,
               ":adresse" => $this->adresse, ":tel" => $this->tel,
               ":email" => $this->email, ":code_postal" => $this->code_postal,
               ":mdp" => $this->mdp, ":image" => $this->image,
               "id_role" => $this->id_role

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
               ":id_restaurent" => $last_id

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
               ":email" => $this->email
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


      /**
      * @param  $id_restaurent du restaurent que je veut récupérer.
      */
     public function fetchRestaurentData($id_restaurent)
     {

          $bdd = Bdd::getConnection();


          $requete = ("SELECT *  FROM restaurent 
                         LEFT JOIN menue ON restaurent.id_restaurent = menue.id_restaurent
                         LEFT JOIN plat ON plat.id_menue = menue.id_menue
                         INNER JOIN specialite ON restaurent.id_restaurent = specialite.id_restaurent 
                         LEFT JOIN type_cuisine ON specialite.id_cuisine = type_cuisine.id_cuisine 
                         INNER JOIN commander ON plat.id_plat = commander.id_plat 
                         INNER JOIN commande ON commander.id_commande = commande.id_commande 
                         INNER JOIN client ON client.id_client = commande.id_client
                         INNER JOIN role ON restaurent.id_role = role.id_role 
                         
                         WHERE restaurent.id_restaurent = :id_restaurent");

          $idR = [":id_restaurent" => $id_restaurent];

          $compteInfo = $bdd->prepare($requete);
          $compteInfo->execute([":id_restaurent" => $id_restaurent]);
          //$compteInfoResultat =  $compteInfo->fetchAll();
          $compteInfoResultat = $compteInfo->fetch();


          $commande = ("SELECT * FROM menue
                                INNER JOIN plat ON plat.id_menue = menue.id_menue 
                                WHERE menue.id_restaurent = :id_restaurent
                               ");
          $commandeInfos = $bdd->prepare($commande);
          $commandeInfos->execute([":id_restaurent" => $id_restaurent]);
          $resultaCommandeInfos =  $commandeInfos->fetchAll();

          $bdd = null;

          return $compteInfoResultat;
     }

     /**
      * @param  $id_restaurent du restaurent que je veut récupérer.
      */
     public function commandeInfos($id_restaurent)
     {
          $bdd = Bdd::getConnection();
          $commande = ("SELECT * FROM menue
          INNER JOIN plat ON plat.id_menue = menue.id_menue      
          INNER JOIN commander ON commander.id_plat = plat.id_plat
          INNER JOIN commande ON commande.id_commande = commander.id_commande
          INNER JOIN client ON commande.id_client = client.id_client
          WHERE menue.id_restaurent = :id_restaurent
          ");

          $commandeInfos = $bdd->prepare($commande);
          $commandeInfos->execute([":id_restaurent" => $id_restaurent]);
          $resultaCommandeInfos =  $commandeInfos->fetchAll();

          $bdd = null;

        return $resultaCommandeInfos;
     }

     /**
      * @param $id = $_SESSION["id_restaurent"] pour pouvoir le rajouter dans 
      *le champ id_restaurent dans les deux table [menue] && [plat].
      */
     public function ajouterIdMenueEtUnPlat($id)
     {

          $bdd = Bdd::getConnection();

          //requete pour ajouter un type de plat dans la table de menue..  

          $menuRequet = "INSERT INTO menue (typeDePlat, id_restaurent)
                         VALUES (:typeDePlat, :id_restaurent)";

          $newIdMenu = $bdd->prepare($menuRequet);

          $resultIdMenue = $newIdMenu->execute([
               ":typeDePlat" => $this->typeDePlat,
               ":id_restaurent" => $id
          ]);


          //récupérer le dernier id_menue insérer dans la table [menue]
          //grâce à la method PHP : lastInsertId() 
          //pour pouvoir l'utiliser just après comme clé étranger dans la table[plat]
          //pour ajouter un plat car chaque plat doit avoir un id_menue précis.
          $lastId_menue = $bdd->lastInsertId();
          echo  "New record created successfully. Last inserted ID is: " . $lastId_menue;

          //requete pour ajouter un plat dans la table [plat] après avoir 
          //récupérer le de dernier id_menue stocker dans la @var $lastId_menue 

          $requetePlat = "INSERT INTO plat (plat, ingredient, prix, id_menue, id_restaurent)
                          VALUES (:plat , :ingredient, :prix, :id_menue, :id_restaurent)";


          $newPlat = $bdd->prepare($requetePlat);
          $resultat =   $newPlat->execute([
               ":plat" => $this->plat, ":ingredient" => $this->ingredient,
               ":prix" => $this->prix, ":id_menue" => $lastId_menue,
               ":id_restaurent" => $id
          ]);
     }
}
