<?php
use Entity\Commande;
use Entity\Restaurant;
use Entity\Client;
use Entity\Plat;
use Ripository\CommandeRepository;
include("model/CommandeRepository.php");

class CommandeController 
{
    public function __construct()
    {
        //registrer par quel page le visiteur a acceder au site 
        //faire un header(Location:  $_SESSION['page'] ) 
        //pour luit donner la possibliter de revenir  sur la meme page.

        $_SESSION['page'] = $_SERVER['REQUEST_URI'];

       // obliger le visiteur de signe in ou s'inscrir avant de passer une commande.

        if (!isset($_SESSION["id_client"])) {

            die("<center class='alert alert-danger'><h2>il faut etre un client avant de passer une commande!</h2></center>
           <center><a href='index.php?page=inscriptionClient'>S'inscrir</a></center>");
          }

        if (!isset($_SESSION['panier'])) {
            //si la session panier n'existe pas on la 
            //déclare et on déclare aussi les session[panier][donnees] de chaque données comme type array[]
            //récuperer  par la @var $_GET .
            $_SESSION['panier'] = array();

            $_SESSION['panier']['id_plat'] = array();
            $_SESSION['panier']['plat'] = array();
            $_SESSION['panier']['prix'] = array();
            $_SESSION['panier']['qte'] = array();
            $_SESSION['panier']['id_restaurant'] = array();
         
        
        }
           

    }


 
   /**
   *On calcule le montant total du panier
   * 
   * @return int
   */
     public function getTotal(){
    $total=0;
    for($i = 0; $i < count($_SESSION['panier']['id_plat']); $i++)
    {
       $total += $_SESSION['panier']['prix'][$i] * $_SESSION['panier']['qte'][$i];
    }

    return $total;

 }
      /**
       * on recuper la commande passer le client.
       */
        public function getCommande(){

            $infosCommande = new Commande();
            $infosClient   = new Client();
            $infosRestau   = new Restaurant();
            $infosPlat     = new Plat();
      

                    $id_plat = $_GET['id_plat'] ;
                    $id_client = $_GET['id_client'];
                    $date_de_livraison = $_GET['dateDeLivrason'];
                    $date_de_commande = $_GET['dateDeCommande'];
                    $qte = $_GET['qte'];
                    $id_restaurant = $_GET['id_restaurant'];
                
            include("view/clientView/clientCompte.php");
           
             
                }

               

             


                public function commandeInfos($id_plat)
                {
                    $id_plat = $_GET['id_plat'];
                    $plat = $_GET['plat'];
                    $prix = $_GET['prix'];
                    $qte = $_GET['qte'];
                    $id_restaurant = $_GET['id_restaurant'];
              if (isset($_GET['id_plat'])) {
                $commande = new CommandeRepository;
                $resultats = $commande->recupererPlat($id_plat);
            if (empty($resultats)) {
                 //si le client na rien choisi on fait die avec un msg.
                die("Vous n'avais commander aucun plat !! ");
                //si le client a bien choisi un plat on remplit les array[]
                //déclarer au paravant grace a la methode php array_push 
            } else {
               array_push($_SESSION['panier']['id_plat'], $id_plat);
                array_push($_SESSION['panier']['plat'], $plat);
                array_push($_SESSION['panier']['prix'], $prix);
                array_push($_SESSION['panier']['qte'], $qte);
                array_push($_SESSION['panier']['id_restaurant'], $id_restaurant);
                //on donne la possibiliter au client de pouvoir retourner a la page precedente grace a fonction 
                //history.back();
               
                die('le plat a bien été ajouté à votre panier <a href="javascript:history.back()">retourner sur le menu</a>');
            }
          
        }
        $panier = $_SESSION['panier'];
        $panierId = $_SESSION['panier']['id_plat'];
        $panierPlat = $_SESSION['panier']['plat'];
        $panierPrix = $_SESSION['panier']['prix'];
        $panierQte = $_SESSION['panier']['qte'];
        $panierIdRes = $_SESSION['panier']['id_restaurant'];
        
        include("view/clientView/addPanier.php");


    }

     
    public function validerCommande($id_plat){

       
                            // déclarer une $arrayCommande[] array pour stocker les données 
                        // que je récuper grace à la superglobal $_GET.
                        $arrayCommande = array();
                        //je récupere les données. 
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
                 
                        if(isset($_GET['commandePla'])){
                            //var_dump( $arrayCommande );
                        }
               
                    
                       
                    
                      //  $arrayCommande["id_restaurant"] = $id_restaurant;
                    
                        //j'utilise la fonction implode pour transformer le contenue de la @var $arrayCommande
                        // de type array pour que j'obtien a la sortie un string on lui passon le premier argument de séparation
                        //"la vergule" et sa permis de guarder le meme order.  
                           
                     if(!empty($arrayCommande)){
                         echo "pas de données!";
                     }else{
                         $inject = new CommandeRepository; 
                         $inject ->panier();
                     }
                       
                        // je test si l'inseration dans la table commande, si c'est true
                        //je contenue le processe de l'inseration de la deuxiem partie.
                        if ($resultat === true) {
                            //je déclare @var $arrayCommander une array.
                            //pour stocker les données que je vais avoir besoin.
                            $arrayCommander                = array();
                            $arrayCommander["id_commande"] = $lastCommandeId;
                            $arrayCommander["id_plat"]     = $id_plat;
                            $arrayCommander["quantite"]    = $quantite;
                
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
                    
                    
                    public function del($id_plat)
                    {
                       
                        $id_plat = $_SESSION['panier']['id_plat'];
              
                        unset( $_SESSION['panier']['id_plat'][$id_plat] );
                        echo
                        "
                        <script>
                        location.href = 'index.php?page=addpanier';
                        </script>";
                    }
            
         
    
                
  
}
