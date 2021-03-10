<?php


class AccueilModel 
{
  //déclarer une fonction pour récupérer les champ de la table restaurateur, et pour se connecter à la base de donnée c'est grace à la fonction static getConnected() dans la class Bdd.
    public function getDernierDixInscription(){
        $bdd = Bdd::getConnected();
        $resultat = $bdd->query('SELECT * FROM restaurateur
        INNER JOIN type
        ON type.id_restaurateur = restaurateur.id_restaurateur
        INNER JOIN type_cuisine
        ON type_cuisine.id_cuisine=type.id_cuisine')->fetchAll();
        $bdd =null;
        return $resultat;
    }

   

}