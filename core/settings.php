<?php

//Activation des sessions 
session_start();

//Inclusions des paquets installés avec composer
// require 'vendor/autoload.php';
require( dirname(__FILE__) . '/../vendor/autoload.php');



//Fonction permettant de retourner une connexion à la base de donnée
//c'est ici qu'on peut changer les paramètres de connexion a la bdd du sitte
function getDb(){

    $dbHost = 'localhost';
    $dbName = 'restaurant_du_moulin';
    $dbUser = 'root';
    $dbPassword = '';

    return new PDO('mysql:host='.$dbHost.';dbname='.$dbName.';charset=utf8', $dbUser, $dbPassword);
}