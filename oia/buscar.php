<?php

//Resgata valor por get digitado no formulário
$busca = $_GET['curso'];

include '../conexao.php';

//Monta consulta SQL
$sql = mysqli_query($conexao,"SELECT * FROM alunos WHERE curso  LIKE  '$busca%'") or die ("Não foi possível realizar a consulta.");
$total_rows = mysqli_num_rows($sql);

//Aqui verifica se veio algum resultado
 if($total_rows == 0){
 	
	echo "Nenhum resultado encontrado";
 }
 else{
	
 	//Loop com resultado do select
    while ($result = mysqli_fetch_array($sql)) {
	
	 echo "<tr><td>".$result['nome']."</td><td>".$result['numeroSige']."</td></tr>";
	

    }
 }