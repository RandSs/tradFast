<?php
namespace App;
use PDO;
use PDOException;

class Bdd
{


  public static function getConnection(){
                try {
                    $bdd = new PDO("mysql:host=localhost;dbname=trad", "root", "",
                    array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
                          PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

                    return $bdd;

                }catch(PDOException $exception){
                        die('Erreur: '. $exception->getMessage());
                }
  }

}