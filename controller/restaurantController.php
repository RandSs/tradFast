<?php 
use restauModel\RestaurantModel;
use restaurant\Restaurant;
use menu\Menu;
use plat\Plat;

include("model/restaurantRepository.php");

//require_once("classes/Restaurant.php");
//require_once("classes/Menu.php");
//require_once("classes/Plat.php");

//include("controller/uploadFileController.php");

class RestaurantController  extends Controller
{
    // déclarer une fonction pour récupérer les données du model et les passer à la vue.
    public function afficheRestaurants()
    {
          //$restaurants  = $this->pagination();// model
              include("view/viewAccueil.php"); 
     }

    /**
     * déclarer une fonction pour gérer le formulaire d'inscription et controler les information
     * avant de les passer au model.
     */
  public function setInscription()
  {
        
    $inscription = new RestaurantModel(); 
    $restInfos = new Restaurant();

    $restInfos->nom = $_POST["nom"];
    $restInfos->pseudo = $_POST["pseudo"];
    $restInfos->adresse = $_POST["adresse"];
    $restInfos->tel = $_POST["tel"];
    $restInfos->code_postal = $_POST["code_postal"];
    $restInfos->email = $_POST["email"];
    $restInfos->mdp = $_POST["mdp"];
    $restInfos->image = $_POST["image"];
    $restInfos->id_cuisine = $_POST["typeCuisine"];
    $restInfos->id_role = $_POST["id_role"];

    //var_dump( $restInfos->nom, $restInfos->pseudo,$restInfos->email);
    
         if(isset($_POST['email']) && isset($_POST["typeCuisine"]) ){
           $message = "votre inscription na pas été prise en compte!"; 
           if(!$restInfos->email) {
             $message = " email incorrect";
           }
         } 
       
         if ($restInfos->email && $restInfos->nom && $restInfos->pseudo) {

                 $restInfos->mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);
                 
            
             if ($inscription->inscription($restInfos)) {

              echo $message = "<center class='alert alert-info>Inscription est pris en compte </center>";
          } else {
              //include("view/inscriptionRestaurant.php");
          }
      }
        
             include("view/inscriptionRestaurant.php");

  }

  public function meConnecte()
  {
  
    $restInfos = new Restaurant();
    if(isset($_POST["email"]) && isset($_POST["mdp"]))
    {
      $restInfos->email = ($_POST["email"]);

        $connection = new RestaurantModel();
        var_dump($connection);

       $restaurant =  $connection->seConnecter($restInfos); // model
   
       if(password_verify($_POST["mdp"], $restaurant["mdp"]))
       {
       
             $_SESSION['nom'] = $restaurant['nom'];
             $_SESSION['pseudo'] = $restaurant['pseudo'];
             $_SESSION["id_restaurant"] = $restaurant["id_restaurant"];
             $_SESSION["id_role"] = $restaurant["id_role"];
             $_SESSION["role"] = $restaurant["role"];
            $this->restaurantSignIn();
    
       }else{
         echo $message = "<center class='alert alert-danger'>Email ou mot de passe incorrect </center>";
        
       }

    }
    include("view/viewSignInRestau.php");
  }



  public function restaurantCompte($id_restaurant = null)
  {
      $restaurantCompte = new  RestaurantModel();
      if($id_restaurant !== null)

      {
            $compte = $restaurantCompte ->getRestauCompte($id_restaurant);
           
            $commadeInformation = $restaurantCompte->commandeInfos($id_restaurant);
           
            include("view/restaurantCompte.php");
      } else{
                echo "vous ete pas connecter";
            }
      
  }

  public function voireMenu($id_restaurant = null)
  {
    $voirMenu = new RestaurantModel();
    if($id_restaurant !== null)
    {
       $menus =   $voirMenu->voirMenu($id_restaurant);
       $monrestaurantCompte =  $voirMenu->fetchrestaurantData($id_restaurant);
          
          include("view/voireRestaurant.php");
    } else{
            echo"cette page n'existe pas!"; 
    }
  }


  
  public function ajouterPlat()
  {
    $platInfos  = new Plat();
    $ajouter = new RestaurantModel();
    $menuInfos = new Menu();
    $id = $_SESSION["id_restaurant"];
  
    $platInfos->plat = $_POST["plat"];
    $platInfos->prix = $_POST["prix"];
    $platInfos->ingredient = $_POST["ingredient"];
    $menuInfos->typeDePlat = $_POST["typeDePlat"];
  
    if( isset($_POST["typeDePlat"])  && isset($_POST["plat"]))
    {
    if( $platInfos->plat &&  $menuInfos->typeDePlat )
    {
      $ajouter->ajouterIdmenuEtUnPlat($id, $platInfos, $menuInfos ) ;
       echo $message = "votre plat est ajouter dans le menu !" ;
    
         $message = "votre mise a jour est prise en compte!";

      }  
      if(!$platInfos->plat)
         {
           $message = "votre mise a jour na pas ete prise en compte! ";
        echo  $message = "votre plat n'est pas ajouter au menu! ";
         }

         
    }
     

     include("view/rajouterPlat.php");
  }


  
  
  
      
}
