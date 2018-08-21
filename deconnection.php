<?php  
	session_start();//INITIALISATION DE LA SESSION 
	session_unset();//DESACTIVATION DE LA SESSION
	session_destroy();//DESTRUCTION DE LA SESSION
	// setcookie('log','',time()-3444,'/',null,false,true);
	header('location: formconnexion.php');
?>