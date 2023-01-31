<?php

// Classe représentant le login pour  un commerce
class Utilisateur {
	// Attributs
	private $id;
	private $nomUtilisateur;
	private $motPasse;

	// Constructeur
	public function __construct($id,$nomUtilisateur,$motPasse){
		$this->id=$id;
		$this->nomUtilisateur=$nomUtilisateur;
		$this->motPasse=$motPasse;
	}
	
	// Accesseurs et mutateurs
	public function getId() {return $this->id;}
	public function getNomUtilisateur() {return $this->nomUtilisateur;}
	public function getMotPasse() {return $this->motPasse;}

	// Autres méthodes
	public function verifierMotPasse($motAVerifier) { return $this->motPasse == $motAVerifier; }
	
	// Affichage
	public function __toString(){
		$message=$this->nomUtilisateur;
		return $message;
	}
}
?>






