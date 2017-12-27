<?php 

$id = $_COOKIE['idAtraso'];

?>

<!DOCTYPE html>
<html>
<head>
	<title>Marcar Reunião</title>
<?php include "header.php" ?>
<style>
	body {
    height: auto !important;
    font-size: 20px;
    font-family: 'Bitter', serif;
    background: #63c2bc !important;
	}

.reuniao {
    width: 421px;
    margin: 185px auto;
}
.levar {
    width: 288px;
    padding: 10px;
    background-color: #92eae5;
    border: none;
    color: #000;
    font-family: 'Bitter', serif;
    font-size: 20px;
    outline: none;
}

.botao {
    background: url(inicio_nuvem.png) no-repeat;
    border: none;
    padding: 10px;
    background-size: 81px;
    width: 84px;
    height: 62px;
    color: #000;
    font-family: 'Bitter', serif;
    cursor: pointer;
    outline: none;
}

.botao:hover {
    background: url(inicio_nuvem.png) no-repeat;
    background-size: 81px;
	color: #63c2bc !important;
}


	</style>

<script type="text/javascript" src="jquery-2.2.4.js"></script> <script type="text/javascript" src="jquery.mask.min.js"></script>



</head>
<body>

<div class="reuniao">

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


