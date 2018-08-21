<?php  
 
require('db.class.php');
require('panier.class.php');
$json = array('error' => true);
$DB = new DB();
$panier = new panier($DB);
if (isset($_GET['del'])) {
	$panier->del($_GET['del']);
}
if (isset($_GET['idProduit'])) {
	$product=$DB->query('SELECT idProduit FROM produit WHERE idProduit=:id',array('id'=> $_GET['idProduit']));
	
	if (empty($product)) {
		$json['message'] = "Ce produit n''existe pas";
	}
	
	$panier->add($product[0]->idProduit);
	$json['error']=false;
	$json['total']=$panier->total();
	$json['message'] = 'le produit a bien ete ajoute ';
}else{
	$json['message']="vous n'avez selectionner aucun produit";
}
echo json_encode($json);
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<title></title>
 </head>
 <body>
 	<?php require('header.php');  ?>
 	<div class="container">
		
 		

 		
 	</div>
 	</br>
 	<?php require'footer.php' ?>
 </body>
 </html>