<?php 

$id = $_COOKIE['idAtraso'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Marcar Reunião</title>
<?php include "../header.php" ?>


</head>
<body>

<h1> MARCAR REUNIÃO </h1>

    <form method="post" action="infoReu.php" class="add" enctype="multipart/form-data">
	<label>Data:</label> <input type="date" name="data" class="levar">
	<br><BR>
	<label>Horário:</label> <input type="time" name="hora" id="hora" class="levar">
	<br><br>
	<center>
	<input type="submit" name="" class="botao">
	<input type="reset" name="" class="botao">
	</center> 

</table>
</div>
</body>
</html>


