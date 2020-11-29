<?php 

// Pour faire comprendre au navigateur qu'il reçoit du contenu JSON et non HTML :
// header('Content-Type: application/json');
    
// Inclusion physique des fichiers de classe nécessaires
require( dirname(__FILE__) . '/../DTO/Page.php');
require( dirname(__FILE__) . '/../DAO/PageManager.php');

// Importation des classes nécessaires dans l'espace de nom actuel
use App\DTO\Page;
use App\DAO\PageManager;

// Inclusion du fichier settings.php
require '../settings.php';

if(isset($_POST["type"])){
    
    try{
            
        //instanciation du manager des pages
        $pageManager = new PageManager( getDb() );
        
        //récupération de la page des entrées
        $page = $pageManager->findPage($_POST['type']);
    
    }catch(Exeption $e){
        die('Problème PHP ; ' . $e->getMessage() );
    }
    
    echo json_encode($page);
    
}

