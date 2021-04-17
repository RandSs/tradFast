<?php
use tradFast\Bdd;
use PDO;
use Commande\Commande;

//require_once('controller/commandeController.php');

class CommandeRepo 
{
      /**
       * fonction pour selectioner un plat choisi par un client.
       *  @param int $id_plat  qui va etre choisi par un client.
       * @return {obj} 
       */

      public function recupererPlat($id_plat)
      {
            // fetchAll(PDO::FETCH_OBJ)

            $bdd = Bdd::getConnection();

           $requete = 'SELECT * FROM plat
                       INNER JOIN restaurent ON plat.id_restaurent = restaurent.id_restaurent
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
         $infosRestau   = new Restaurent();
         $infosPlat     = new Plat();

      
         $date_de_commande = $infosCommande->date_de_commande;
         $date_de_livraison = $infosCommande->date_de_livraison;
         $id_client = $infosClient->id_client;
         $id_restaurent = $infosRestau->id_restaurent ;
         $id_plat = $infosPlat->id_plat; 
         $quantite = $infosRestau->quantite; 


         if(isset($_POST["commandePla[]"]))
         {
            $id_plat = mysqli_real_escape_string($bdd, $_POST["commandePla[]"]) ;
            $id_client  = mysqli_real_escape_string($bdd, $_POST["id_client_commande"]);
            $id_restaurent =  mysqli_real_escape_string($bdd, $_POST["commandeRest[]"]);
            $quantite =  mysqli_real_escape_string($bdd, $_POST["commandeQte[]"]);
            $date_de_commande = mysqli_real_escape_string($bdd,$_POST["date_de_commande"]);
            $date_de_livraison = mysqli_real_escape_string($bdd, $_POST["date_de_livraison"]);
         

         $requete = 'INSERT INTO commande(date_de_commande, date_de_livraison, id_client, id_restaurent)
                     VALUES :date_de_commande, :date_de_livraison, 
                            :id_client, :id_restaurent';

           $commande = $bdd->prepare($requete);
           $inserCommande =  $commande->execute([
                    ":date_de_commnde"=> $date_de_commande,  
                    ":date_de_livraison"=> $date_de_livraison,
                    ":id_client"=>$id_client,
                    ":id_restaurent"=>  $id_restaurent  
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

          var_dump( $inserQuantite);
            return $inserQuantite;
            


      }




}