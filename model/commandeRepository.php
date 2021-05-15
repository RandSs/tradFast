<?php
use App\Bdd;

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
            // fetchAll(PDO::FETCH_OBJ)

            $bdd = Bdd::getConnection();

           $requete = 'SELECT * FROM plat
                       INNER JOIN restaurant ON plat.id_restaurant = restaurant.id_restaurant
                       WHERE id_plat = :id_plat';
           $prepareRequete = $bdd->prepare($requete);
           $prepareRequete->execute([":id_plat" => $id_plat ]);

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
         $id_restaurant = $infosRestau->id_restaurant ;
         $id_plat = $infosPlat->id_plat; 
         $quantite = $infosRestau->quantite; 


         if(isset($_POST["commandePla[]"]))
         {
          

         $requete = 'INSERT INTO commande(date_de_commande, date_de_livraison, id_client, id_restaurant)
                     VALUES :date_de_commande, :date_de_livraison, 
                            :id_client, :id_restaurant';

           $commande = $bdd->prepare($requete);
           $inserCommande =  $commande->execute([
                    ":date_de_commnde"=> $date_de_commande,  
                    ":date_de_livraison"=> $date_de_livraison,
                    ":id_client"=>$id_client,
                    ":id_restaurant"=>  $id_restaurant  
           ]);               
           
           $lastIdCommande = $bdd->lastInsertId();


           $requeteCommander = 'INSERT INTO commander(id_commande, id_plat, quantite)
                                VALUES :id_commande, :id_plat, :quantite';

            $quantitPlat = $bdd->prepare($requeteCommander);
            $inserQuantite =  $quantitPlat->execute([

                            ":id_commande"=>$lastIdCommande,
                            ":id_plat"=> $id_plat ,
                            ":quantite"=> $quantite
            
            ]);

            }

            return $inserQuantite;
            


      }




}