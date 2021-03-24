<div><h1 class="text-success" style="text-align: center; margin-top:1rem;">Voila le résultat  de votre recherche</h1></div>
<section >
    <h3><?php echo $message ?></h3>
<div class="container " >
<div class="card-deck " style=" margin-bottom: 2rem;" >
<?php
 
            if(count($resultats) > 0){

        
            foreach( $resultats as $resultat) {
         
             echo'
              <div class="card"  style="min-width: 14rem;  margin-top: 1rem; margin-bottom:3rem;">
                <img class="card-img-top" src="'. ucfirst($resultat["image"]).'" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'.ucfirst($resultat["nom"]) . '</h5>
                  <p class="card-text" style="color:green;"><b>Cuisine :  ' . ucfirst($resultat["cuisine"]) . '</b></p>

                  <a href="index.php?page=restaurant&id_restaurent='. $resultat["id_restaurent"].'" role="button" class="btn btn-outline-success" >Voire restaurant </a>

                </div>
             
              </div>';
            }
            }
            ?>
    </div>
    </div>   

</section>

      <section>
      <div class="navbar navbar-expand-lg navbar-dark bg-dark  d-flex  justify-content-between ">
           <ul class="" style="margin-left:35%;">

        <?php

          '<li>';
         if($page > 1)
         {

           echo "<a  class='text-success' href = 'index.php?page=accueil&pL= ".  $page -1 ."'> &laquo;</a>";        
          }
        
          '</li>';

          '<li>';
         for($i= 1; $i <  $nbDePage; $i++)
          {
         echo "<a  class='text-success' href = 'index.php?page=accueil&pL= ".  $i ."'> $i</a>";
          }
          '<li>';

        '<li>';
         if($page < $nbDePage )
     
           {

          echo "<a  class='text-success' href = 'index.php?page=accueil&pL= ". $page + 1 . "'>  &raquo; </a>";
            }
          
            '<li>';
          '</div></div> ';
         
      
       
          ?>
          </ul>
          </div>
          
          </section>