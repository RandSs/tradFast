<?php
include("bdd.php");
include("view/header.php");
include("controller/controllerAccueil.php");
include("rooter.php");
$root = new Rooter($_GET['page']);
$root->pageDemander();

include("view/footer.php");