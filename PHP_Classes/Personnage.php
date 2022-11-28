<?php 

class Personnage {
    private static $maxvie = 100;
    // ou
    const MAX_VIE = 100;

    private $vie = 80;
    private $atk = 20;
    private $nom;

    public function __construct($nom)
    {
        $this->nom = $nom;
    }
// getters
    public function getNom(){
        return $this->nom;
    }
    public function getVie(){
        return $this->vie;
    }
    public function getAtk(){
        return $this->atk;
    }
    // setters
    public function setNom($nom){
    $this->nom = $nom;
    }
    public function setVie($vie){
    $this->vie = $vie;
    }
    public function setAtk($atk){
    $this->atk = $atk;
    }



    public function crier(){
        echo 'LEROY JENKINS';
    }
    public function regenerer($vie = null){
        if(is_null($vie)){
            $this->vie = self::MAX_VIE;
        }else{
        $this->vie += $vie;
        }
    }
    public function mort(){
        // if($this->vie <= 0){
        //     var_dump("le personnage est mort");
        // } else{
        //     var_dump("le personnage est en vie");
        // }
        return $this->vie <= 0;
    }
    private function empecher_negatif(){
        if($this->vie < 0){
            $this->vie = 0;
        }
    }
    public function attaque($cible){
        $cible->vie -= $this->atk;
        $cible->empecher_negatif();
    }
}