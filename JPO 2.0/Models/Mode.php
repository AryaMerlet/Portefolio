<?php
namespace Models;
use Autoloader\Autoloader;

Autoloader::register('Models/Database');

class Mode {

    public static function SessionStart(){
        session_start();
        //echo "start : " . $_SESSION["Mode"];
        if(!isset($_SESSION["Mode"])) {
            // defini le mode par defaut
            $_SESSION["Mode"] = "jour";
            // $_SESSION["Request_nuit"]='';
            // $_SESSION["Request_jour"]='checked';
        }
    }
    public static function Color(){
        if(isset($_REQUEST['config'])) {
            if(isset($_REQUEST['Mode'])) {  
                return $_SESSION["Mode"]="jour";
            } else {
                return $_SESSION["Mode"]="nuit";
            }
        }
    }
}