<?php 
include '../conexao.php';
	$result=mysqli_query($conexao,"SELECT * FROM detes WHERE id=$PicNum") or die(mysqli_error($conexao)); 
	$row=mysqli_fetch_object($result); 
	Header("Content-type: image/gif"); 
	echo $row->id; 
?>