<?php
$load=isset($_GET['id']);
if($load){
$id = $_GET['id'];
$atrasos=$_GET['atr'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Marcar Reunião</title>
<?php include "../header.php" ?>


</head>
<body>
<?php if(!$load) echo "<h4><font color='red'>ERRO!</font> Você não tem acesso para interagir com o sistema.</h4>"; ?>
<h1> MARCAR REUNIÃO </h1>
<?php if($load) echo '<h4><font color="red">Alerta:</font> Aluno(a) com '.$atrasos.' faltas.</h4>'; ?>
    <br/><br/>
	<form method="post" action="cadreunia.php" class="add" enctype="multipart/form-data">
	<label>Data:</label> <input type="date" name="data" class="levar">
	<br><BR>
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<label>Horário:</label> <input type="time" name="hora" id="hora" class="levar">
	<br><br>
	<center>
	<?php if($load) echo "<input type=\"submit\" class=\"botao\"><input type=\"reset\" class=\"botao\">"; ?>
	</center>
	</form>
</body>
</html>


