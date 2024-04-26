<?php
namespace Components;

require_once ('Autoloader.php');
use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Components\AffichageMenu;

Autoloader::register('Components/Interfaces/Affichable');
Autoloader::register('Components/AffichageMenu');
        

class AffichageHeader implements Affichable{
        
    public function afficher(){?>
        <a href="index.php"><img src="images_mep/logo.png" alt="" id="logo" href="home.php"/></a>
        <p id="marque">Axis</p>
        <div id="navbar">
            <?php        
            $menu = new AffichageMenu();
            $menu->afficher();
            ?>
        <p id='barre'></p>
        <?php
    }
}