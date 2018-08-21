<?php  
function debug($variable){

	echo '<pre>'.print_r($variable,true). '<pre>';
}

function str_random($length){
	$alphabet = "1234567890qwertyuioplkjhgfdsazxcvbnmMNBVCXZLKJHGFDSAPOIUYTREWQ";
	return substr(str_shuffle(str_repeat($alphabet,$length)),0,$length);
}