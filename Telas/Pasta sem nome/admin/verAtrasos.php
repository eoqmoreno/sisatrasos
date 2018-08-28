<?php
include '../conexao.php';
$id = $_REQUEST["id"];
setcookie('idAtraso', $id);
include "../header.php" ?>
<html>
<head></head>
<title>Ver Atrasos</title>
<body>
<center>
<div class="table-responsive border-radius border-laranja col-8 text-center">
<label class="text-vinte">Atrasos Novos</label>
<table class="table">

<thead>
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
    <th>#</th>
  </tr>
</thead>
<tbody>
   <tr>";
    
while($row=mysqli_fetch_array($dados)) {
     $url_apagar = "apagarAtraso.php?id=".$row["id"]."&numeroSige=".$row['numeroSige'];
echo '<td>'.$row["numeroSige"].'</td>';
echo '<td>'.$row["horario"].'</td>';
echo '<td>'.$row["data"].'</td>';

if($row['motivo'] != "nao"){
echo '<td>SIM</td><td><a href="'.$url_apagar.'">Excluir Atraso</a></td></tr>';
}else{
echo '<td>NAO</td><td><a href="'.$url_apagar.'">Excluir Atraso</a></td></tr>';
}
}
echo '</tbody></table>';
}else if($situacao==0){
    echo "<h1><center>NENHUM ATRASO</center></h1>";
}
?>

<label class="text-vinte">Atrasos Antigos</label>
<table class="table">
<?php
$query1 = "SELECT * FROM atraso WHERE numeroSige='$sige' AND antigo = 1";
$dados = mysqli_query($conexao,$query1); 
    echo "
    <thead>
    <tr>
    <th>SIGE</th> 
    <th>HORARIO</th>
    <th>DATA</th>
    <th>JUSTIFICADO</th>
    <th>#</th>
    </tr>
    </thead>
    <tbody>
   <tr>";
while($row=mysqli_fetch_array($dados)) {
     $url_apagar = "apagarAtraso.php?id=".$row["id"]."&numeroSige=".$row['numeroSige'];
echo '<td>'.$row["numeroSige"] . '</td>';
echo '<td>'.$row["horario"] . '</td>';
echo '<td>'.$row["data"] . '</td>';

if($row['motivo'] != "nao"){ 
echo '<td>SIM</td><td><a href="'.$url_apagar.'">Excluir Atraso</a></td></tr>';
}else
echo '<td>NAO</td><td><a href="'.$url_apagar.'">Excluir Atraso</a></td></tr>';

}
?>
</tbody>
</table>
</center>
</body>
</html>