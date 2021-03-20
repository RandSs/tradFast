<?php

class Bdd
{


  public static function getConnection(){
                try {
                    $bdd = new PDO("mysql:host=localhost;dbname=tradFast", "root", "",array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
                    return $bdd;

                }catch(Exception $e){
                        die('erreur de connexion à la base de données');
                }
  }

}