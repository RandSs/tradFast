<h1 style="text-align: center; margin-top:1rem; color: green; opacity:0.7">Nouveauté</h1>
<section>
   
</section>
<section>
<div class="container">
  <div class="card-deck" style="margin-top: 4rem;">

    <?php
    //la variable $dernierInscription vien de la class controllerAccueil qui contien le resultat du fetch de la fonction 
    // getDernierDixInscription() de la class AccueilModel. 
    foreach ($dernierInscription as $dI) {

      echo
      '<div class="card">' .
        '<img class="card-img-top" src="' . $dI["image"] . '"  alt="Card image cap">' .
        '<div class="card-body">' .
        '<h5 class="card-title">' . strtoupper($dI["nom"]) . " " .  strtoupper($dI["prenom"]) . '</h5>'.
        '<p class="card-text" style="color:green;"><b>Type de cuisine:' . $dI["cuisine"] . '</b></p>'.
        '<p class="card-text"><small class="text-muted"></small></p>' .
        '<a class="btn btn-outline-success" href="#" role="button">Voir menue</a>' .
        '</div></div>';
    }

    ?>


  </div>
  </section>