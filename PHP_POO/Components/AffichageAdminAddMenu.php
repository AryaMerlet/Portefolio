<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;

Autoloader::register('Models/Admin');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageAdminAddMenu implements Affichable{
    public function afficher(){;?>
        <form action="page_admin.php?">
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" placeholder="Nom" required>
        <label for="parent">Parent : </label>
        <input type="text" name="parent" id="parent" placeholder="">
        <input type="submit" name="addMenu"></input>
        <br/><br/>
        <a href="page_admin.php">Retour</a>
    </form>
    <?php
    }
}