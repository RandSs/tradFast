<?php

use commande\Commande;
use CommandeRepo;


include("classes/commande.php");
include("model/commandeRepository.php");

class CommandeController extends CommandeRepo
{

    public function passerCommande($id_plat = null)
    {

        //registrer par quel page le visiteur a acceder au site 
        //faire un header(Location:  $SESSION['page'] ) 
        //pour revenir sur la meme page.

        $SESSION['page'] = $_SERVER['REQUEST_URI'];

        // obliger le visiteur de signe in ou s'inscrir avant de passer un ecommande.

        if (!isset($_SESSION["id_client"])) {

            die("<center class='alert alert-danger'><h2>il faut etre un client avant de passer une commande!</h2></center>
      <center><a href='index.php?page=inscriptionClient'>S'inscrir</a></center>");

        }

        if (!isset($_SESSION['panier'])){
               // on déclare la session['panier'].
            $_SESSION['panier'] = array();
              
            $_SESSION['panier']['id_plat'] = array();
            $_SESSION['panier']['plat']= array();
            $_SESSION['panier']['prix']= array();
            $_SESSION['panier']['qte']= array();

        }
           
                $id_plat = $_GET['id_plat'];
               
                $plat = $_GET['plat'];
                $prix = $_GET['prix'];
                $qte = $_GET['qte'];

             
              
                

            if (isset($_GET['id_plat'])) {

                $resultats = $this->accepterCommande($id_plat);

                if (empty($resultats)) {

                    die("Vous n'avais commander aucun plat !! ");
                }else{

                    array_push( $_SESSION['panier']['id_plat'], $id_plat);
                    array_push( $_SESSION['panier']['plat'], $plat);
                    array_push( $_SESSION['panier']['prix'], $prix);
                    array_push( $_SESSION['panier']['qte'], $qte);

                    die('le plat a bien été ajouté à votre panier <a href="javascript:history.back()">retourner sur le menu</a>');

                }
               
               }
             $panier = $_SESSION['panier'];
             $panierId = $_SESSION['panier']['id_plat'];
             $panierPlat = $_SESSION['panier']['plat'];
             $panierPrix = $_SESSION['panier']['prix'];
             $panierQte = $_SESSION['panier']['qte'];

            include("view/clientCompte.php");
    }
}
