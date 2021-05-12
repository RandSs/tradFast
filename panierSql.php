<h1>bonjour</h1>


<pre>
<?php
session_start();


/**
 * déclarer une fonction pour inserer les commandes dans la bdd.
 */

function insert()
{
    //connexion à la bdd avec le PDO.
    try {       $bdd = new PDO(
            "mysql:host=localhost;dbname=trad",
            "root",
            "",
            array(
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
            )
        );
    } catch (PDOException $exception) {

        die('Erreur : ' . $exception->getMessage());
    }

    // déclarer une $arrayCommande[] array pour stocker les données 
    // que je récuper grace à la superglobal $_GET.
    $arrayCommande = array();
    $id_plat = $_GET['commandePla'];
    $id_restaurant =  $_GET['commandeRest'];
    $quantite  =  $_GET['commandeQte'];
    $date_de_commande = $_GET['date_de_commande'];
    $date_de_livraison = $_GET['date_de_livraison'];
    $id_client  = $_GET['id_client_commande'];
    // je remplie la variable type array $arrayCommande avec les données est au
    //meme temps je défini les clées du tableau.    
    $arrayCommande["date_de_commande"]  = $date_de_commande;
    $arrayCommande["date_de_livraison"] = $date_de_livraison;
    $arrayCommande["id_client"] = $id_client;

  //  $arrayCommande["id_restaurant"] = $id_restaurant;

    //je utilise la fonction implode pour transformer la contenue de la @var $arrayCommande
    // de type array pour que j'obtien a la sortie un string on lui passon le premier argument de séparation
    //"la vergule" et sa permis de guarder le meme order.  
       
    $champs = implode(", ", array_keys($arrayCommande));
    $insertSql =  '\'' . implode('\', \'', $arrayCommande) . '\'';
    // je test la connection si false return die(msg)
    if (!$bdd) {
        die("connection failled: " . $exception->getMessage());
        //else je fait l'inseration dabore dans la table commande
    } else {
        $query = " INSERT INTO commande($champs)
                       VALUES ($insertSql) ";

        $rest = $bdd->prepare($query);
        $resultat =  $rest->execute();
        
    }
   
    // je déclare @var  $lastCommandeId comme array[]
    //pour stocker le dernier id qui été créer dans la table commande 
    //pour que je l'utilise pour inserer la deuxiem partie de la commande 
    //dans la table commander.

    $lastCommandeId = array();
    //j'utilise la methode array_push pour stocker le dernier id_commande.
    array_push($lastCommandeId, $bdd->lastInsertId());

    // je test si l'inseration dans la table commande, si c'est true
    //je contenue le processe de l'inseration de la deuxiem partie.
    if ($resultat === true) {
        //je déclare @var $arrayCommander une array.
        //pour stocker les données que je vais avoir besoin.
        $arrayCommander                = array();
        $arrayCommander["id_commande"] = $lastCommandeId;
        $arrayCommander["id_plat"]     = $id_plat;
        $arrayCommander["quantite"]    = $quantite;

        //je fait un if statement pour voir si le count de 
        // deux @var $id_plat === $lastCommandeId 
        //pour avoir le meme count dans chaque array sinon 
        // je peut pas inserer les données.

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

        $colonnes = implode(", ", array_keys($arrayCommander));

        //je déclare @var $count pour stocker le count($lastCommandeId).
        $count =  count($lastCommandeId);
        var_dump($count);

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
        //si true je fait un echo "Votre commnade a bien ete enregistre"
        if ($resultatRequete === true) {
            echo "Votre commnade a bien ete enregistre";
            echo
            "
            <script>
            location.href = 'index.php?page=accueil';
            </script>";
       //else echo "Error" + le sql query  $queryCommander 
        } else {
            echo "Error: " .  $queryCommander . '<br>';
        }
    } else {
        echo "Error: " . $query . '<br>';
    }

}



insert();



?>

</pre>
<script src="javascript/main.js"></script>