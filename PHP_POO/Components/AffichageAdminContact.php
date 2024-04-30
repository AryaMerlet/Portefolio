<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\AdminContact;

Autoloader::register('Models/AdminContact');
Autoloader::register('Components/Interfaces/Affichable');
AdminContact::delete();
AdminContact::modif();
AdminContact::add();


class AffichageAdminContact implements Affichable{
    public function afficher(){?>
        <table border=1>
            <tr>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Mail</td>
                <td>Motif</td>
            </tr> 
            <?php
            $temp = AdminContact::get();
            foreach($temp as $t){
                $tableau = new AdminContact($t);
                ?>
                <tr>
                    <td><?= $tableau->nom_contact;?></td>
                    <td><?= $tableau->prenom_contact;?></td>
                    <td><?= $tableau->mail_contact;?></td>
                    <td><?= $tableau->motif;?></td>
                    <td><?=self::afficherTableauForm($tableau);?></td>
            <?php } ?>
        </table>  
                    <form action="add_AdminContact.php" method="post">
                        <input type="hidden" name="nom" value="' . $r['nom'] . '">
                        <input type="submit" class="add-btn delete-btn" value="➕">
                    </form>
                    <a href="index.php">retour sur le site</a>
            <?php 
            }
    public function afficherTableauForm($tableau){?>
            <td>
                <form action="page_Admin.php" method="post">
                    <input type="hidden" name="id_contact" value="<?=$tableau->id_contact?>">
                    <input type="submit" value="🗑️">
                </form>
            </td>
            <td>
                <form action="modifier_AdminContact.php?id=<?=$tableau->id_contact?>" method="post">
                    <input type="hidden" name="nom" value="<?=$tableau->id_contact?>">
                    <input type="submit" value="✏️">
                </form>
            </td>
        </tr>

<?php
    }
}