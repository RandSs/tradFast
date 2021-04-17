<?php
session_start();
var_dump($_SESSION['client']);
$voirCommnade = new CommandeController();
$voirCommnade->passerCommande();

?>

<h5>voila le client</h5>

 