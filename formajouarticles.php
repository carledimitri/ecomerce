<?php 
require "connexion.php" ; 


if (isset($_POST) && !empty($_POST) &&  !empty($_FILES["imageProduit"])  &&  !empty($_POST["nomProduit"]) && !empty($_POST["descriProduit"]) && !empty($_POST["prixUnitaire"]) && !empty($_POST["qteStock"])) {

    //VARIABLE
    $nomProduit     =$_POST['nomProduit'];
    $imageProduit   =$_FILES['imageProduit'];
    $descriProduit  =$_POST['descriProduit'];
    $prixUnitaire   =$_POST['prixUnitaire'];
    $qteStock       =$_POST['qteStock'];


   
    //TEST PRODUIT
    $req=$conn->prepare("SELECT COUNT(*) AS nomDuProduit from produit WHERE nomProduit = ? ");
    $req->execute(array($nomProduit));

    while ($prod_verification=$req->fetch()) {

      if ($prod_verification['nomDuProduit'] != 0 ){
        header('location: formajouarticles.php?error=1&prod=1');
        return ;
      }
      
    }


   
    //VERIFICATION DE L'IMAGE

        // Testons si le fichier n'est pas trop gros
        if (isset($_FILES['imageProduit']) && $_FILES['imageProduit']['error']==0 ){
    
    if($_FILES['imageProduit']['size'] <=3000000 ){

      $informationImage=pathinfo($_FILES['imageProduit']['name']);

      $extensionImage=$informationImage['extension'];

      $extensionArray=array('png','gif','jpg','jpeg');

      if (in_array($extensionImage, $extensionArray)) {
        $addresseimage= 'image/'.time().rand().'.'.$extensionImage;
        move_uploaded_file($_FILES['imageProduit']['tmp_name'],"$addresseimage");
        $error=0;
      }
    }else{
      $error=1;
    }
  }
   
    //ENVOI DE LA REQUETTE
    $req=$conn->prepare("INSERT INTO produit (nomProduit, imageProduit, descriProduit, prixUnitaire,qteStock) VALUES (?,?,?,?,?)") or die($conn->errorInfo());
    $req->execute(array($nomProduit, $addresseimage,$descriProduit,$prixUnitaire,$qteStock));
    header('location: formajouarticles.php?success=1');

  }

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>projet php</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <?php require('header.php');?> 
  </br>
  <div id="form" class="container">
  <h1 style="color: #ff9f43;" class=" display-1 ">Ajout Produit </h1>   
  <?php
    if (isset($error) && $error==0) {
       header('location:  formajouarticles.php?success=1');
       echo "coucou";
        } elseif (isset($error) && $error==1) {
          echo "votre image ne peut pas etre telecharger verifier la taille doit etre inferieur a 3mo et son extension";
        } 
      if (isset($_GET['error'])) {

        if (isset($_GET['prod'])) {

        echo '<p id ="error"> Le produit existe deja</p>';

          }
      }
       else if (isset($_GET['success'])) {
        echo '<p id ="success">ajout reusie avec success reussi</p>';
      }

    ?>
    <form style="color: #ff9f43;" action="formajouarticles.php" method="POST" enctype="multipart/form-data">
     
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Nom Produit</label>
        <input type="text" name="nomProduit" class="form-control"  placeholder="Nom produit">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Image Produit</label>
        <input type="file" name="imageProduit" class="form-control"  placeholder="Image Produit">
      </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="inputEmail4">Prix unitaire</label>  
        <input type="text" name="prixUnitaire" class="form-control"  placeholder="prix">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Quantite Stock</label>
        <input type="text" name="qteStock" class="form-control"  placeholder="Quantite">
      </div>
    </div>

    <div class="form-group">
      <label for="exampleTextarea">Description produit</label>
      <textarea class="form-control" name="descriProduit"  rows="3"></textarea>
    </div>

    

    <div class="row" style="padding-top: 1rem">
      <div class="col-md-3"></div>
        <div class="col-md-6">
          <button  class="btn btn-warning btn-lg btn-block" type="submit">valider</button>
      </div>
    </div>
</form>
  
  </div>
   
  <<?php require('footer.php') ?>
</body>
</html>