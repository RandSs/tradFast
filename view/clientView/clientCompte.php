<?php
session_start();

$voirCommnade = new CommandeController();
$voirCommnade->commandeInfos($id_plat);

?>

<h5>voila le client</h5>

 