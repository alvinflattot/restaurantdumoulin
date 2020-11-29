<?php

namespace App\DAO;

use \App\DTO\Meal;
use \PDO;

/**
 * Classe DAO permettant de gérer les objets de la classe "Meal"
 */
class MealManager{

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
     * Méthode permettant de convertir un tableau de données en un objet de la classe "Meal"
     */
    public function buildDomainObject(array $mealInfos){

        // Création d'un nouvel objet Meal
        $newMeal = new Meal();

        // Hydratation du plat avec les infos récupérées dans la base de données
        $newMeal->setId( $mealInfos['id'] );
        $newMeal->setType( $mealInfos['type'] );
        $newMeal->setContent( $mealInfos['content'] );
        $newMeal->setPrice( $mealInfos['price'] );       

        return $newMeal;
    }

    //Fonction qui récupère toutes les plats suivant la catégorie
    public function findMeals($type)
    {
        //requete SQL pour récupérer les infos de tous les plats.
        $getMeals = $this->getDb()->query('SELECT * FROM meal WHERE type= "'.$type.'" ');

        //récupération des plats sous forme de tableau associatif
        $mealsList = $getMeals->fetchAll(PDO::FETCH_ASSOC);

        //création d'un nouveau tableau qui contiendra tous les objets sous forme d'objet de la classe Meal
        $mealsObjects = [];

        // Pour chaque sous tableau des plats, on crée un objet "Meal" que l'on ajoute dans le tableau $mealsObjects
        foreach($mealsList as $mealInfos){

            //Ajout du nouveau plat hydraté dans le tableau $mealsObjects
            $mealsObjects[] = $this->buildDomainObject($mealInfos);

        };

        // La méthode retourne le tableau contenant tous les plats sous form d'objets de la classe "Meal"
        return $mealsObjects;
    }

    //Fonction qui récupère toutes les entrées
    public function findEntrees()
    {
        //requete SQL pour récupérer les infos de tous les plats.
        $getMeals = $this->getDb()->query('SELECT * FROM meal WHERE type="entree"');

        //récupération des plats sous forme de tableau associatif
        $mealsList = $getMeals->fetchAll(PDO::FETCH_ASSOC);

        //création d'un nouveau tableau qui contiendra tous les objets sous forme d'objet de la classe Meal
        $mealsObjects = [];

        // Pour chaque sous tableau des plats, on crée un objet "Meal" que l'on ajoute dans le tableau $mealsObjects
        foreach($mealsList as $mealInfos){

            //Ajout du nouveau plat hydraté dans ke tableau $mealsObjects
            $mealsObjects[] = $this->buildDomainObject($mealInfos);

        };

        // La méthode retourne le tableau contenant tous les plats sous form d'objets de la classe "Meal
        return $mealsObjects;
    }

    //Fonction qui récupère tous les plats
    public function findPlats()
    {
        //requete SQL pour récupérer les infos de tous les plats.
        $getMeals = $this->getDb()->query('SELECT * FROM meal WHERE type="plat"');

        //récupération des plats sous forme de tableau associatif
        $mealsList = $getMeals->fetchAll(PDO::FETCH_ASSOC);

        //création d'un nouveau tableau qui contiendra tous les objets sous forme d'objet de la classe Meal
        $mealsObjects = [];

        // Pour chaque sous tableau des plats, on crée un objet "Meal" que l'on ajoute dans le tableau $mealsObjects
        foreach($mealsList as $mealInfos){

            //Ajout du nouveau plat hydraté dans ke tableau $mealsObjects
            $mealsObjects[] = $this->buildDomainObject($mealInfos);

        };

        // La méthode retourne le tableau contenant tous les plats sous form d'objets de la classe "Meal
        return $mealsObjects;
    }

    //Fonction qui récupère tous les desserts
    public function findDesserts()
    {
        //requete SQL pour récupérer les infos de tous les desserts.
        $getMeals = $this->getDb()->query('SELECT * FROM meal WHERE type="dessert"');

        //récupération des plats sous forme de tableau associatif
        $mealsList = $getMeals->fetchAll(PDO::FETCH_ASSOC);

        //création d'un nouveau tableau qui contiendra tous les objets sous forme d'objet de la classe Meal
        $mealsObjects = [];

        // Pour chaque sous tableau des plats, on crée un objet "Meal" que l'on ajoute dans le tableau $mealsObjects
        foreach($mealsList as $mealInfos){

            //Ajout du nouveau plat hydraté dans ke tableau $mealsObjects
            $mealsObjects[] = $this->buildDomainObject($mealInfos);

        };

        // La méthode retourne le tableau contenant tous les plats sous form d'objets de la classe "Meal
        return $mealsObjects;
    }

}