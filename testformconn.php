<?php 
require("connexion.php"); 
require("fonction.php"); 

if (!empty($_POST)) {

  $EmailCli   =$_POST['EmailCli'];
  $password   =$_POST['password'];
  $password="qa1".sha1($password."2712")."91";
  $error =1;
  $errors =array();

  if (empty($_POST['EmailCli'])) {

   $errors['EmailCli'] = "remplissez le champ email !";

  }
  
   if (empty($_POST['password'])) {

   $errors['password'] = "saisissez un mot de passe !";

  }

  
    
    $req=$conn->prepare('SELECT * from clients WHERE EmailCli = ? ');
    $req->execute(array($EmailCli));

    while ($user = $req->fetch()) {
      
      if ($password  == $user['password']) {
        
         $error = 0;
        header('location: testformconn.php?success=1');
      }
    }
    if ($error==1) {
      header('location: testformconn.php?error=1');
    } 
 
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

</head>
<body>
  <?php require"header.php";?>  
  <br>
 <div class="container">
     <div class="row">
         <div class="col-md-3"></div>
          <div  class="col-md-6">
           <h1>connectez-vous</h1>
          </div>
      </div>
      
       <hr>
     <?php  if (!empty($errors)): ?>
               <div class="alert alert-danger">
                <button class="close" type="button" data-dismiss="alert">&times;</button>
                 <p>Vous n'avez pas rempli le formulaire correctement</p>
                 <ul>
                   <?php foreach ($errors as  $errore): ?>
                    <li><?= $errore; ?></li>
                   <?php endforeach; ?>
                  </ul>
               </div>     
      <?php endif ;?>
      <?php  if (isset($_GET['success'])){
         echo'<div class="alert alert-success">
                <button class="close" type="button" data-dismiss="alert">&times;</button>
                 <p>connexion reussi</p>
                 <ul>
                    <li>vous ete maintenant connectee</li>
                  </ul>
               </div>';    
      }elseif (isset($_GET['error'])) {
           echo'<div class="alert alert-warning">
                <button class="close" type="button" data-dismiss="alert">&times;</button>
                 <p>error</p>
                 <ul>
                    <li>information non valide</li>
                     <li>verifiez le mot de passe</li>
                     <li>verifiez l email</li>
                  </ul>
               </div>';    
      } 
      ?>
              
      
    <form  method="POST" style="padding-left: 30px;" class="form-horizontal" action="testformconn.php">
      <div class="row">
         <div class="col-md-3"></div>
          <div  class="col-md-6">
          <label for="exampleInputEmail1">Email address</label>
          <input class="form-control" name="EmailCli" aria-describedby="emailHelp" type="text" placeholder="Enter email">
          <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
          </div>
      </div>
      <div class="row">
         <div class="col-md-3"></div>
          <div  class="col-md-6">
          <label for="exampleInputPassword1">Password</label>
          <input class="form-control" name="password" type="password" placeholder="Password" >
          </div>
      </div>
      </br>
     
      </br>
        <div class="row">
         <div class="col-md-3"></div>
          <div  class="col-md-6">
             <div class="checkbox">
            <label ><input type="checkbox" name="">Remember me</label>
      </div>
      </br>
           <button  class="btn btn-warning type="submit">connexion</button>
           <a class="btn btn-link" href="formmpoublier.html">Forgot Your Password?</a>
          </div>
      </div>
    </form>
  </div>
  
</br>
<?php require"footer.php";?>

 
 


