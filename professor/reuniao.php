<?php 
session_start(); 
include '../conexao.php';

$serie = $_COOKIE['serieDT'];
$curso = $_COOKIE['cursoDT'];


setcookie("serie", $serie);
setcookie("curso", $curso);

?>
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

<style type="text/css">
    h1 {
    color: #fff;
    text-align: center;
    font-family: 'Bitter', serif;
    text-transform: uppercase;
}

div#alunos {
    width: auto;
    margin: 0 auto;
}

table.detes {
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
    padding: 7px;
    background: #68c0e0;
}


</style>
<div id="alunos">

<h1>REUNIÕES <?php echo $curso. " ";?><?php echo $serie. " ";?></h1>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link href="https://fonts.googleapis.com/css?family=Bitter" rel="stylesheet">
<table class="detes">

<tr>
    <th>ALUNO</th>
    <th>DATA</th>
    <th>HORARIO</th> 
    <th>TELEFONE RES.</th>
  </tr>

   <tr>

<?php 
$query = "SELECT * FROM reuniao WHERE curso='$curso' AND serie='$serie'";
$dados = mysqli_query($conexao,$query); 






while($row=mysqli_fetch_array($dados)) 
{

$url_apagar = "apagarAtraso.php?id=".$row["id"];

$sige = $row['numeroSige'];
$query1 = "SELECT * FROM alunos WHERE numeroSige=".$sige;
$dados1 = mysql_query($query1,$conexao); 
$row1=mysql_fetch_array($dados1,MYSQL_ASSOC);


echo '<tr><td>'.$row1["nome"] . '</td>';
echo '<td>'.$row["data"] . '</td>';
echo '<td>'.$row["hora"] . '</td>';
echo '<td>'.$row1["telresponsavel"]. '</td><td><a href="'.$url_apagar.'">EXCLUIR</a></td></tr>';

}





?>


</table></div>