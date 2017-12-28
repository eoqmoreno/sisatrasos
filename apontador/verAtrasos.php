<?php
include '../conexao.php';
$id = $_REQUEST["id"];

setcookie('idAtraso', $id);

include "../header.php" ?>

<html>
<head></head>
<title>Ver Atrasos</title>
<body>


<table class="atrasos">
<center><label>Atrasos Novos:</label><label class="text-bold"><?php setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
echo strftime('%B', strtotime('today'));?></label></center>


<?php 
$query2 = "SELECT * FROM alunos WHERE id=".$id;
$dados = mysqli_query($conexao,$query2); 
$row=mysqli_fetch_array($dados);
$situacao = $row['qtdAtraso'];
$sige = $row['numeroSige'];

$query = "SELECT * FROM atraso WHERE numeroSige='$sige' AND antigo = 0";
$dados = mysqli_query($conexao,$query); 


if ($situacao>=1) {
    echo "
<tr>
    <th>SIGE</th> 
    <th>HORARIO</th>
    <th>DATA</th>
    <th>JUSTIFICADO</th>
  </tr>

   <tr>";
    
while($row=mysqli_fetch_array($dados)) {
     $url_apagar = "apagarAtraso.php?id=".$row["id"]."&numeroSige=".$row['numeroSige'];
echo '<td>'.$row["numeroSige"] . '</td>';
echo '<td>'.$row["horario"] . '</td>';
echo '<td>'.$row["data"] . '</td>';

if($row['motivo'] != "Falta nao justificada") 
echo '<td>SIM</td><td><a href="'.$url_apagar.'">Excluir Atraso</a></td></tr>';
else
echo '<td>NAO</td><td><a href="'.$url_apagar.'">Excluir Atraso</a></td></tr>';
}
    echo '</table><center><span><a href="marcarReu.php">Marcar Reunião</a></span></center>';
}
else if($situacao==0) {
    echo "<h1><center>NENHUM ATRASO</center></h1>";
}
?>
</table>

<table class="atrasosAntigo">

<center><h1>Atrasos Antigos</h1></center>

<?php
$query1 = "SELECT * FROM atraso WHERE numeroSige='$sige' AND antigo = 1";
$dados = mysqli_query($conexao,$query1); 




    echo "
<tr>
    <th>SIGE</th> 
    <th>HORARIO</th>
    <th>DATA</th>
    <th>JUSTIFICADO</th>
  </tr>

   <tr>";


    
while($row=mysqli_fetch_array($dados)) {
     $url_apagar = "apagarAtraso.php?id=".$row["id"]."&numeroSige=".$row['numeroSige'];
echo '<td>'.$row["numeroSige"] . '</td>';
echo '<td>'.$row["horario"] . '</td>';
echo '<td>'.$row["data"] . '</td>';

if($row['motivo'] != "Falta nao justificada") 
echo '<td>SIM</td><td><a href="'.$url_apagar.'">Excluir Atraso</a></td></tr>';

else
echo '<td>NAO</td><td><a href="'.$url_apagar.'">Excluir Atraso</a></td></tr>';

}
?>

</table>

</body>
</html>