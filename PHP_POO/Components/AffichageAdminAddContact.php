<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;

Autoloader::register('Models/AdminContact');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageAdminAddContact implements Affichable{
    public function afficher(){?>
        <form action="page_admin.php">
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" placeholder="Nom" required>
        <label for="nom">Prenom : </label>
        <input type="text" name="prenom" id="prenom" placeholder="prenom" required>
        <label for="parent">Mail : </label>
        <input type="text" name="mail" id="mail" placeholder="" required>
        <label for="nom">Motif : </label>
        <input type="text" name="motif" id="motif" placeholder="Nom" required>
        <input type="hidden" name="id">
        <input type="submit" name="addContact"></input>
        <br/><br/>
        <a href="page_admin.php">Retour</a>
    </form>
    <?php
    }
}