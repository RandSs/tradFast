<?php
namespace Ripository;

use App\Bdd;
use Entity\Restaurant;

require_once("entity/Restaurant.php");
require_once("entity/Plat.php");
require_once("entity/Menu.php");

class RestaurantRepository
{

     /* public function pagination()
    {
     $bdd = Bdd::getConnection();

     $page = (!empty($_GET['pL']) ? $_GET['pL'] : 1);
     $limite = 4;
     $debut = ($page - 1) * $limite;
    
     $nbRows = ('SELECT COUNT(id_restaurant) AS nb FROM restaurant');
     $nbRows= $bdd->query($nbRows);
     $result = $nbRows->execute();
     $resultNbRows =  $nbRows->fetchColumn();
     $nbDePage = ceil( $resultNbRows/ $limite);
    
      $query = ("SELECT * FROM restaurant LIMIT :limite  OFFSET :debut " );

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
          '<a class="btn btn-outline-success" href="index.php?page=restaurant&id_restaurant=' .$element["id_restaurant"] . '"
          role="button"  style="margin-bottom: 2rem;" >Voir restaurant</a>' .
          '</div></div>';
          
        }
     }
       */





     //Déclarer une fonction pour récupérer les champs de la table restauraurent. 
     //Et pour se connecter à la base de donnée c'est grace à la fonction static getConnection() dans la class Bdd.

     /* public function getrestaurants()
     {

          $bdd = Bdd::getConnection();

          $requete    = ('SELECT * FROM restaurant
                         INNER JOIN specialite
                         ON specialite.id_restaurant = restaurant.id_restaurant
                         INNER JOIN type_cuisine
                         ON type_cuisine.id_cuisine = specialite.id_cuisine
                         LIMIT 4');

          $restaurant = $bdd->prepare($requete);
          $restaurant->execute();
          $resultat = $restaurant->fetchAll();
          $bdd = null;

          return $resultat;
     }
*/

     /**
      *   Déclarer une fonction pour permetre à injecter les information à la base de donnés pour inscrir un restaurateur.
      *   Et pour se connecter à la base de donnée c'est grace à la fonction static getConnection() dans la class Bdd.
      *   @param object $valeur je le récupere apartir du controlleur  setInscription()
      */
     public function inscription(object $valeur): bool
     {
          $valeur = new Restaurant();
         
          // je me connect a la bdd. 
          $bdd = Bdd::getConnection();

          // requete pour remplir la table [restaurant] avec l'object $valeur. 
          $requete = "INSERT INTO restaurant(nom, pseudo, adresse, tel, 
                                            email, code_postal, mdp, image, id_role)
                                            VALUES (:nom, :pseudo, :adresse, 
                                            :tel, :email, :code_postal, :mdp, :image, :id_role)";

          $newrestaurant = $bdd->prepare($requete);
          $resultat = $newrestaurant->execute([

               ":nom" => $valeur->nom , ":pseudo" => $valeur->pseudo,
               ":adresse" => $valeur->adresse, ":tel" => $valeur->tel,
               ":email" => $valeur->email, ":code_postal" => $valeur->code_postal,
               ":mdp" => $valeur->mdp, ":image" => $valeur->image,
               "id_role" => $valeur->id_role
          ]);

          //je récupère le dernier ID_restaurant grace à la fontion PHP lastInsertId()
          //et je le stock dans la variable $last_id 
          $last_id = $bdd->lastInsertId();
          echo  "New record created successfully. Last inserted ID is: " . $last_id;
          // requete pour remplir la table [specialite] grace au $last_id && id_cuisine
          $requeteTypeCuisine = "INSERT INTO specialite(id_cuisine, id_restaurant)
                                 VALUES (:id_cuisine, :id_restaurant) ";

          $typeCuisine = $bdd->prepare($requeteTypeCuisine);
          $typeResultat =   $typeCuisine->execute([
               ":id_cuisine" => $valeur->id_cuisine,
               ":id_restaurant" => $last_id
          ]);

          //je coupe la connection de la bdd.
          $bdd = null;
          var_dump($typeResultat);
          return $typeResultat;
     }


     //déclarer une fonction pour se connecter a son compte.

     public function seConnecter($email)
     {
        
          $bdd = Bdd::getConnection();

          //requete pour récupérer les information d'une seule ligne de la table [restaurant]
          $requete = ("SELECT * FROM restaurant
                       INNER JOIN role 
                       ON restaurant.id_role = role.id_role
                       WHERE  restaurant.email =:email");

          $restau = $bdd->prepare($requete);
          $restau->execute([
               ":email" =>  $email->email
          ]);

          $resultatRestau = $restau->fetch();

          $bdd = null;
          echo $email->email . "   " . $email->mdp;
          return $resultatRestau;
     }

     /**
      * @param  $id_restaurant du restaurant que je veut récupérer.
      */
     public function getRestauCompte($id_restaurant)
     {
          $bdd = Bdd::getConnection();
          $requete = ("SELECT * From restaurant 
                       WHERE id_restaurant = :id_restaurant");

          $restauCompte = $bdd->prepare($requete);
          $restauCompte->execute([":id_restaurant" => $id_restaurant]);
          $restauCompteResultat = $restauCompte->fetch();
          $bdd = null;

          return    $restauCompteResultat;
     }


     /**
      * @param  $id_restaurant du restaurant que je veut récupérer.
      */
     public function fetchrestaurantData($id_restaurant)
     {

          $bdd = Bdd::getConnection();


          $requete = ("SELECT *  FROM restaurant 
                         LEFT JOIN menu ON restaurant.id_restaurant = menu.id_restaurant
                         LEFT JOIN plat ON plat.id_menu = menu.id_menu
                         INNER JOIN specialite ON restaurant.id_restaurant = specialite.id_restaurant 
                         LEFT JOIN type_cuisine ON specialite.id_cuisine = type_cuisine.id_cuisine 
                         INNER JOIN commander ON plat.id_plat = commander.id_plat 
                         INNER JOIN commande ON commander.id_commande = commande.id_commande 
                         INNER JOIN client ON client.id_client = commande.id_client
                         INNER JOIN role ON restaurant.id_role = role.id_role 
                         
                         WHERE restaurant.id_restaurant = :id_restaurant");

          $idR = [":id_restaurant" => $id_restaurant];

          $compteInfo = $bdd->prepare($requete);
          $compteInfo->execute([":id_restaurant" => $id_restaurant]);
          //$compteInfoResultat =  $compteInfo->fetchAll();
          $compteInfoResultat = $compteInfo->fetch();


          $commande = ("SELECT * FROM menu
                                INNER JOIN plat ON plat.id_menu = menu.id_menu 
                                WHERE menu.id_restaurant = :id_restaurant
                               ");
          $commandeInfos = $bdd->prepare($commande);
          $commandeInfos->execute([":id_restaurant" => $id_restaurant]);
          $resultaCommandeInfos =  $commandeInfos->fetchAll();

          $bdd = null;

          return $compteInfoResultat;
     }

     /**
      * @param  $id_restaurant du restaurant que je veut récupérer.
      */
     public function commandeInfos($id_restaurant)
     {
          $bdd = Bdd::getConnection();
          $commande = ("SELECT * FROM menu
          INNER JOIN plat ON plat.id_menu = menu.id_menu     
          INNER JOIN commander ON commander.id_plat = plat.id_plat
          INNER JOIN commande ON commande.id_commande = commander.id_commande
          INNER JOIN client ON commande.id_client = client.id_client
          INNER JOIN restaurant ON restaurant.id_restaurant = plat.id_restaurant
          WHERE menu.id_restaurant = :id_restaurant
          ");

          $commandeInfos = $bdd->prepare($commande);
          $commandeInfos->execute([":id_restaurant" => $id_restaurant]);
          $resultaCommandeInfos =  $commandeInfos->fetchAll();

          $bdd = null;

          return $resultaCommandeInfos;
     }
     /**
      * 
      */
     public function voirMenu($id_restaurant)
     {

          $bdd = Bdd::getConnection();

          $requete = "SELECT * FROM menu
                           INNER JOIN plat ON plat.id_menu = menu.id_menu     
                           INNER JOIN restaurant ON restaurant.id_restaurant = plat.id_restaurant
                           WHERE restaurant.id_restaurant = :id_restaurant";

          $requeteMenu = $bdd->prepare($requete);
          $requeteMenu->execute([":id_restaurant" => $id_restaurant]);

          $resultatMenu = $requeteMenu->fetchAll();

          $bdd = null;

          return $resultatMenu;
     }
     /**
      * @param $id = $_SESSION["id_restaurant"] pour pouvoir le rajouter dans 
      *le champ id_restaurant dans les deux table [menu] && [plat].
      */
     public function ajouterIdmenuEtUnPlat($id, $platInfos, $menuInfos )
     {
          var_dump( $menuInfos ). "</br>";
          var_dump($platInfos);
         
          $bdd = Bdd::getConnection();

          //requete pour ajouter un type de plat dans la table de menu..  

          $menuRequet = "INSERT INTO menu (typeDePlat, id_restaurant)
                         VALUES (:typeDePlat, :id_restaurant)";

          $newIdMenu = $bdd->prepare($menuRequet);

          $resultIdmenu = $newIdMenu->execute([
               ":typeDePlat" => $menuInfos->typeDePlat,
               ":id_restaurant" => $id
          ]);


          //récupérer le dernier id_menu insérer dans la table [menu]
          //grâce à la method PHP : lastInsertId() 
          //pour pouvoir l'utiliser just après comme clé étranger dans la table[plat]
          //pour ajouter un plat car chaque plat doit avoir un id_menu précis.
          $lastId_menu = $bdd->lastInsertId();
          echo  "New record created successfully. Last inserted ID is: " . $lastId_menu;

          //requete pour ajouter un plat dans la table [plat] après avoir 
          //récupérer le de dernier id_menu stocker dans la @var $lastId_menu 

          $requetePlat = "INSERT INTO plat (plat, ingredient, prix, id_menu, id_restaurant)
                          VALUES (:plat , :ingredient, :prix, :id_menu, :id_restaurant)";


          $newPlat = $bdd->prepare($requetePlat);
          $resultat =   $newPlat->execute([
               ":plat" => $platInfos->plat, ":ingredient" => $platInfos->ingredient,
               ":prix" => $platInfos->prix, ":id_menu" => $lastId_menu,
               ":id_restaurant" => $id
              
          ]);
     }
}
