<?php 
session_start(); 
include '../conexao.php';

$serie = $_COOKIE['serieDT'];
$curso = $_COOKIE['cursoDT'];


setcookie("serie", $serie);
setcookie("curso", $curso);
?>


<style type="text/css">
	h1 {
    color: #fff;
    text-align: center;
    font-family: 'Bitter', serif;
    text-transform: uppercase;
}

div#alunos {
        width: 933px;
    margin: 0 auto;
}

table th {
    color: #fff;
    text-align: center;
    font-family: 'Bitter', serif;
    text-transform: uppercase;
    font-size: 12px;
}

table td {
    font-family: arial;
    font-size: 16px;
    background: #68c0e0;
}


</style>


<a class="sair" href="JavaScript: window.history.back();">Voltar</a> 

<style type="text/css">
.sair {
    font-family: 'Bitter', serif;
    color: white;
    background: #43add4;
    padding: 7px;
    text-decoration: none;
    border-bottom: 2px solid;
}


.sair:hover {
    font-family: 'Bitter', serif;
    color: white;
    background: rgb(99, 198, 234);
    padding: 7px;
    border-bottom: 2px solid #43add4;
}
</style>

<div id="alunos">

<h1><?php echo $curso. " ";?><?php echo $serie. " ";?></h1>
	<link rel="stylesheet" type="text/css" href="css/estilo.css">
	<link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
<table class="detes">

<tr>
    <th>NOME</th>
    <th>FOTO</th> 
    <th>SERIE</th>
    <th>CURSO</th>
    <th>CPF</th> 
    <th>RG</th>
    <th>TELEFONE ALUNO</th>
    <th>TELEFONE RES.</th>
    <th>EMAIL</th>
    <th>QTD Atrasos</th>
    <th>NUMERO SIGE</th>

  </tr>

   <tr>

<?php 
$query = "SELECT * FROM alunos WHERE curso='$curso' AND serie='$serie' ORDER BY nome";

$dados = mysqli_query($conexao,$query); 

while($row=mysqli_fetch_array($dados)) 
{

$url_editar = "editarAluno.php?id=".$row["id"];

echo '<tr><td>'.$row["nome"] . '</td>';
echo  '<td>'.'<img src="data:image/jpeg;base64,'.base64_encode($row['foto'] ).'" height="69" width="69"/>'. '</td>';
echo '<td>'.$row["serie"] . '</td>';
echo '<td>'.$row["curso"] . '</td>';
echo '<td>'.$row["rg"] . '</td>';
echo '<td>'.$row["cpf"] . '</td>';
echo '<td>'.$row["telaluno"] . '</td>';
echo '<td>'.$row["telresponsavel"] . '</td>';
echo '<td>'.$row["email"] . '</td>';
echo '<td>'.$row["qtdAtraso"] . '</td>';
echo '<td>'.$row["numeroSige"].'</td><td><a href="'.$url_editar.'">EDITAR</a></td></tr>';
}




?>


</table></div>