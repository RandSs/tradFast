<?php

?>
<h1>Mon panier </h1>

<section class="container" >

  <div class="card" >

    <div class="card-body">
      <h5 class="card-title text-success">Panier</h5>

      <table class="table">
        <thead class="">
          <tr>
            <th>Restaurant</th>
            <th>id plat</th>
            <th>Plat</th>
            <th>ingredient</th>
            <th>Prix</th>
            <th>quantité</th>

          </tr>
        </thead>
        <tbody>

          <?php

          foreach ($resultats as $plat) {

            echo
            '<tr>
                 <td><h5 >' . $plat->pseudo . '</h5></td>
                 <td><h5 >' . $plat->id_plat . '</h5></td>
                 <td> ' . $plat->plat.'</td>
                 <td><p style="font-size: 12px;">'.$plat->ingredient .'</p></td>
                 <td>'. number_format($plat->prix, 2, ',', ' ' ).' €</td>
             </tr>';

          }

          ?>
        </tbody>
      </table>

      <a href="#" class="btn btn-outline-success">Commander</a>
    </div>
  </div>
</section>