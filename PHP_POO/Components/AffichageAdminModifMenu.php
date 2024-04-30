<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\AdminMenu;

Autoloader::register('Models/AdminMenu');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageAdminModifMenu implements Affichable{
    public function afficher(){
        $retrieve = AdminMenu::retrieve();?>
        <form action="page_admin.php">
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" placeholder="Nom" value="<?=$retrieve->nom?>" required>
        <label for="parent">Parent : </label>
        <input type="text" name="parent" id="parent" value="<?=$retrieve->categorie?>" placeholder="">
        <input type="hidden" name="id" value="<?=$retrieve->id_categorie?>">
        <input type="submit" name="modifMenu"></input>
        <br/><br/>
        <a href="page_admin.php">Retour</a>
    </form>
    <?php
    }
}