<?php


include_once 'Etiquette.php';

class Tag extends Etiquette
{
    private string $logo;


    public function __construct()
    {
        parent::__construct();
    }
    public function setLogo(string $logo): void 
    {
        $this->logo = $logo;
    }
    public function getLogo(): string 
    {
        return $this->logo;
    }

    public static function instanceWithNameAndDescriptionAndLogo($name, $description, $logo) {
        $instance = new self();
    
        $instance->name = $name;
        $instance->description = $description;
        $instance->logo = $logo;

        return $instance;
    }


    public function __toString()
    {
        return parent::__toString() . " , logo: " .$this->logo;
    }
}