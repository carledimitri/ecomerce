 <?php require('header.php');?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <!-- Site meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Free Bootstrap 4 Ecommerce Template</title>
    <!-- CSS -->
   
</head>
<body >


   
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">PANIER</h1>
         </div>
    </section>
    <form method="POST" action="panier.php">
    <div class="container mb-4">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col"> </th>
                                <th scope="col">Nom Produit</th>
                                <th scope="col">stock</th>
                                <th scope="col" class="text-center">Quantity</th>
                                <th scope="col" class="text-right">Prix</th>
                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                $ids=array_keys($_SESSION['panier']);
        
                                if (empty($ids)) {
                                     $produit=array();
                                    }else{
                                    $produit = $DB->query('SELECT * FROM produit WHERE idProduit IN('.implode(',',$ids).')');
                                     }

                                ?>
                                <?php foreach( $produit as $produits =>$value ): ?>
                                <td><img class="card-img-top" style="width: 160px;" src="<?= $value->imageProduit;?>" /> </td>
                                <td><?= $value->nomProduit;?></td>
                                <td>in stock <?= $value->qteStock;?></td>
                                 <td><span class="quantity"><input class="form-control" type="text" name="panier[quantity][<?= $value->idProduit;?>]" value="<?= $_SESSION['panier'][$value->idProduit];?>"></span></td>
                                
                                <td class="text-right"><?= $value->prixUnitaire;?> €</td>
                               
                                <td><a href="panier.php?delpanier=<?= $value->idProduit;?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            <?php endforeach ; ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>TVA</td>
                                <td class="text-right">0,99 €</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td class="text-right"><strong><?=$panier->total();?> €</strong></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td><strong>Total TTC</strong></td>
                                <td class="text-right"><strong><?= $panier->total()*0.99;?> €</strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col mb-2">
                <div class="row">
                    <div class="col-sm-12  col-md-6">
                       <button class="btn btn-block btn-light"> <a href="index.php">Continue Shopping</a></button>
                    </div>
                     <div class="col-sm-12 col-md-6 text-right">
                        <button type="submit" value="Recalculer" class="btn btn-lg btn-block btn-warning text-uppercase">Reccalculer</button>
                    </div>
                    <div class="col-sm-12 col-md-6 text-right">
                        <button class="btn btn-lg btn-block btn-warning text-uppercase"><a href="commande.php">Checkout</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Footer -->
<?php require"footer.php";  ?>

</body>
</html>
