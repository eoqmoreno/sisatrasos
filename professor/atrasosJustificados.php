<table class="detes">

<tr>
    <th>ALUNO</th>
    <th>SIGE</th>
    <th>HORA</th> 
    <th>DATA</th>
    <th>JUSTIFICATIVA</th>
  </tr>

   <tr>


<?php 

include '../conexao.php';
$serie = $_COOKIE['serieDT'];
$curso = $_COOKIE['cursoDT'];
?>

 <h1>Atrasos Justificados <?php echo $curso. " ";?><?php echo $serie. " ";?></h1>

 <?php
$query = "SELECT * FROM atraso WHERE curso='$curso' AND serie='$serie' AND motivo<>'Falta nao justificada'";
$dados = mysqli_query($conexao,$query); 
while($row=mysqli_fetch_array($dados)) 
{

$url_apagar = "apagarAtrasoJustificado.php?id=".$row["id"];

$sige = $row['numeroSige'];
$query1 = "SELECT * FROM alunos WHERE numeroSige=".$sige;
$dados1 = mysql_query($query1,$conexao); 
$row1=mysql_fetch_array($dados1,MYSQL_ASSOC);


echo '<tr><td>'.$row1["nome"] . '</td>';
echo '<td>'.$row["numeroSige"] . '</td>';
echo '<td>'.$row["horario"] . '</td>';
echo '<td>'.$row["data"] . '</td>';
echo '<td>'.$row["motivo"]. '</td><td><a href="'.$url_apagar.'">EXCLUIR</a></td></tr>';

}





?>


</table></div>
