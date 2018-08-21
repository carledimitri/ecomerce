<?php 
/**
 * 
 */
class panier
{
	private $DB;

  public function __construct($DB)
	{
		if (!isset($_SESSION['panier'])) {
			session_start();		
		}
		
		if (!isset($_SESSION['panier'])) {
			$_SESSION['panier']=array();
		}
		$this->DB=$DB;
		if (isset($_GET['delpanier'])) {
			$this->del($_GET['delpanier']);
		}
		if (isset($_POST['panier']['quantity'])) {
			$this->recalc();
		}
	}

	public function recalc(){
		$_SESSION['panier']=$_POST['panier']['quantity'];
	}

	public function count(){
	  return array_sum($_SESSION['panier']);
	}

	public function total(){
		$total=0;
		 $ids=array_keys($_SESSION['panier']);
  
   if (empty($ids)) {
     $produit=array();
   }else{
       $produit = $this->DB->query('SELECT idProduit,prixUnitaire FROM produit WHERE idProduit IN('.implode(',',$ids).')');
   }
		foreach ($produit as $produit) {
			$total+=$produit->prixUnitaire * $_SESSION['panier'][$produit->idProduit];
			
		}
		return $total;
	}

	public function add($product_id){
		if (isset($_SESSION['panier'][$product_id])) {
			$_SESSION['panier'][$product_id]++;
		}else{
			$_SESSION['panier'][$product_id]=1;
		}
		
	}

	public function del($product_id){
		unset($_SESSION['panier'][$product_id]);
	}
}
 ?>