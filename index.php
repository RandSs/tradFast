<?php
session_start();

include("bdd.php");

include("view/coreView/header.php");
include("controller/Controller.php");
include("controller/RestaurantController.php");

include("controller/RechercheController.php");
include("controller/ClientController.php");

include("controller/CommandeController.php");

include("router.php");

$route = new Router($_GET['page']);
$route->pageDemander();

include("view/coreView/footer.php");