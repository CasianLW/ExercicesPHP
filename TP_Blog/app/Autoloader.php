<?php

namespace App;

class Autoloader{



    static function register(){
        spl_autoload_register(array(__CLASS__,'autoload'));
    }
/**
 * Inclue le fichier correspondant a notre classe
 * @param $class string Le nom de la classe a changer
 */
    public static function autoload($class){
        if(strpos($class, __NAMESPACE__ . '\\') === 0){
        $class = str_replace(__NAMESPACE__ . '\\' , '', $class);
        $class = str_replace('\\', '/', $class);
        require __DIR__ . '/' . $class . '.php';
        }
    }

}