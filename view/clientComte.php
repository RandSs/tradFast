<?php

?>
<h1>je le client </h1>

<section>

<div class="card" style="width: 18rem;">

  <div class="card-body">
    <h5 class="card-title text-success">Pannier</h5>

    <table class="table">
                    <thead class="">
                      <tr >
                        <th >Restaurant</th>
                        <th >Plat</th>
                        <th >Prix</th>
                  
                      </tr>
                    </thead>
                    <tbody>
                      
<?php 
                                     
          foreach( $commandes as $pl){

       
                    
                 echo            
                        
                     '  <tr>
                                  <td><h5 id="plat">    '. $pl .'     </h5><p  style="font-size: 10px;">
                                         
                                </p></td><td></td>
                              </tr>';

          }
                              ?>    
                    </tbody>
                </table>
      
    <a href="#" class="btn btn-outline-success">Commander</a>
  </div>
</div>
</section>