<?php
session_start();

use Entity\Commande;

require_once("entity/Commande.php");

$totalAmount = new CommandeController();


echo '<center>
<h1 class="text-success">Bienvenue : ' . strtoupper($_SESSION['nom_client']) . '</h1>
</center>';

echo '<center>
  <h4 class="text-success">Mes Commandes</h4>
</center>';

?>

<section class="container">

  <div class="card">

    <div class="card-body">
      <h5 class="card-title text-success">Panier</h5>


      <?php if (empty($panier)) {
        die("<center><h3 class='text-danger'>Votre panier est vide !</h3></center>");
      } else {
      ?>


        <form id="dateForm" name="dataForm" action="index.php" method="GET">
          <input type="hidden" name="page" value="validerCommande">
          <table class="table">

            <thead class="thead-light">
              <tr>
                <th scope="col"></th>

          
                <th scope="col" >Id plat</th>
                <th scope="col" >Plat</th>
                <th scope="col" >Prix</th>
                <th scope="col" >Quantité</th>
                <th scope="col" >Id restaurant</th>
                <th>Sup</th>

              </tr>
         </thead>

         <tbody>
            <?php 
                      $num = 1;
              foreach ($panier as $k) {
          
                echo  ' <tr id="supPlat">
<th class="sup" scope="row"> '.$num++ . ' </th>
<td>' . $k['id_plat'] . '</td>
<input type="hidden" id="id_plat_" name="commandePla[]" value="' . $k['id_plat'] . '">
<td >' . $k['plat'] . '</td>
<td >' . $k['prix'] . '</td>
<td >' . $k['qte'] . '</td>
<td >' . $k['id_restaurant'] . '</td>
<input type="hidden" id="id_restaurant_" name="commandeRest" value="' . $k['id_restaurant'] . '">
<input type="hidden" id="qte_" name="commandeQte[]" value="' . $k['qte'] . '">

<td id="sup" class="supprimer"  >
      <a href="index.php?page=supprimer&id_plat=' . $k['id_plat'] . '"; >
    <i  class="fas fa-trash-alt text-danger"  ></i></a>
</td></tr>';
              }

              echo
              '<th scope="row" class="text-success">Total</th>
        <td></td>
        <td></td>
        <td >' . $totalAmount->getTotal() . ' €</td>
        <td >' . $quantitePlats . '</td>
        <td></td>';
            }

              ?>

              </tbody>
          </table>

          <label for="date_de_commande">Date de commande
            <input type="date" name="date_de_commande" id="date_de_commande" value="">
          </label>
          <label for="date_de_livraison">Date de livraison
            <input type="date" name="date_de_livraison" id="date_de_livraison" value="">
          </label>
          <input type="hidden" id="id_client_" name="id_client_commande" value="<?= $_SESSION['id_client'] ?>">

          <button type="submit" id="dateDeCommande" role="button" name="submit" class="btn btn-outline-success">Commander</button>
        </form>

        <div id="return"></div>
    </div>
  </div>
</section>