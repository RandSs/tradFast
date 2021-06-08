<?php

namespace Ripository;

use App\Bdd;
use PDO;

use Entity\Commande;
use Entity\Restaurant;
use Entity\Client;
use Entity\Plat;

class CommandeRepository
{
      /**
       * fonction pour selectioner un plat choisi par un client.
       *  @param int $id_plat  qui va etre choisi par un client.
       *  @return {object} 
       */

      public function recupererPlat($id_plat)
      {
            // fetchAll(PDO::FETCH_OBJ) sa nous envoie de l'objet

            $bdd = Bdd::getConnection();

            $requete = 'SELECT * FROM plat
                       INNER JOIN restaurant ON plat.id_restaurant = restaurant.id_restaurant
                       WHERE id_plat = :id_plat';
            $prepareRequete = $bdd->prepare($requete);
            $prepareRequete->execute([":id_plat" => $id_plat]);

            $resultat =   $prepareRequete->fetchAll(PDO::FETCH_OBJ);

            $bdd = null;

            return $resultat;
      }


      /**
       * inseret la commande passer par un client into bdd.
       */
      public function injectCommande()
      {

            $bdd = Bdd::getConnection();

            $infosCommande = new Commande();
            $infosClient   = new Client();
            $infosRestau   = new restaurant();
            $infosPlat     = new Plat();


            $date_de_commande = $infosCommande->date_de_commande;
            $date_de_livraison = $infosCommande->date_de_livraison;
            $id_client = $infosClient->id_client;
            $id_restaurant = $infosRestau->id_restaurant;
            $id_plat = $infosPlat->id_plat;
            $quantite = $infosRestau->quantite;


            if (isset($_POST["commandePla[]"])) {


                  $requete = 'INSERT INTO commande(date_de_commande, date_de_livraison, id_client, id_restaurant)
                     VALUES :date_de_commande, :date_de_livraison, 
                            :id_client, :id_restaurant';

                  $commande = $bdd->prepare($requete);
                  $inserCommande =  $commande->execute([
                        ":date_de_commnde" => $date_de_commande,
                        ":date_de_livraison" => $date_de_livraison,
                        ":id_client" => $id_client,
                        ":id_restaurant" =>  $id_restaurant
                  ]);

                  $lastIdCommande = $bdd->lastInsertId();


                  $requeteCommander = 'INSERT INTO commander(id_commande, id_plat, quantite)
                                VALUES :id_commande, :id_plat, :quantite';

                  $quantitPlat = $bdd->prepare($requeteCommander);
                  $inserQuantite =  $quantitPlat->execute([

                        ":id_commande" => $lastIdCommande,
                        ":id_plat" => $id_plat,
                        ":quantite" => $quantite

                  ]);
            }

            return $inserQuantite;
      }



      public function panier($commande, $id_plat, $quantite)
      {
            $bdd = Bdd::getConnection();
            //var_dump($id_plat);

            $champs = implode(", ", array_keys($commande));
            $insertSql =  '\'' . implode('\', \'',   $commande) . '\'';

            if (!empty($commande)) {
                  //else je fait l'inseration dabore dans la table commande
                  $query = " INSERT INTO commande($champs)
                  VALUES ($insertSql) ";

                  $rest = $bdd->prepare($query);
                  $resultat =  $rest->execute();

                  // je déclare @var  $lastCommandeId comme array[]
                  //pour stocker le dernier id qui été créer dans la table commande 
                  //pour que je l'utilise pour inserer la deuxiem partie de la commande 
                  //dans la table commander.
                  $lastCommandeId = array();
                  //j'utilise la methode array_push pour stocker le dernier id_commande.
                  array_push($lastCommandeId, $bdd->lastInsertId());
                  $arrayCommander                = array();

                  $arrayCommander["id_commande"] = $lastCommandeId;
                  $arrayCommander["id_plat"]     = $id_plat;
                  $arrayCommander["quantite"]    = $quantite;


                  //je fait un if statement pour voir si le count de 
                  // deux @var $id_plat === $lastCommandeId 
                  //pour avoir le meme count dans chaque array sinon 
                  // je peut pas inserer les données.
            }


            if (count($id_plat) === count($lastCommandeId)) {
                  //je fait rien.
            } else {
                  // je lence une do while statement
                  do {
                        // j'utilse array_push pour remplir @var $lastCommandeId 
                        //avec la meme valeur $lastCommandeId[0].
                        array_push($lastCommandeId, $lastCommandeId[0]);
                  }
                  // la condition 
                  while (count($lastCommandeId) < count($id_plat));
            }
            //je utilise la fonction implode pour transformer la contenue de la @var $arrayCommande
            // de type array pour que j'obtien a la sortie un string on lui passon le premier argument de séparation
            //"la vergule" et sa permis de guarder le meme order.  
            // je test si l'inseration dans la table commande, si c'est true
            //je contenue le processe de l'inseration de la deuxiem partie.
            if ($resultat === true) {
                  //je déclare @var $arrayCommander une array.
                  //pour stocker les données que je vais avoir besoin.

                  $colonnes = implode(", ", array_keys($arrayCommander));

                  //je déclare @var $count pour stocker le count($lastCommandeId).
                  $count =  count($lastCommandeId);


                  //je déclare for statement pour looper chaque row 
                  //pour pouvoir les inserer les une  après l'autre.
                  for ($i = 0; $i < $count; $i++) {

                        // sql query ou j'utilise l'implode pour les colonnes
                        //et j'append les values de chaque row  avec le  .=  

                        $queryCommander = " INSERT INTO commander($colonnes)
                                 VALUES ('";
                        $queryCommander .= $lastCommandeId[$i] . "', '";
                        $queryCommander .= $id_plat[$i] . "', '";
                        $queryCommander .= $quantite[$i] . "') ";

                        $prepareRequete = $bdd->prepare($queryCommander);
                        $resultatRequete =  $prepareRequete->execute();
                       
                  }
            }
            
            return $resultatRequete; 
      }
}
