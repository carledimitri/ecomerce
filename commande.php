<?php require_once('header.php');?>
<br>
<br>
<br>
 <section class="jumbotron text-center">
          <div class="container">
              <h1 class="jumbotron-heading">Commande</h1>
           </div>
      </section>
<form method="POST" action="card.php">
	<div class="row">
	<div class="col-md-3"></div>
	 	<div  class="col-md-6">
			<div class="container">
				<table class="table table-hover">
				  <thead>
				    <tr>
				      <th scope="col">Nom produit</th>
				      <th scope="col">quantite</th>
				      <th scope="col">Prix</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php 
                      $ids=array_keys($_SESSION['panier']);
        
                      if (empty($ids)) {
                      $produit=array();
                      }else{
                      	$produit = $DB->query('SELECT * FROM produit WHERE idProduit IN('.implode(',',$ids).')');
                         }

                    ?>
                   <?php foreach( $produit as $produits =>$value ): ?>
				    <tr class="table-light">
				      <td><?=$value->nomProduit;?></td>
				      <td>
						<div class="form-group">	   
						<input class="form-control" id="disabledInput" type="text"  disabled="" name="panier[quantity][<?= $value->idProduit;?>]" value="<?= $_SESSION['panier'][$value->idProduit];?>">
						</div></td>
				      <td><?=$value->prixUnitaire;?></td>
				    </tr>
				   <?php endforeach ; ?>
				   <tr>
                      <td></td>
                      <td></td>
                      <td><strong>Total TTC</strong></td>
                      <td class="text-right"><strong><?= $panier->total()*0.99;?> €</strong></td>
                   </tr>
				  </tbody>
			 	</table> 
			 	<button   class="btn btn-warning btn-lg btn-block" type="submit">commander</button>
	  	   </div>
	 </div>
	</div>
</form>
<br>
<br>
<?php require_once('footer.php');?>
 