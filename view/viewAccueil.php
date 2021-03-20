

<article id="article" >
<section>
        <div>
              <h1 style="text-align: center;  color: green; opacity:0.7">La liste des restaurants</h1>
        </div>

</section>

<section>

      <!-- Modal -->
      <div class="modal fade" id="voirMenue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-success" id="exampleModalLongTitle">Menue</h5>
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
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fermer</button>
              <button type="button" class="btn btn-success"><a class="text-white" href="index.php?page=inscriptionClient" >Contacter restaurant</a></button>
            </div>
          </div>
        </div>
      </div>
</section>

<section>

          <div class="container" >
            <div class="card-deck" style="margin-top: 1rem; ">

              <?php

              //la variable $dernierInscription vien de la class controllerAccueil qui contien le resultat du fetch de la fonction 
              // getDernierDixInscription() de la class AccueilModel. 

              foreach ($restaurants as $rest) {

                echo
                  '<div class="card " style="min-width: 14rem;   margin-top: 1rem; margin-bottom:5rem;">' .
                  '<img class="card-img-top" src="' . $rest["image"] . '"  alt="Card image cap">' .
                  '<div class="card-body" >' .
                  '<h5 class="card-title">' . strtoupper($rest["nom"]) . " " .  strtoupper($rest["pseudo"]) . '</h5>'.
                  '<p class="card-text" style="color:green;"><b>Type de cuisine:' . $rest["cuisine"] . '</b></p>'.
                  '<p class=""><small class="text-muted"></small></p>' .
                  '<a class="btn btn-outline-success" href="index.php?page=restaurant&id_restaurent=' .$rest["id_restaurent"] . '"
                  role="button"  style="margin-bottom: 2rem;" >Voir restaurant</a>' .
                  '</div></div>';
              }

              ?>

             </div>
          </div>

  </section>

  <section>
         <div   class ="  navbar navbar-expand-lg navbar-dark bg-dark " >
                <ul class="pagination justify-content-center ml-auto">

                   <?php if($currentPage > 1 ) ?>
                   {

                      <li class="page-item ">
                      <a class="page-link" href="<?php "index.php?accueil&"?>pL=<?= $page - 1   ?>">Previous</a>
                      </li>
                     
                   }
                     
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <?php if($currentPage < $pages ) ?>
                        { <li class="page-item ">
                      <a class="page-link " href="<?php "index.php?page=accueil&pL"?><?= $page + 1  ?>" >Next</a>
                    </li>}

                       
                </ul>
                        </div>
  </section>
  </article>

<?php
 
?>


    
 
          

          

  