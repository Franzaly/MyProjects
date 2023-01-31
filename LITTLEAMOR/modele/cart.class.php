<?php

// Classe représentant le login pour  un commerce
class Cart {
	// Attributs
	private $id;
	private $produit_code;
    private $utilisateur_id;
	

    
	// Constructeur
	public function __construct($id,$produit_code,$utilisateur_id){
        $this->id=$id;
		$this->produit_code=$produit_code;
		$this->utilisateur_id=$utilisateur_id;
	}
	
	// Accesseurs et mutateurs
    public function getId() {return $this->id;}
	public function getProduit_code() {return $this->produit_code;}
	public function getUtilisateur_id() {return $this->utilisateur_id;}
	// Accesseurs et mutateurs
	public function getCode() {return $this->code;}
	public function getDescription() {return $this->description;}
	public function getUrlPhoto() {return $this->urlPhoto;}
	public function getPrix() {return $this->prix;}
	public function getQuantite() {return $this->quantite;}
	public function getCategorie() {return $this->categorie;}
	


	
	// Affichage
	public function __toString(){
		$message=$this->produit_code;
		return $message;
	}
}
?>






