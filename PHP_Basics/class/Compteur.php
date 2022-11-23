<?php

class Compteur{
    const INCREMENT = 1;




// private = accessible que dans la classe
    // private $fichier;
// public = accessible ici et aux classes enfants
    // public $fichier;
// protected = accessible que dans la classe
    protected $fichier;



    public function __construct(string $fichier)
    {
        $this->fichier = $fichier;
    }

    public function incrementer():void
    {
        $compteur = 1;
        if (file_exists($this->fichier)){
            // si le fichier existe, on incremente
            $compteur = (int)file_get_contents($this->fichier);
            // $compteur+= self::INCREMENT;
            $compteur+= static::INCREMENT;

        }
        file_put_contents($this->fichier,$compteur);
    }

    public function recuperer(): int
    {
        if (!file_exists($this->fichier)){
            return 0;
        }
        return file_get_contents($this->fichier);
    }
}