<?php
namespace Models;

use Autoloader\Autoloader;
use Components\Interfaces\Administrable;


Autoloader::register('Models/Database');
Autoloader::register('Components/Interfaces/Administrable');

class AdminContact implements Administrable{
    public $id_contact;
    public $nom_contact;
    public $prenom_contact;
    public $mail_contact;
    public $motif;

    public function __construct(array $values){
        $this->id_contact = $values['id_contact'];
        $this->nom_contact = $values['nom_contact'];
        $this->prenom_contact = $values['prenom_contact'];
        $this->mail_contact = $values['mail_contact'];
        $this->motif = $values['motif'];
    }
    public static function get(){
        $sql = "SELECT * FROM contacts";
        return Database::preparedQuery($sql);
    }
    public static function delete(){
        if(isset($_REQUEST['id_contact'])){
            $id_contact = htmlentities($_REQUEST['id_contact']);
            $sql = "DELETE FROM contacts WHERE id_contact = :id_contact";
            Database::preparedQuery($sql,[':id_contact' => $id_contact]);
        }
    }
    public static function retrieve(){
        if(isset($_REQUEST['id'])){
            $id = htmlentities($_REQUEST['id']);
            $sql = "SELECT * FROM contacts WHERE id_contact = :id";
            $retrieve = Database::preparedQuery($sql, [':id' => $id]);
            return new AdminContact($retrieve[0]);
        }
    } 
    public static function modif(){
        if(isset($_REQUEST['modifContact'])){
            $id_contact = htmlentities($_REQUEST['id']);
            $Nom = htmlentities($_REQUEST['nom']);
            $Prenom = htmlentities($_REQUEST['prenom']);
            $Mail = htmlentities($_REQUEST['mail']);
            $Motif = htmlentities($_REQUEST['motif']);
            $sql = "UPDATE contacts SET nom_contact = :nom, prenom_contact = :prenom, mail_contact = :mail, motif = :motif WHERE id_contact = :id_contact";
            Database::preparedQuery($sql,[':nom'=>$Nom,':prenom'=>$Prenom,':mail'=>$Mail,':motif'=>$Motif,':id_contact' => $id_contact]);
        }
    }
    public static function add(){
        if(isset($_REQUEST['addContact'])){
            $Nom = htmlentities($_REQUEST['nom']);
            $prenom = htmlentities($_REQUEST['prenom']);
            $Mail = htmlentities($_REQUEST['mail']);
            $Motif = htmlentities($_REQUEST['motif']);
            if(self::isExist($Nom,$prenom,$Mail,$Motif) == true){
                $sql = "INSERT INTO contacts(nom_contact,prenom_contact,mail_contact,motif) VALUES (:nom,:prenom,:mail,:motif)";
                Database::preparedQuery($sql,[':nom'=>$Nom,':prenom'=>$prenom,':mail'=>$Mail,':motif'=>$Motif]);
            }
        }
    }
    public static function IsExist($Nom,$Prenom,$Mail,$Motif){
            $sql = 'SELECT COUNT(DISTINCT nom_contact,prenom_contact,mail_contact,motif) AS verif FROM contacts WHERE nom_contact = :nom AND prenom_contact = :prenom AND mail_contact = :mail_contact AND motif = :motif';
            $verif = Database::preparedQuery($sql,[':nom' => $Nom,':prenom' => $Prenom,':mail_contact' => $Mail,':motif' => $Motif]);
        foreach($verif as $v){
            if($v['verif'] == 0){
                return true;
            }else{
                return false;
            }
        }
    }
}