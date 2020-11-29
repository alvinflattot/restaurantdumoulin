<?php

namespace App\DTO;

use \Exception;
use \JsonSerializable;

/**
 * Classe DTO matérialisants les plats du site
 */
class Meal  implements JsonSerializable
{
    protected $id;
    protected $type;
    protected $content;
    protected $price;

    // public function __construct(array $data) 
    // {
    //     $this->id = $data['id'];
    //     $this->type = $data['type'];
    //     $this->content = $data['content'];
    //     $this->price = $data['price'];
    // }

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
    public function getContent()
    {
        return $this->content;
    }
    public function getPrice()
    {
        return $this->price;
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

    public function setContent(string $content)
    {
        if (!preg_match('/^.{0,1000}$/', $content)) {
            throw new Exception('Le contenu doit être valide');
        }

        $this->content=$content;
    }
    
    public function setPrice(string $price)
    {
        if (!preg_match('/^[1-9]?[0-9][.,]?[0-9]{0,2}$/', $price)) {
            throw new Exception(' doit être valide');
        }

        $this->price=$price;
    }

    public function jsonSerialize()
    {
        return 
        [
            'id'   => $this->getId(),
            'type' => $this->getType(),
            'content' => $this->getContent(),
            'price' => $this->getPrice()
        ];
    }

}
