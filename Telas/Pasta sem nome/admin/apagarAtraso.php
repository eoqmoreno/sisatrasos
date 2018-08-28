<?php 
include '../conexao.php';

$numeroSige = $_REQUEST["numeroSige"];
$id = $_REQUEST["id"];



$query3 = "SELECT * FROM atraso WHERE id=".$id;
$dados3 = mysqli_query($conexao,$query3); 
$row4=mysqli_fetch_array($dados3);
$antigo = $row4['antigo'];

$query2 = "SELECT * FROM alunos WHERE numeroSige=".$numeroSige;
$dados = mysqli_query($conexao,$query2); 
$row=mysqli_fetch_array($dados);
$quantidade = $row['qtdAtraso'];


if(!$quantidade <= 0){
	if($antigo == 0) {
$quantidade--;
$query3 = "UPDATE alunos SET qtdAtraso='$quantidade' WHERE numeroSige=".$numeroSige;
$dados = mysqli_query($conexao,$query3);
}

else {
	$query3 = "UPDATE alunos SET qtdAtraso='$quantidade' WHERE numeroSige=".$numeroSige;
$dados = mysqli_query($conexao,$query3);
}
}


$query = "DELETE FROM `atraso` WHERE id=".$id;
mysqli_query($conexao,$query);

header('Location: index.php');


/*$query2 = ";
$dados = mysql_query($query2);
$resultados = mysql_fetch_object($dados);
$id = $resultados->id;
$quantidade =  $resultados->qtdAtraso;
$quantidade--;
$query = "UPDATE alunos SET qtdAtraso=".$quantidade;
$dados = mysql_query($query);
echo $quantidade . "<br>";
echo $numeroSige;
//*/

?>
