<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\Menu;

Autoloader::register('Models/Menu');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageMenu implements Affichable{
    public $Menu;

    public function __construct() {
        $this->Menu = Menu::getMenu();
    }
        
    public function afficher(){
        $temp = Menu::getMenu();
        foreach ($temp as $t){
            $menu = new Menu($t) ?>
            <p class="nav"><?=$menu->nom?>
            <?php
            $res = Menu::getSousMenu($menu->nom); 
            foreach($res as $r){ ?>
                <a href="<?=$r['nom']?>.php"><?=$r['nom']?></a></p>
            <?php }
            }?>
    </div>
<?php
    }
}