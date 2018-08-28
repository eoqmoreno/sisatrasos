<?php

//Resgata valor por get digitado no formulário
$busca = $_GET['curso'];
$serie = $_GET['serie'];

include '../conexao.php';

//Monta consulta SQL
$sql = mysqli_query($conexao,"SELECT * FROM alunos WHERE serie='$serie' AND curso='$busca'") or die (mysqli_error($conexao));
$total_rows = mysqli_num_rows($sql);
//Aqui verifica se veio algum resultado
 if($total_rows == 0){
 	
 }
 else{
	
 	//Loop com resultado do select
    while ($result = mysqli_fetch_array($sql)) {
	 		echo "<option value='".$result['nome']."'>".$result['nome']."</option>";
	}
 }