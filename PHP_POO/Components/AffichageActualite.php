<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\Actualite;

Autoloader::register('Models/Actualite');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageActualite implements Affichable{
    public $actualite;

    public function __construct() {
        $this->actualite = Actualite::getActualite();
    }
        
    public function afficher(){
        $temp = Actualite::getActualite();
        foreach ($temp as $t){
            $actualite = new Actualite($t);?>
            <div>
            <a href='article.php?id=<?=$actualite->id_actualite?>'>
                <img class='miniature' src='images/<?=$actualite->image?>'/>
                <p onload='calculMiseEnLigne()'><?=$actualite->date_modification?></p>
                <p><?=$actualite->titre?></p>
            </a>
        </div><?php
        }
    }
}