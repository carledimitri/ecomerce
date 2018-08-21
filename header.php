<?php  
require_once('panier.class.php');
require_once('db.class.php');
require_once("connexion.php");
 
$DB = new DB();
$panier = new panier($DB);
// echo "<br>";
// print_r(' user connecter : '.' '.$_SESSION['idCli']);
// echo "<br>";
// print_r($_COOKIE['NomCli']);
  
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>projet php</title>

    <!-- Bootstrap core CSS -->
    
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600" rel="stylesheet" type="text/css">
    <link href="style/style.css" rel="stylesheet" type="text/css">
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  
    
    <!-- Custom styles for this template -->
    <link href="style.css" rel="stylesheet">

  </head>
<body>
	  <header> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php">
       <img src="logo.png" alt="Logo" style="width:50px; border-radius: 4px;">
      </a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item ">
              <a class="nav-link" href="listeart.php">Article <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Client</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="Contact.php">Contact</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                Admin
               </a>
             <div class="dropdown-menu">
               <a class="dropdown-item" href="formajouarticles.php">Ajout Article</a>
               <a class="dropdown-item" href="formajouclient.php">Ajout Client</a>
               <a class="dropdown-item" href="#">Commande</a>
             </div>
             </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-dark" type="submit">Search</button>

            <div class="col-sm-12 col-md-2 text-right ">
              <a href="panier.php"><button style="width: 109px; height: 48px" class="btn btn-warning " type="button"><span class="badge"><?=$panier->count();?></span>
             <i class="fa fa-shopping-cart ml-1 "></i> 
          </button></a>            
      </div>
      <?php if (!isset($_SESSION['connect'])) {
      echo '<div class="col-sm-12 col-md-2 text-right ">
          <a href="formconnexion.php"><button style="width: 184px; height:48px" class="btn btn-warning " type="button">
             Connexion<i class="fa fa-user-circle ml-1 "></i> <span class="badge"></span>
          </button></a>             
      </div>';
         } elseif (isset($_SESSION['connect'])){
          echo '<div class="col-sm-12 col-md-2 text-right ">
          <a href="deconnection.php"><button style="width: 184px; height: 48px" class="btn btn-warning " type="button">
             Deconnexion<i class="fa fa-sign-in ml-1 "></i> <span class="badge"></span>
          </button></a>             
      </div>';}
      ?>
          </form>
          
        </div>
    </nav>
       
  </header>

<!--  <div class="col-sm-12 col-md-2 text-right ">
          <button style="width: 50px;" class="btn btn-warning " type="button">
             <a href="formconnexion.php"><i class="fa fa-sign-in ml-1 "></i> <span class="badge"><h6></h6></span></a>
          </button>             
      </div> -->