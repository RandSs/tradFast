<?php
use App\Bdd;

?>

<article id="article" >
<section>
        <div>
              <h1 style="text-align: center;  color: green; opacity:0.7">La liste des restaurants</h1>
        </div>

</section>

<section>

      <!-- Modal -->
      <div class="modal fade" id="voirmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-success" id="exampleModalLongTitle">menu</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
                <div class="modal-body d-flex flex-row" >
                  <div>
                      <table>
                        <thead>
                          <tr>
                            <th>Entrée</th>
                      
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                           
                              foreach($voirMenuRestau as $menu){ 
                                var_dump ($voirMenuRestau);
                                echo'<tr>
                                <td>' .$menu["plat"] . $menu["prix"].'<a href="#" ><i class="fas fa-shopping-basket"></i></a><p style="font-size: 10px;">
                                          éscalope poulet, salade, tomate
                                </p></td>
                              </tr>';
                            }
                         

                          ?>
                       
                        </tbody>
                      </table>
                      </div>
                      <div>
                      <table>
                        <thead>
                          <tr>
                            <th>Main</th>
                      
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                             
                             for($i=0; $i < 5 ; $i++){ 
                               echo'<tr>
                               <td>César salad 4€  <a href="#" ><i class="fas fa-shopping-basket"></i></a><p style="font-size: 10px;">
                                         éscalope poulet, salade, tomate
                               </p></td>
                             </tr>';
                           }
                        

                         ?>
                         
                        </tbody>
                      </table>
                      </div>
                      <div>
                      <table>
                        <thead>
                          <tr>
                            <th>Dessert</th>
                      
                          </tr>
                        </thead>
                        <tbody>
                        <?php
                             
                             for($i=0; $i < 5 ; $i++){ 
                               echo'<tr>
                               <td>César salad 4€  <a href="#" ><i class="fas fa-shopping-basket"></i></a><p style="font-size: 10px;">
                                         éscalope poulet, salade, tomate
                               </p></td>
                             </tr>';
                           }
                        

                         ?>
                         
                        </tbody>
                      </table>
                      </div>
                </div>
            <div class="modal-footer" >
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-success"><a class="text-white" href="index.php?page=inscriptionClient" >Contacter restaurant</a></button>
            </div>
          </div>
        </div>
      </div>
</section>

<section >
<div class="container " >
<div class="card-deck " style=" margin-bottom: 2rem;" >
<?php

            $bdd = Bdd::getConnection();

            $page = (!empty($_GET['pL']) ? $_GET['pL'] : 1);
            $limite = 8;
            $debut = ($page - 1) * $limite;

            $nbRows = ('SELECT COUNT(id_restaurant) AS nb FROM restaurant');
            $nbRows= $bdd->query($nbRows);
            $result = $nbRows->execute();
            $resultNbRows =  $nbRows->fetchColumn();
            $nbDePage = ceil( $resultNbRows/ $limite);

            $query = ("SELECT * FROM restaurant 
                        INNER JOIN specialite
                        ON specialite.id_restaurant = restaurant.id_restaurant
                        INNER JOIN type_cuisine
                        ON type_cuisine.id_cuisine = specialite.id_cuisine
                        LIMIT :limite  OFFSET :debut " );

            $query= $bdd->prepare($query);
            $query->bindValue('limite', $limite, PDO::PARAM_INT);
            $query->bindValue('debut', $debut, PDO::PARAM_INT);

            $resultat =  $query->execute();
 
            
            while ( $element = $query->fetch()) {
         
             echo'
              <div class="card"  style="min-width: 14rem;  margin-top: 1rem; margin-bottom:3rem;">
                <img class="card-img-top" src="'. ucfirst($element["image"]).'" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'.ucfirst($element["nom"]) . '</h5>
                  <p class="card-text" style="color:green;"><b>Cuisine :  ' . ucfirst($element["cuisine"]) . '</b></p>

                  <a href="index.php?page=restaurant&id_restaurant='. $element["id_restaurant"].'" role="button" class="btn btn-outline-success" >Voire restaurant </a>

                </div>
             
              </div>';
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
         
  </article>
