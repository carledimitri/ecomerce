<?php 
try {

		$conn = new PDO('mysql:host=localhost;dbname=ecommerce;charset=utf8', 'root', '');
		
	    }
	catch(Exception $e) { 

		die('Erreur : '.$e->getMessage()); }


if (!empty($_POST['NomCli']) && !empty($_POST['PrenomCli']) && !empty($_POST['Password']) && !empty($_POST['TelCli']) && !empty($_POST['EmailCli']) && !empty($_POST['AdresseCli']) ) {
  echo "je sui la";
    //VARIABLE
    $NomCli   =$_POST['NomCli'];
    $PrenomCli    =$_POST['PrenomCli'];
    $Password    =$_POST['Password'];
    $TelCli =$_POST['TelCli'];
    $EmailCli =$_POST['EmailCli'];
    $AdresseCli =$_POST['AdresseCli'];


 //ENVOI DE LA REQUETTE
    $req=$conn->prepare("INSERT INTO `clients` (`NomCli`, `PrenomCli`, `password`, `TelCli`, `EmailCli`,`AdresseCli`) VALUES (?,?,?,?,?,?)") or die($conn->errorInfo());
    $req->execute(array($NomCli, $PrenomCli,$password,$TelCli,$EmailCli,$AdresseCli));

}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>

</head>
<body>
	<header>
		 <form method="POST" style="color: #ff9f43;" action="testconn.php"  >
    
    <div class="form-row">
      <div class="form-group col-md-6">
        <label >Nom </label>
        <input type="text" name="NomCli" class="form-control"  placeholder="Nom ">
      </div>
      <div class="form-group col-md-6">
        <label >Prenom</label>
        <input type="text" name="PrenomCli " class="form-control"  placeholder="Prenom">
      </div>
    </div>
   
     <div class="form-row">
      <div class="form-group col-md-6">
        <label >Password</label>
        <input type="Password" name="password" class="form-control"  placeholder="password">
      </div>
      <div class="form-group col-md-6">
        <label >Tel</label>
        <input type="text" name="TelCli " class="form-control" placeholder="Numero tel">
      </div>
    </div>
    
     <div class="form-row">
      <div class="form-group col-md-6">
        <label >Adresse Email</label>
        <input type="email" name="EmailCli" class="form-control"  placeholder="Email">
      </div>
      <div class="form-group col-md-6">
        <label for="inputPassword4">Adresse</label>
        <input type="text" name="AdresseCli " class="form-control"  placeholder="Adresse">
      </div>
    </div>
    <div class="row" style="padding-top: 1rem">
      <div class="col-md-3"></div>
        <div class="col-md-6">
         
      </div>
    </div>
     <input type="submit" value="Connection" value="valider">
</form>
  
  
	</header>
	

</body>
</html>