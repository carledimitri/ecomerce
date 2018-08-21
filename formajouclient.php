<?php 
require "connexion.php" ;
require_once "fonction.php" ; 


if (!empty($_POST)) {
 
    //VARIABLE
     $NomCli   =$_POST['NomCli'];
     $PrenomCli=$_POST['PrenomCli'];
     $password =$_POST['password'];
     $TelCli =$_POST['TelCli'];
     $EmailCli =$_POST['EmailCli'];
     $AdresseCli =$_POST['AdresseCli'];
    $errors =array();

   
    
     if (empty($_POST['NomCli']) || !preg_match('/^[a-zA-Z0-9_]+$/',$_POST['NomCli'])) {

   $errors['NomCli'] = "votre nom n'est pas valide (alphanumerique)!";

  }else{
    $req = $conn->prepare('SELECT idCli FROM clients WHERE NomCli =?');
    $req->execute(array($_POST['NomCli']));
    $user = $req->fetch();
    if ($user) {
     $errors['NomCli'] = "Ce nom existe deja !";
    }
  }

   if (empty($_POST['PrenomCli'])) {

   $errors['PrenomCli'] = "Saisissez un mot de passe !";

  }

   if (empty($_POST['TelCli'])) {

   $errors['TelCli'] = "saisissez un numero de telephone (0 a 9) !";

  }

   if (empty($_POST['AdresseCli'])) {

   $errors['AdresseCli'] = "remplissez le champ Adresse !";

  }

  if (empty($_POST['EmailCli']) || !filter_var($_POST['EmailCli'],FILTER_VALIDATE_EMAIL)) {

   $errors['EmailCli'] = "Email non valide(exemple@gmail.com) !";

  }else{
    $req = $conn->prepare('SELECT idCli FROM clients WHERE EmailCli =?');
    $req->execute(array($_POST['EmailCli']));
    $user = $req->fetch();
    if ($user) {
     $errors['EmailCli'] = "Cette Email est deja utilise pour un autre compte!";
    }
  }
   if (empty($_POST['password'])) {

   $errors['password'] = "saisissez un mot de passe !";

  }

if (empty($errors)) {
  $req=$conn->prepare("INSERT INTO clients(NomCli,PrenomCli,password,TelCli,EmailCli,AdresseCli,confirmation_token ) VALUES (?,?,?,?,?,?,?)") or die($conn->errorInfo());
   //CRYPTAGE DU PASSWORD
  $password="qa1".sha1($password."2712")."91";
  // $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
  $token = str_random(60);
  $req->execute(array($NomCli, $PrenomCli,$password,$TelCli,$EmailCli,$AdresseCli,$token));
   $errors['EmailCli'] = "compte creer avec succes !";
   // $user_id = $conn->lastInsertId();

  //       $to      = $_POST['EmailCli'];
  //    $subject = 'confirmation de votre email';
  //    $message = "afin de valide ce compte merci de cliquer sur ce lien \n\nhttp://127.0.1.0/projetphp/confirm.php?id=$user_id&token=$token";
  //    $headers = 'From: webmaster@example.com' . "\r\n" .
  //    'Reply-To: webmaster@example.com' . "\r\n" .
  //    'X-Mailer: PHP/' . phpversion();

  //    mail($to, $subject, $message, $headers);
  // header('location: testformconn.php');
  // exit();

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
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php require "header.php" ;?>
  
  <div id="form" class="container">
  <h1 style="color: #ff9f43;" class=" display-1 ">Ajout Client </h1>   
  
    <?php  if (!empty($errors)): ?>
               <div class="alert alert-warning">
                <button class="close" type="button" data-dismiss="alert">&times;</button>
                 <p>Vous n'avez pas rempli le formulaire correctement</p>
                 <ul>
                   <?php foreach ($errors as  $errore): ?>
                    <li><?= $errore; ?></li>
                   <?php endforeach; ?>
                  </ul>
               </div>     
      <?php endif ;?>
    <form method="POST" style="color: #ff9f43;" action="formajouclient.php"  >
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label >Nom </label>
        <input type="text" name="NomCli" class="form-control"  placeholder="Nom ">
      </div>
      <div class="form-group col-md-6">
        <label >Prenom</label>
        <input type="text" name="PrenomCli" class="form-control"  placeholder="Prenom">
      </div>
    </div>
   
     <div class="form-row">
      <div class="form-group col-md-6">
        <label >Password</label>
        <input type="Password" name="password" class="form-control"  placeholder="password">
      </div>
      <div class="form-group col-md-6">
        <label >Tel</label>
        <input type="text" name="TelCli" class="form-control" placeholder="Numero tel">
      </div>
    </div>
    
     <div class="form-row">
      <div class="form-group col-md-6">
        <label >Adresse Email</label>
        <input type="email" name="EmailCli" class="form-control"  placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Adresse</label>
        <input type="text" name="AdresseCli" class="form-control"  placeholder="Adresse">
      </div>
    </div>
    
    <div class="row" style="padding-top: 1rem">
      <div class="col-md-3"></div>
        <div class="col-md-6">
         <button  class="btn btn-warning btn-lg btn-block" type="submit">valider</button>
      </div>
    </div>
</form>
  
  </div> 
</br>
  <?php require('footer.php') ?>
</body>
</html>