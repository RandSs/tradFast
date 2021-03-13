<section>
        <div>
              <h1 style="text-align: center;  color: green; opacity:0.7">Nouveauté</h1>
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
                             
                              for($i=0; $i < 10 ; $i++){ 
                                echo'<tr>
                                <td>César salad 4€<p style="font-size: 10px;">
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
                               <td>César salad 4€<p style="font-size: 10px;">
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
                               <td>César salad 4€<p style="font-size: 10px;">
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
              <button type="button" class="btn btn-success">Contacter restaurent</button>
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

              foreach ($dernierInscription as $dI) {

                echo
                  '<div class="card " style="min-width: 14rem; max-height: 21rem;  margin-top: 1rem;">' .
                  '<img class="card-img-top" src="' . $dI["image"] . '"  alt="Card image cap">' .
                  '<div class="card-body" >' .
                  '<h5 class="card-title">' . strtoupper($dI["nom"]) . " " .  strtoupper($dI["pseudo"]) . '</h5>'.
                  '<p class="card-text" style="color:green;"><b>Type de cuisine:' . $dI["cuisine"] . '</b></p>'.
                  '<p class="card-text"><small class="text-muted"></small></p>' .
                  '<a class="btn btn-outline-success" href="#" role="button" data-toggle="modal" data-target="#voirMenue">Voir menue</a>' .
                  '</div></div>';
              }

              ?>

             </div>
          </div>

  </section>