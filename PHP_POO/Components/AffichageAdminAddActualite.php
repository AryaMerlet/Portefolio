<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;

Autoloader::register('Models/AdminActualite');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageAdminAddActualite implements Affichable{
    public function afficher(){?>
        <form action="page_admin.php">
        <label for="titre">titre : </label>
        <input type="text" name="titre" id="titre" placeholder="titre"  required>
        <label for="nom">sous_titre : </label>
        <input type="text" name="sous_titre" id="sous_titre" placeholder="sous_titre" required>
        <label for="parent">article : </label>
        <input type="text" name="article" id="article" placeholder="">
        <label for="nom">image : </label>
        <input type="file" name="image" id="image" placeholder="Nom" required>
        <input type="hidden" name="id">
        <input type="submit" name="modifActualite"></input>
        <br/><br/>
        <a href="page_admin.php">Retour</a>
    </form>
    <?php
    }
}