<?php

include_once 'Etiquette.php';


class Categorie extends Etiquette
{ 
    public function __construct(){}

    public static function instanceNameDescription(string $name,string $description){
        $instance = new self();

        $instance->name = $name;
        $instance->description = $description;

        return $instance;
    }

    public function __toString() {
        return parent::__toString();
    }

}