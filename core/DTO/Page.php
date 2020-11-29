<?php

namespace App\DTO;

use \Exception;
use \JsonSerializable; //permettant le transfert d'objets php vers le json

/**
 * Classe DTO matérialisants les pages de la carte du menu
 */
class Page  implements JsonSerializable
{
    protected $id;
    protected $type;
    protected $title;
    protected $content;

    /**
    * Getters
    */
    public function getId()
    {
        return $this->id;
    }
    public function getType()
    {
        return $this->type;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function getContent()
    {
        return $this->content;
    }
    

    /**
     * Setters
     */
    public function setId(int $id)
    {
        if (!preg_match('/^[1-9][0-9]{0,10}$/', $id)) {
            throw new Exception('L\'id doit être valide');
        }

        $this->id=$id;
    }

    public function setType(string $type)
    {
        if (!preg_match('/^.{3,20}$/', $type)) {
            throw new Exception('Le type doit être valide');
        }

        $this->type=$type;
    }

    public function setTitle(string $title)
    {
        if (!preg_match('/^.{3,100}$/', $title)) {
            throw new Exception('Le titre doit être valide');
        }

        $this->title=$title;
    }

    public function setContent(string $content)
    {
        if (mb_strlen($content) > 2000 || mb_strlen($content) < 3 ) {
            throw new Exception('Le contenu doit contenir entre 3 et 2 000 caractères');
        }

        $this->content=$content;
    }

    public function jsonSerialize() //fonction pour permettant le transfert d'objets php vers le json
    {
        return 
        [
            'id'   => $this->getId(),
            'type' => $this->getType(),
            'title' => $this->getTitle(),
            'content' => $this->getContent()
        ];
    }

}
