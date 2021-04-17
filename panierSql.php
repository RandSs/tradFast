<h1>bonjour</h1>
<pre>
<?php
session_start();
//session_unset();

function insert(){

    try {
        $bdd = new PDO("mysql:host=localhost;dbname=tradFast", "root", "",
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
              PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

    }catch(PDOException $exception){
            die('Erreur: '. $exception->getMessage());
    }

    $arrayCommande = array();
    $id_plat = $_GET['commandePla'];
    $id_restaurent =  $_GET['commandeRest'];
    $quantite  =  $_GET['commandeQte'];
    $date_de_commande = $_GET['date_de_commande'];
    $date_de_livraison = $_GET['date_de_livraison'];
    $id_client  = $_GET['id_client_commande'];
        
    //array_push($_SESSION['panier']['date_de_commande'], $date_de_commande);
    //array_push($_SESSION['panier']['date_de_livraison'], $date_de_livraison);
//var_dump($_SESSION['panier']);


$arrayCommande["date_de_commande"]  = $date_de_commande; 
$arrayCommande["date_de_livraison"] = $date_de_livraison;
$arrayCommande["id_client"] = $id_client;
$arrayCommande["id_restaurent"] = $id_restaurent;
    
    $champs = implode(", ", array_keys( $arrayCommande));
    $insertSql =  '\''. implode('\', \'', $arrayCommande) . '\'';
   
    //var_dump( $arrayCommande);
 
    if(!$bdd ){
        die("connection failled: " . $exception->getMessage()); 
    } else{
            $query = " INSERT INTO commande($champs)
                       VALUES ($insertSql) " ; 

                $rest = $bdd->prepare($query);
                $resultat =  $rest->execute();
          }
          $lastCommandeId = array();
         // $lastCommandeId = $bdd->lastInsertId();
 array_push( $lastCommandeId , $bdd->lastInsertId()); 


             //var_dump($lastCommandeId);

       if( $resultat === true ){

        $arrayCommander =array();
        $arrayCommander["id_commande"] =  $lastCommandeId  ;
        $arrayCommander["id_plat"] = $id_plat;
        $arrayCommander["quantite"]= $quantite ;

         $colonnes = implode(", ", array_keys( $arrayCommander));
         $rows =  '\''. implode('\', \'', $arrayCommander) . '\'';
    
        //$value[] = "($id_commande, $idPlat, $quantite)";
        $args = array_fill(0, count($arrayCommander), '?');
      
            $queryCommander = " INSERT INTO commander($colonnes)
            VALUES (".implode(',', ). ") " ; 
       
          // $queryCommander .= implode(', ' , $value);
    
           $prepareRequete = $bdd->prepare($queryCommander);

            $resultatRequete =  $prepareRequete->execute();

                     if($resultatRequete === true){
                         echo "Votre commnade a bien ete enregistre"; 
                     }else{
                        echo "Error: " .  $queryCommander . '<br>' ;
                     }
       
        }else {
       echo "Error: " .$query . '<br>' ;
         }


        }
    
   



  

insert();




?>

</pre>


