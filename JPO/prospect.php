<?php 

include_once('base_donnee.php');

class Prospect extends Database{
    public $id_prospect;
    public $prenom;
    public $nom;
    public $email;
    public $tel;
    public $adresse;
    public $ville;
    public $code_postal;
    public $formation;
    public $formation_option;
    public $formation_alternance;
    public $projet;
    public $note_prive;
    public $pre_inscrit;
    public $niveau_etude;
    public $decouverte_IIA;
    public $heure_enregistrement;

    public function __construct(array $values){
        $this->id_prospect = $values['id_prospect'];
        $this->prenom = $values['prenom'];
        $this->nom = $values['nom'];
        $this->email = $values['email'];
        $this->tel = $values['tel'];
        $this->adresse = $values['adresse'];
        $this->ville = $values['ville'];
        $this->code_postal = $values['code_postal'];
        $this->formation = $values['formation'];
        $this->formation_option = $values['formation_option'];
        $this->formation_alternance = $values['formation_alternance'];
        $this->projet = $values['projet'];
        $this->note_prive = $values['note_prive'];
        $this->pre_inscrit = $values['pre_inscrit'];
        $this->niveau_etude = $values['niveau_etude'];
        $this->decouverte_IIA = $values['decouverte_IIA'];
        $this->heure_enregistrement = $values['heure_enregistrement'];

    }
    public function insert(){
        $query = "INSERT INTO prospect (prenom, nom, email, tel, adresse, ville, code_postal, formation, formation_option, formation_alternance, projet, note_prive, pre_inscrit, niveau_etude, decouverte_IIA, heure_enregistrement) VALUES (:prenom, :nom, :email, :tel, :adresse, :ville, :code_postal, :formation, :formation_option, :formation_alternance, :projet, :note_prive, :pre_inscrit, :niveau_etude, :decouverte_IIA, :heure_enregistrement)";
    }
}