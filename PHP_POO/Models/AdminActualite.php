<?php
namespace Models;

use Autoloader\Autoloader;
use Components\Interfaces\Administrable;


Autoloader::register('Models/Database');
Autoloader::register('Components\Interfaces\Administrable');

class AdminActualite implements Administrable{
    public $id_actualite;
    public $titre;
    public $sous_titre;
    public $article;
    public $image;


    public function __construct(array $values){
        $this->id_actualite = $values['id_actualite'];
        $this->titre = $values['titre'];
        $this->sous_titre = $values['sous_titre'];
        $this->article = $values['article'];
        $this->image = $values['image'];
    }
    public static function get(){
        $sql = "SELECT * FROM actualites";
        return Database::preparedQuery($sql);
    }
    public static function delete(){
        if(isset($_REQUEST['id_actualite'])){
            $id_actualite = htmlentities($_REQUEST['id_actualite']);
            $sql = "DELETE FROM actualites WHERE id_actualite = :id_actualite";
            Database::preparedQuery($sql,[':id_actualite' => $id_actualite]);
        }
    }
    public static function retrieve(){
        if(isset($_REQUEST['id'])){
            $id = htmlentities($_REQUEST['id']);
            $sql = "SELECT * FROM actualites WHERE id_actualite = :id";
            $retrieve = Database::preparedQuery($sql, [':id' => $id]);
            return new AdminActualite($retrieve[0]);
        }
    } 
    public static function modif(){
        if(isset($_REQUEST['modifActualite'])){
            $id_actualite = htmlentities($_REQUEST['id']);
            $titre = htmlentities($_REQUEST['titre']);
            $sous_titre = htmlentities($_REQUEST['sous_titre']);
            $article = htmlentities($_REQUEST['article']);
            $image = htmlentities($_REQUEST['image']);
            $sql = "UPDATE actualites SET titre = :titre, sous_titre = :sous_titre, article = :article, image = :image WHERE id_actualite = :id_actualite";
            Database::preparedQuery($sql,[':titre'=>$titre,':sous_titre'=>$sous_titre,':article'=>$article,':image'=>$image,':id_actualite' => $id_actualite]);
        }
    }
    public static function add(){
        if(isset($_REQUEST['addActualite'])){
            $titre = htmlentities($_REQUEST['titre']);
            $sous_titre = htmlentities($_REQUEST['sous_titre']);
            $article = htmlentities($_REQUEST['article']);
            $image = htmlentities($_REQUEST['image']);

            if(self::isExist($titre,$sous_titre,$article,$image) == true){
                $sql = "INSERT INTO actualites (titre, sous_titre, article, image) VALUES (:titre, :sous_titre, :article, :image)";
                Database::preparedQuery($sql, [':titre' => $titre, ':sous_titre'=>$sous_titre, ':article'=>$article, ':image'=>$image]);
            }
        }
    }
    public static function IsExist($titre,$sous_titre,$article,$image){
        $sql = 'SELECT COUNT(DISTINCT titre,sous_titre,article,image) AS verif FROM actualites WHERE titre = :titre AND sous_titre = :sous_titre AND article = :article AND image = :image';
        $verif = Database::preparedQuery($sql,[':titre' => $titre,':sous_titre' => $sous_titre,':article' => $article,':image' => $image]);
        foreach($verif as $v){
            if($v['verif'] == 0){
                return true;
            }else{
                return false;
            }
        }
    }
}