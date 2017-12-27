<?php 
	$host = "fdb7.freehostingeu.com";
	// $host = "localhost";
        $user = "1942710_imp";
        // $user = "root";
  	$pwd  = "george123,";
  	// $pwd  = "";
	$bd   = "1942710_imp";
	// $bd   = "sistemaatraso";
	$conexao = mysqli_connect($host,$user,$pwd,$bd);
        mysqli_set_charset($conexao,'utf8');
?>