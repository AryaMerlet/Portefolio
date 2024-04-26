<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\AdminActualite;

Autoloader::register('Models/AdminActualite');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageAdminModifActualite implements Affichable{
    public function afficher(){
        $retrieve = AdminActualite::retrieve();?>
        <form action="page_admin.php">
        <label for="titre">titre : </label>
        <input type="textarea" rows="5" cols="30" name="titre" id="titre" placeholder="titre" value="<?=$retrieve->titre?>" required>
        <label for="nom">sous_titre : </label>
        <input type="textarea" rows="5" cols="30" name="sous_titre" id="sous_titre" placeholder="sous_titre" value="<?=$retrieve->sous_titre?>" required>
        <label for="parent">article : </label>
        <input type="textarea" rows="5" cols="30" name="article" id="article" value="<?=$retrieve->article?>" placeholder="">
        <label for="nom">image : </label>
        <input type="file" name="image" id="image" placeholder="Nom" value="<?=$retrieve->image?>" required>
        <input type="hidden" name="id" value="<?=$retrieve->id_actualite?>">
        <input type="submit" name="modifActualite"></input>
        <br/><br/>
        <a href="page_admin.php">Retour</a>
    </form>
    <?php
    }
}