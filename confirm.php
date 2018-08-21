<?php  
$user_id = $_GET['id'];
$token = $_GET['token'];
require_once("connexion.php") ; 
$req=$conn->prepare('SELECT * FROM clients WHERE idCli=? ');
$req->execute(array($user_id));
$user=$req->fetch();
session_start();
if ($user && $user['confirmation_token']== $token) {
	
	$req=$conn->prepare('UPDATE clients SET confirmation_token=NULL,comfirme_date=NOW() WHERE idCli=?');
	$req->execute(array($user_id));

	$_SESSION['connect'] =$user;
	die('ok');
}else{
	die('pas ok');
}
?>