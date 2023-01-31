<?php

 // *****************************************************************************************
	// Description   : Contrôleur spécifique pour l'action de choisirProduit qui s'occupe de chercher
	//                 un produit selon critère de recherche
    // Date        : 27 novembre 2021
	// Auteur      : Dini Ahamada
    // *****************************************************************************************
  	include_once("controleurs/controleur.abstract.class.php");
	include_once("modele/DAO/ProduitDAO.class.php");
    class ChercherProduit extends Controleur{
        	// ******************* Attributs
		private $tabProduits;
		
		// ******************* Constructeur vide
		public function __construct() {
			parent::__construct();
			$this->tabProduits=array();
		}
		

        public function executerAction()
        {
            //Vérifiez si le formulaire contenant les Infos Produit est bien soumis
         
            
            if(ISSET($_POST['recherche'])){
                //Vérifier si le typeRecherche est parDescription
                if ($_POST['typeRecherche']=='parDescription') {
                    # code...
                    $filtre="WHERE description LIKE '%".$_POST['recherche']."%'";
					$this->tabProduits=ProduitDAO::chercherAvecFiltre($filtre);	
                } else {
                      //Si le typeRecherche est par code
                    # code...
                    $unCode = $_POST['recherche'];
                    $unProduit = ProduitDAO::chercher($unCode);
                    if($unProduit!=null){
                        array_push($this->tabProduits,$unProduit);
                    }

                }
                
                return "pageChercherProduit";   
            }else{
                
                header("Location: ."); 
            }
            //retourner la pageChoisirProduit
        }
        		// ******************* Accesseurs
		public function getTabProduits(){
			return $this->tabProduits;
		}

   }

?>