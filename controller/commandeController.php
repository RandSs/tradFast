<?php
use commande\Commande;
//use CommandeRepo;
//include("classes/commande.php");
include("model/commandeRepository.php");
require_once("classes/plat.php");
require_once("classes/commande.php");
require_once("users/restaurent.php");


class CommandeController extends CommandeRepo
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
            $_SESSION['panier']['id_restaurent'] = array();
           // $_SESSION['panier']['date_de_commande'] = array();
           // $_SESSION['panier']['date_de_livraison'] = array();

        
        }
           

    }
    /**
     * @param int $id_plat  qui va etre choisi par un client.
     * récuperer les données d'un plat selectionner par le client grace a la superglobale @var $_GET.
     * @return array[panier] de la session.
     */

    public function passerCommande($id_plat = null)
    {

                    $id_plat = $_GET['id_plat'];
                    $plat = $_GET['plat'];
                    $prix = $_GET['prix'];
                    $qte = $_GET['qte'];
                    $id_restaurent = $_GET['id_restaurent'];
                
              if (isset($_GET['id_plat'])) {

               //si le $_GET['id_plat'] on execute la fonction  recupererPlat($id_plat)
               // du model pour pouvoir fair le fetch d'un plat precis selectionner par le client
               //est on stock les données dans la var  $resultats.

               $resultats = $this->recupererPlat($id_plat);
               
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
                array_push($_SESSION['panier']['id_restaurent'], $id_restaurent);

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
        $panierIdRes = $_SESSION['panier']['id_restaurent'];

        //on calcule le totale des plat choisis grace a la methode array_sum().

        $quantitePlats =  array_sum($panierQte);
       //on  passe les @var a la vus
       //pour pouvoir afficher un  panier remplit .
    
       include("view/addPanier.php");
      
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
            $infosRestau   = new Restaurent();
            $infosPlat     = new Plat();
        /*
            $infosPlat->id_plat = $_POST['commandePla'];
            $infosRestau->id_restaurent =  $_POST['commandeRest'];
            $infosRestau->quantite  =  $_POST['commandeQte'];
            $infosCommande->date_de_commande = $_POST['date_de_commande'];
            $infosCommande->date_de_livraison = $_POST['date_de_livraison'];
            $infosClient->id_client  = $_POST['id_client_commande'];
         */

                    $id_plat = $_GET['id_plat'] ;
                    $id_client = $_GET['id_client'];
                    $date_de_livraison = $_GET['dateDeLivrason'];
                    $date_de_commande = $_GET['dateDeCommande'];
                    $qte = $_GET['qte'];
                    $id_restaurent = $_GET['id_restaurent'];
                    
           /*  if (isset( $_POST['date_de_commande'])){
                foreach($infosPlat->id_plat as $k => $v){


                    echo  "<br/> <br/> id plat est : " . $v."  id rest est : " . $infosRestau->id_restaurent[$k] ." la qte : "
                    . $infosRestau->quantite[$k]. "\n" ; 
    
                    }
       
                echo'<br>';
               echo "date de commande: " .   $infosCommande->date_de_commande ."\n";
               echo"date de livraison: " .  $infosCommande->date_de_livraison ."\n";
              echo "id client: ".  $infosClient->id_client ."\n";   
               

           $implode =     implode(', ',  $infosPlat->id_plat);
           echo 'je suis le implode : '. $implode;
        

            }
            */
            include("view/clientCompte.php");
           
             
                }




                public function sql()
                {
                    $infosCommande = new Commande();
                    $infosClient   = new Client();
                    $infosRestau   = new Restaurent();
                    $infosPlat     = new Plat();
                   

                    $infosPlat->id_plat = $_POST['commandePla'];
                    $infosRestau->id_restaurent =  $_POST['commandeRest'];
                    $infosRestau->quantite  =  $_POST['commandeQte'];
                    $infosCommande->date_de_commande = $_POST['date_de_commande'];
                    $infosCommande->date_de_livraison = $_POST['date_de_livraison'];
                    $infosClient->id_client  = $_POST['id_client_commande'];



                    if(isset($_POST['commandePla'])){
                    echo"hello";
                    }else{
                            echo"no"; 
                        }
                 
                    include("panierSql.php");
                    
                }
        
 

  
}
