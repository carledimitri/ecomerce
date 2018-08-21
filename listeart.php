<?php  
require('header.php'); 

$produit = $DB->query('SELECT * FROM produit');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
</head>
<body>
	
     <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">LISTE ARTICLE</h1>
        </div>
    </section>
    <div class="container">
    	<table class="hover order-column row-border " id="example" style="width:100%;">
            <thead>
                <tr>
                    <th>id_produit</th>
                    <th></th>
                    <th>Nom_produit</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                 <?php foreach( $produit as $produits =>$value ): ?>
                <tr class="row-border">
                    <td><?= $value->idProduit;?></td>
                    <td><img class="card-img-top"  style="width: 160px;" src=<?= $value->imageProduit;?> ></td>
                    <td><?= $value->nomProduit;?></td>
                    <td><?= $value->descriProduit;?></td>
                    <td><?= $value->prixUnitaire;?></td>
                    <td><?= $value->qteStock;?></td>
                </tr>
                <?php endforeach ; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Nom_produit</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Stock</th>
                </tr>
            </tfoot>
        </table>
    </div>
	<?php require "footer.php";?>
    <script type="text/javascript">
    	$(document).ready(function() {
    $('#example').DataTable();
} );
    </script>    
</body>
</html>