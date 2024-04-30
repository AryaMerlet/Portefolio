<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\AdminContact;

Autoloader::register('Models/AdminContact');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageAdminModifContact implements Affichable{
    public function afficher(){
        $retrieve = AdminContact::retrieve();?>
        <form action="page_admin.php">
        <label for="nom">Nom : </label>
        <input type="text" name="nom" id="nom" placeholder="Nom" value="<?=$retrieve->nom_contact?>" required>
        <label for="nom">Prenom : </label>
        <input type="text" name="prenom" id="prenom" placeholder="prenom" value="<?=$retrieve->prenom_contact?>" required>
        <label for="parent">Mail : </label>
        <input type="text" name="mail" id="mail" value="<?=$retrieve->mail_contact?>" placeholder="">
        <label for="nom">Motif : </label>
        <input type="text" name="motif" id="motif" placeholder="Nom" value="<?=$retrieve->motif?>" required>
        <input type="hidden" name="id" value="<?=$retrieve->id_contact?>">
        <input type="submit" name="modifContact"></input>
        <br/><br/>
        <a href="page_admin.php">Retour</a>
    </form>
    <?php
    }
}