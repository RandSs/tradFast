<?php
use tradFast\Bdd;
use PDO;
use Commande\Commande;



class CommandeRepo 
{
      /**
       * fonction pour injecter les commades passer par les client.
       */

      public function accepterCommande($id_plat)
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
}