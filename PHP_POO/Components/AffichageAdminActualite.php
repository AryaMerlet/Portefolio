<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\AdminActualite;

Autoloader::register('Models/AdminActualite');
Autoloader::register('Components/Interfaces/Affichable');
AdminActualite::delete();
AdminActualite::modif();
AdminActualite::add();


class AffichageAdminActualite implements Affichable{
    public function afficher(){?>
        <table border=1>
            <tr>
                <td>Titre</td>
                <td>Sous-titre</td>
                <td>Article</td>
                <td>image</td>
            </tr> 
            <?php
            $temp = AdminActualite::get();
            foreach($temp as $t){
                $tableau = new AdminActualite($t);
                ?>
                <tr>
                    <td><?= $tableau->titre;?></td>
                    <td><?= $tableau->sous_titre;?></td>
                    <td><?= $tableau->article;?></td>
                    <td><?= $tableau->image;?></td>

                    <td><?=self::afficherTableauForm($tableau);?></td>
            <?php } ?>
        </table>  
                    <form action="add_adminActualite.php" method="post">
                        <input type="hidden" name="nom" value="' . $r['nom'] . '">
                        <input type="submit" class="add-btn delete-btn" value="➕">
                    </form>
                    <a href="index.php">retour sur le site</a>
            <?php 
            }
    public function afficherTableauForm($tableau){?>
            <td>
                <form action="page_admin.php" method="post">
                    <input type="hidden" name="id_actualite" value="<?=$tableau->id_actualite?>">
                    <input type="submit" value="🗑️">
                </form>
            </td>
            <td>
                <form action="modifier_adminActualite.php?id=<?=$tableau->id_actualite?>" method="post">
                    <input type="hidden" name="nom" value="<?=$tableau->id_actualite?>">
                    <input type="submit" value="✏️">
                </form>
            </td>
        </tr>

<?php
    }
}