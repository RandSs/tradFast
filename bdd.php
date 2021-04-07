<?php
namespace tradFast;
use PDO;
use Exception;

class Bdd
{


  public static function getConnection(){
                try {
                    $bdd = new PDO("mysql:host=localhost;dbname=tradFast", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    return $bdd;

                }catch(Exception $exception){
                        die('Erreur: '. $exception->getMessage());
                }
  }

}