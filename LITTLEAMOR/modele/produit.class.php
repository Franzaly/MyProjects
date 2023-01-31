<?php

// Classe représentant un produit pour vente dans un commerce
class Produit {
	// Attributs
	private $code;
	private $description;
	private $urlPhoto;
	private $prix;
	private $quantite;
	private $categorie;
	private Cart $cart;
	

	// Constructeur
	public function __construct($code,$desc, $url,$prix, $cate, $qte=0, Cart $cart = null){
		$this->code=$code;
		$this->description=$desc;
		$this->urlPhoto=$url;
		$this->prix=$prix;
		$this->quantite=$qte;
		$this->categorie=$cate;
		if ($cart === null) {
			$this->cart = new Cart(null,null,null);
		}else{
			$this->cart = $cart;
		}
	}
	
	// Accesseurs et mutateurs
	public function getCode() {return $this->code;}
	public function getDescription() {return $this->description;}
	public function getUrlPhoto() {return $this->urlPhoto;}
	public function getPrix() {return $this->prix;}
	public function getQuantite() {return $this->quantite;}
	public function getCategorie() {return $this->categorie;}
	public function getCart() {return $this->cart;}
	public function setDescription($valeur) {$this->description=$valeur;}
	public function setUrlPhoto($valeur) {$this->photo=$valeur;}
	public function setPrix($valeur) {$this->prix=$valeur;}
	public function setCategorie($valeur) {$this->categorie=$valeur;}

	// Autres méthodes
	public function ajouterAuStock($quantiteAjoutee) {
		$this->quantite+=$quantiteAjoutee;
	}
	public function enleverDuStock($quantiteEnlevee) {
		$this->quantite-=$quantiteEnlevee;
	}
	public function changer_prix_pct($pourcentage) {
		$changement=$pourcentage/100.0*$this->prix;
		$this->prix+=$changement;
	}
	
	// Affichage
	public function __toString(){
		$message="[#".$this->code."] ".$this->description." - ";
		$message.=" @".round($this->prix,2)."$ (".$this->quantite." en stock)";
		return $message;
	}
}
?>






