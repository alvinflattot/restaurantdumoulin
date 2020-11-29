<?php

namespace App\DAO;

use \App\DTO\Page;
use \PDO;

/**
 * Classe DAO permettant de gérer les objets de la classe "Page"
 */
class PageManager{

    /**
     * Attribut permettant de stocker une instance de connexion à la base de données (PDO)
     */
    private $db;

    /**
     * Getter de $db
     */
    public function getDb(){
        return $this->db;
    }

    /**
     * Setter de $db
     */
    public function setDb(PDO $db){
        $this->db = $db;
    }

    /**
     * Constructeur servant à hydrater $db avec une instance de connexion PDO
     */
    public function __construct($db){
        $this->setDb($db);
    }

    /**
     * Méthode permettant de convertir un tableau de données en un objet de la classe "Page"
     */
    public function buildDomainObject(array $pageInfos){

        // Création d'un nouvel objet Page
        $newPage = new Page();

        // Hydratation du plat avec les infos récupérées dans la base de données
        $newPage->setId( $pageInfos['id'] );
        $newPage->setType( $pageInfos['type'] );
        $newPage->setTitle( $pageInfos['title'] );       
        $newPage->setContent( $pageInfos['content'] );

        return $newPage;
    }

    //Fonction qui récupère la page du menu suivant le type de repas
    public function findPage($type)
    {
        //requete SQL pour récupérer les infos de la page.
        $getPage = $this->getDb()->query('SELECT * FROM page WHERE type= "'.$type.'" ');

        //récupération des pages sous forme de tableau associatif
        $page= $getPage->fetch(PDO::FETCH_ASSOC);

        //création et hydratation d'un objet la classe Page
        $pageObject = $this->buildDomainObject($page);

        // La méthode retourne le tableau contenant tous les plats sous form d'objets de la classe "Page"
        return $pageObject;
        
    }

    /**
     * Méthode permettant de mettre a jour une page
     */
    public function update($pageUpdated)
    {
        //préparation de la requette
        $updatePage = $this->getDb()->query('UPDATE page SET title="'.htmlspecialchars($pageUpdated->getTitle()).'", content="'.htmlspecialchars($pageUpdated->getContent()).'" WHERE type="'.htmlspecialchars($pageUpdated->getType()).'"');

        // return $updatePage->execute([
        //     $pageToUpdate->getType(),
        //     $pageToUpdate->getTitle(),
        //     $pageToUpdate->getContent(),

        // ]);
    }
    

}