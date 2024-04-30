<?php
namespace Components;

use Autoloader\Autoloader;
use Components\Interfaces\Affichable;
use Models\Actualite;

Autoloader::register('Models/Actualite');
Autoloader::register('Components/Interfaces/Affichable');

class AffichageArticle implements Affichable{
    public $Article;

    public function __construct() {
        $this->Article = Actualite::getArticle();
    }
        
    public function afficher(){
        $temp = Actualite::getArticle();
        foreach ($temp as $t){
            $Article = new Actualite($t); ?>
            <main>
                <section id='section'> 
                    <h2><?=$Article->titre?></h2>                
                    <h3><?=$Article->sous_titre?></h3>
                    <aside>
                        <img class="image_article" src='images/<?=$Article->image?>'/>
                        <p><?=$Article->getAuteur()?></p>
                        <p>Publié le : <?=$Article->date_publication?> Dernière modification le : <?=$Article->date_modification?></p>
                    </aside>
                    <article>
                        <p><?=$Article->article?></p>
                        <a href="<?=$Article->id_lien?>"><?=$Article->id_nom_source?></a>
                    </article>
                </section>
            </main> 
        <?php 
        }
    }
}