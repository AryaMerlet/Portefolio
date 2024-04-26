<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;

Autoloader::register('Models/Contact');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageContact implements Affichable{
        
    public function afficher(){
        ?>
        <div class="label_home">
        <form action="index.php" onChange=notif() method="post">
            <div class="label_box">
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="prenom" placeholder="Prenom" required />
            </div>
            <div class="label_box">
                <label for="nom">Nom : </label>
                <input type="text" name="nom" id="nom" placeholder="Nom" required />
            </div>
            <div class="label_box">
                <label for="email">Email : </label> 
                <input type="text" name="email" id="email" placeholder="exemple@gmail.com" required />
            </div>
            <div class="label_box_projet">
                <label for="motif">Raison de votre demande : </label>
                <textarea name="motif" id="motif" ></textarea>
            </div>
                <input type="submit" name="soumettre" value="enregistrer" />
        </form>
    </div><?php
    }
}