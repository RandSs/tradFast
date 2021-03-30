<?php 

include("model/modelRestaurent.php");

//include("controller/uploadFileController.php");

class RestaurentController extends RestaurentModel 
{
  
    // déclarer une fonction pour récupérer les données du model et les passer à la vue.
    public function afficheRestaurents()
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

     $this->nom = $_POST["nom"];
     $this->pseudo = $_POST["pseudo"];
     $this->adresse = $_POST["adresse"];
     $this->tel = $_POST["tel"];
     $this->code_postal = $_POST["code_postal"];
     $this->email = $_POST["email"];
     $this->mdp = $_POST["mdp"];
     $this->image = $_POST["image"];
     $this->id_cuisine = $_POST["typeCuisine"];
     $this->id_role = $_POST["id_role"];
    
     
     
         if(isset($_POST['email']) && isset($_POST["typeCuisine"]) ){
           $message = "votre inscription n'est pas prise en compte!"; 
           if(!$this->email) {
             $message = " email incorrect";
           }
         } 

         if ($this->email && $this->nom && $this->pseudo) {

           
              $this->mdp = password_hash($_POST["mdp"], PASSWORD_DEFAULT);

          if ($this->inscription()) {
            
          
              echo $message = "<center class='alert alert-info>Inscription est pris en compte </center>";
          } else {
              include("view/inscriptionRestaurent.php");
          }
      }
        
             include("view/inscriptionRestaurent.php");

  }




  public function connecteMoi()
  {
    if(isset($_POST["email"]) && isset($_POST["mdp"]))
    {
       $this->email = ($_POST["email"]);
       $restaurent = $this->seConnecter(); // model
       
       if(password_verify($_POST["mdp"], $restaurent["mdp"]))
       {
             $_SESSION['nom'] = $restaurent['nom'];
             $_SESSION['pseudo'] = $restaurent['pseudo'];
             $_SESSION["id_restaurent"] = $restaurent["id_restaurent"];
             $_SESSION["id_role"] = $restaurent["id_role"];
             $_SESSION["role"] = $restaurent["role"];

             header('Location: index.php?page=restaurentCompte');
       }else{
         echo $message = "<center class='alert alert-danger'>Email ou mot de passe incorrect </center>";
        
       }

    }
    include("view/viewSignInRestau.php");
  }



  public function restaurentCompte($id_restaurent = null)
  {
      if($id_restaurent !== null)
      {
            $compte = $this->getRestauCompte($id_restaurent);
           
            $commadeInformation = $this->commandeInfos($id_restaurent);

           
            
            include("view/restaurentCompte.php");
      } else{
                echo "on est pas connecter";
            }
      
  }

  public function voireMenu($id_restaurent = null)
  {
    if($id_restaurent !== null)
    {
       $menus =  $this->voirMenu($id_restaurent);
       $monRestaurentCompte = $this->fetchRestaurentData($id_restaurent);
          
          include("view/voireRestaurant.php");
    } else{
            echo"cette page n'existe pas!"; 
    }
  }


  
  public function ajouterPlat()
  {
   
    $id = $_SESSION["id_restaurent"];
  
    $this->plat = $_POST["plat"];
    $this->prix = $_POST["prix"];
    $this->ingredient = $_POST["ingredient"];
    $this->typeDePlat = $_POST["typeDePlat"];
   
    if( isset($_POST["typeDePlat"])  && isset($_POST["plat"]))
    {
    if( $this->plat && $this->typeDePlat )
    {
    if($this->ajouterIdMenueEtUnPlat($id) )
    {
      echo $message = "votre plat est ajouter dans le menu !" ;
    }
    else
    {
      echo  $message = "votre plat n'est pas ajouter au menu! ";
    }
      }
         $message = "votre mise a jour est prise en compte!";

         if(!$this->plat)
         {
           $message = "votre mise a jour na pas ete prise en compte! ";
         }
    }
     

     include("view/rajouterPlat.php");
  }



  public function passerCommande($plat = null)
  {
   

      if($plat == true )
      {
              
       $commandes =  $this->accepterCommande($plat);
       include("view/clientComte.php");
      
      }
     
     
  }

  
      
}
