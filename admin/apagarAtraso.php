<?php 
include 'conexao.php';

?>


<?php 


$numeroSige = $_REQUEST["numeroSige"];
$id = $_REQUEST["id"];



$query3 = "SELECT * FROM atraso WHERE id=".$id;
$dados3 = mysql_query($query3,$conexao); 
$row4=mysql_fetch_array($dados3,MYSQL_ASSOC);
$antigo = $row4['antigo'];

$query2 = "SELECT * FROM alunos WHERE numeroSige=".$numeroSige;
$dados = mysql_query($query2,$conexao); 
$row=mysql_fetch_array($dados,MYSQL_ASSOC);
$quantidade = $row['qtdAtraso'];


if(!$quantidade <= 0){
	if($antigo == 0) {
$quantidade--;
$query3 = "UPDATE alunos SET qtdAtraso='$quantidade' WHERE numeroSige=".$numeroSige;
$dados = mysql_query($query3);
}

else {
	$query3 = "UPDATE alunos SET qtdAtraso='$quantidade' WHERE numeroSige=".$numeroSige;
$dados = mysql_query($query3);
}
}


$query = "DELETE FROM `atraso` WHERE id=".$id;
mysql_query($query, $conexao);

header('Location: verAtrasos.php?id='.$_COOKIE['idAtraso']);


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
