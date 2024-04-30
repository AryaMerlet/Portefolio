<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\AdminMenu;

Autoloader::register('Models/AdminMenu');
Autoloader::register('Components/Interfaces/Affichable');
AdminMenu::delete();
AdminMenu::modif();
AdminMenu::add();


class AffichageAdminMenu implements Affichable{
    public function afficher(){?>
        <table border=1>
            <tr>
                <td>Nom</td>
                <td>Parent</td>
            </tr> 
            <?php
            $temp = AdminMenu::get();
            foreach($temp as $t){
                $tableau = new AdminMenu($t);
                ?>
                <tr>
                    <td><?= $tableau->nom;?></td>
                    <td><?=self::afficherTableauCategorie($tableau);?></td>
                    <td><?=self::afficherTableauForm($tableau);?></td>
            <?php } ?>
        </table>  
                    <form action="add_AdminMenu.php" method="post">
                        <input type="hidden" name="nom" value="' . $r['nom'] . '">
                        <input type="submit" class="add-btn delete-btn" value="➕">
                    </form>
                    <a href="index.php">retour sur le site</a>
            <?php 
            }
        
    public function afficherTableauCategorie($tableau){
        if($tableau->categorie==null){
            echo "aucun";
        } else{
            echo $tableau->categorie;
        }
    }
    public function afficherTableauForm($tableau){?>
            <td>
                <form action="page_Admin.php" method="post">
                    <input type="hidden" name="id_categorie" value="<?=$tableau->id_categorie?>">
                    <input type="submit" value="🗑️">
                </form>
            </td>
            <td>
                <form action="modifier_AdminMenu.php?id=<?=$tableau->id_categorie?>" method="post">
                    <input type="hidden" name="nom" value="<?=$tableau->id_categorie?>">
                    <input type="submit" value="✏️">
                </form>
            </td>
        </tr>

<?php
    }
}