<?php
use Entity\Commande;
use Entity\Restaurant;
use Entity\Client;
use Entity\Plat;
use Ripository\CommandeRepository;



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
        }
    }



    /**
     *On calcule le montant total du panier
     * 
     * @return int
     */
    public function getTotal()
    {
        $total = 0;
        foreach($_SESSION['panier'] as $k){
            $total += $k['prix'] * $k['qte'];
        }
  
        return $total;
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
                if(!empty( $_SESSION['panier'][$id_plat]['id_plat'])){
                    $_SESSION['panier'][$id_plat]['qte']= $_SESSION['panier'][$id_plat]['qte']+$qte;  
                }
                else
                {
                $_SESSION['panier'][$id_plat]['id_plat']= $id_plat;
                $_SESSION['panier'][$id_plat]['plat']= $plat;
                $_SESSION['panier'][$id_plat]['prix']= $prix;
                $_SESSION['panier'][$id_plat]['qte']= $qte;
                $_SESSION['panier'][$id_plat]['id_restaurant']= $id_restaurant;
                }

                //on donne la possibiliter au client de pouvoir retourner a la page precedente grace a fonction 
                //history.back();
echo'
                <div class="card-body">
                <h5 class="card-title text-success">le plat à bien été ajouté à votre panier</h5>';
          
          
          

                die('<center><h3 class="text-success"><a href="javascript:history.back()">retourner sur le menu</h5></a></div>');
            
            }

        }
        $panier = $_SESSION['panier'];
     
        
        include("view/clientView/addPanier.php");
    }


    

    public function validerCommande($id_plat)
    {

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


        if (isset($_GET['commandePla'])) {
            $inject = new CommandeRepository;
           $resultats =  $inject->panier($arrayCommande,  $id_plat, $quantite);
            
                 
        }
        if (empty($arrayCommande)) {
            echo "pas de données!";
        } else {
        }
    }


    public function viderPanier(){
        $submit = $_GET['submit'];
        if(isset($submit)){
            unset($_SESSION['panier']);

            echo'
                <div class="card-body">
                <h2 class="card-title text-success">Votre commande est prise en compte</h2>';
          

                die('<center><h3 class="text-success"><a href="javascript:history.back()">retourner sur le panier</h5></a></div>');

        }
        
    }

    /**
     * @param id_plat INT 
     * fonction pour supprimer un plat donnée du panier.
     */

    public function del($id_plat)
    {
    
        unset($_SESSION['panier'][$id_plat]);

        echo "<script>
                 location.href ='index.php?page=addpanier';
             </script>";
        
    }
}
