<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\Mode;

Autoloader::register('Models/Mode');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageMode implements Affichable{
    public $mode;
    public function __construct(){
        $this->mode = Mode::Color();
    }
    public function afficher() {
        return $this->mode;
    }
}