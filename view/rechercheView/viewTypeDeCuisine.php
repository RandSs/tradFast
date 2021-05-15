<section >
<div class="container " >
<div class="card-deck " style=" margin-bottom: 2rem;" >

<?php


       
          foreach( $resultatTypeCuisine as $typeDeCuisine)  
          {
         
             echo'
              <div class="card"  style="min-width: 14rem;  margin-top: 1rem; margin-bottom:3rem;">
                <img class="card-img-top" src="'. ucfirst($typeDeCuisine["image"]).'" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'.ucfirst($typeDeCuisine["nom"]) . '</h5>
                  <p class="card-text" style="color:green;"><b>Cuisine :  ' . ucfirst($typeDeCuisine["cuisine"]) . '</b></p>

                  <a href="index.php?page=restaurant&id_restaurant='. $typeDeCuisine["id_restaurant"].'" role="button" class="btn btn-outline-success" >Voire restaurant </a>

                </div>
             
              </div>';
            }
            ?>
    </div>
    </div>   

</section>

     