<?php
session_start();

include("bdd.php");

include("view/header.php");
include("controller/Controller.php");
include("controller/restaurantController.php");

include("controller/rechercheController.php");
include("controller/clientController.php");

include("controller/commandeController.php");

include("rooter.php");

$root = new Rooter($_GET['page']);
$root->pageDemander();

include("view/footer.php");