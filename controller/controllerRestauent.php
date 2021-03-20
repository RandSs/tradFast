<?php 

include("model/modelRestaurent.php");

class RestaurentController extends RestaurentModel 
{
  
    // déclarer une fonction pour récupérer les données du model et les passer à la vue.
    public function afficheRestaurents()
    {

          // $restaurants  = $this->getRestaurents();// model

           $bdd = Bdd::getConnection();

     
           $page = (!empty($_GET['pL']) ? $_GET['pL'] : 1);
           $limite = 1;
           $debut = ($page - 1) * $limite;
          

           $nbRows = ('SELECT COUNT(id_restaurent) AS nb FROM restaurent');
           $nbRows= $bdd->query($nbRows);
           $result = $nbRows->execute();
           $resultNbRows =  $nbRows->fetchColumn();
           $nbDePage = ceil( $resultNbRows/ $limite);
       
           
           
        
         
          
            $query = ("SELECT * FROM restaurent LIMIT :limite  OFFSET :debut " );

            $query= $bdd->prepare($query);
            $query->bindValue('limite', $limite, PDO::PARAM_INT);
            $query->bindValue('debut', $debut, PDO::PARAM_INT);
         
            $resultat =  $query->execute();

            if($page > 1){
              echo "<a href = 'index.php?page=accueil&pL= ".  $page -1 ."'> Page précédente </a>";

            }
          '  <div class="container" >
            <div class="card-deck" style="margin-top: 1rem; ">';
            while($element = $query->fetch()){
       
             
  
             
                //la variable $dernierInscription vien de la class controllerAccueil qui contien le resultat du fetch de la fonction 
                // getDernierDixInscription() de la class AccueilModel. 
  
               
  
                  echo
                    '<div class="card " style="min-width: 14rem;   margin-top: 1rem; margin-bottom:5rem;">' .
                    '<img class="card-img-top" src="' . $element["image"] . '"  alt="Card image cap">' .
                    '<div class="card-body" >' .
                    '<h5 class="card-title">' . strtoupper($element["nom"]) . " " .  strtoupper($element["pseudo"]) . '</h5>'.
                    '<p class="card-text" style="color:green;"><b>Type de cuisine:' . $element["cuisine"] . '</b></p>'.
                    '<p class=""><small class="text-muted"></small></p>' .
                    '<a class="btn btn-outline-success" href="index.php?page=restaurant&id_restaurent=' .$element["id_restaurent"] . '"
                    role="button"  style="margin-bottom: 2rem;" >Voir restaurant</a>' .
                    '</div></div>';
                
  
             
              ' </div>
            </div>';
         }

      for($i= 1; $i <  $nbDePage; $i++){

        echo "<a href = 'index.php?page=accueil&pL= ".  $i ."'> $i</a>";

        
      }
    
      if($page < $nbDePage ){

        echo "<a href = 'index.php?page=accueil&pL= ". $page + 1 ."'> Page suivante </a>";

      }

            
   
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
     
     
         if(isset($_POST['email']) && isset($_POST["typeCuisine"])){
           $message = "votre inscription est prise en compte!"; 
           if(!$this->email) {
             $message = "alert email wrong";
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
    include("view/viewSignIn.php");
  }

  public function restaurentCompte($id_restaurent = null)
  {
      if($id_restaurent !== null)
      {
            $compte = $this->getRestauCompte($id_restaurent);
            $monRestaurentCompte = $this->fetchRestaurentData($id_restaurent);
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
          $compte = $this->getRestauCompte($id_restaurent);
          $monRestaurentCompte = $this->fetchRestaurentData($id_restaurent);
          $commadeInformation = $this->commandeInfos($id_restaurent);
        
         
          
          include("view/voireRestaurant.php");
    } else{
            echo"sa marche pas!"; 
    }
  }

  public function ajouterPlat()
  {
    $this->plat = $_POST["plat"];
    $this->prix = $_POST["prix"];
    $this->plat = $_POST["ingredient"];
    $this->typeDePlat = $_POST["typePlat"];
    $this->image = $_POST["image"];

    if(isset($_POST["plat"]) && isset($_POST["ingredient"]))
    {
         $message = "votre plat est ajouter !";
         if(!$this->plat){
           $message = "votre plat n'est pas rajouter au menu! ";
         }
    }
  }

  
      
}
