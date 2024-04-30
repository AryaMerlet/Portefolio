<?php
namespace Models;

use Autoloader\Autoloader;
use Components\Interfaces\Administrable;


Autoloader::register('Models/Database');
Autoloader::register('Components\Interfaces\Administrable');

class AdminMenu implements Administrable{
    public $id_categorie;
    public $categorie;
    public $nom;

    public function __construct(array $values){
        $this->id_categorie = $values['id_categorie'];
        $this->nom = $values['nom'];
        $this->categorie = $values['categorie'];
    }
    public static function get(){
        $sql = "SELECT * FROM categories";
        return Database::preparedQuery($sql);
    }
    public static function delete(){
        if(isset($_REQUEST['id_categorie'])){
            $id_categorie = htmlentities($_REQUEST['id_categorie']);
            $sql = "DELETE FROM categories WHERE id_categorie = :id_categorie";
            Database::preparedQuery($sql,[':id_categorie' => $id_categorie]);
        }
    }
    public static function retrieve(){
        if(isset($_REQUEST['id'])){
            $id = htmlentities($_REQUEST['id']);
            $sql = "SELECT * FROM categories WHERE id_categorie = :id";
            $retrieve = Database::preparedQuery($sql, [':id' => $id]);
            return new AdminMenu($retrieve[0]);
        }
    } 
    public static function modif(){
        if(isset($_REQUEST['modifMenu'])){
            $id_categorie = htmlentities($_REQUEST['id']);
            $Nom = htmlentities($_REQUEST['nom']);
            if(self::IsNull(htmlentities($_REQUEST['parent'])) == true){
                $Categorie = null;
            }else{
                $Categorie = htmlentities($_REQUEST['parent']);
            }
            $sql = "UPDATE categories SET nom = :nom, categorie = :categorie WHERE id_categorie = :id_categorie";
            Database::preparedQuery($sql,[':nom'=>$Nom,':categorie'=>$Categorie,':id_categorie' => $id_categorie]);
        }
    }
    public static function add(){
        if(isset($_REQUEST['addMenu'])){
            $Nom = htmlentities($_REQUEST['nom']);
            if(self::IsNull(htmlentities($_REQUEST['parent'])) == true){
                $Categorie = null;
            }else{
                $Categorie = htmlentities($_REQUEST['parent']);
            }
            if(self::isExist($Nom,$Categorie) == true){
                $sql = "INSERT INTO categories(nom,categorie) VALUES (:nom, :categorie)";
                Database::preparedQuery($sql,[':nom'=>$Nom,':categorie'=>$Categorie]);
            }
        }
    }
    public static function IsNull($categorie){
        if($categorie == '')
        {
            return true;
        }else{
            return false;
        }
    }
    public static function IsExist($Nom,$Categorie){
        if($Categorie == null){
            $sql = 'SELECT COUNT(*) AS verif FROM categories WHERE nom = :nom AND categorie IS null';
            $verif = Database::preparedQuery($sql,[':nom' => $Nom]);
        }else{
            $sql = 'SELECT COUNT(DISTINCT nom,categorie) AS verif FROM categories WHERE nom = :nom AND categorie = :categorie';
            $verif = Database::preparedQuery($sql,[':nom' => $Nom,':categorie' => $Categorie]);
        }
        foreach($verif as $v){
            if($v['verif'] == 0){
                return true;
            }else{
                return false;
            }
        }
    }
}