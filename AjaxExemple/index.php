<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pt-br" lang="pt-br">
<html>
<head>
<title>Busca simples com Ajax, PHP, MySQL</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script src="ajax.js"></script>
</head>

<body>
	<b>Digite o que procura</b>
	<!--Aqui o formulário para a busca-->
	<form name='busca'>
			<input type="radio" name="serie" value="3">
			<select name="curso" class="form-control" onchange="mostraConteudo('buscar.php?curso='+document.busca.curso.value+'serie'+document.busca.serie.value,'resultado_busca')">
					<option>Selecione o curso</option>
					<option>Informática</option>
					<option>Enfermagem</option>
					<option>Segurança do Trabalho</option>
					<option>Libras</option>
					<option>Hospedagem</option>
			</select>
	</form>
	<br />

	<!--Aqui é onde vai aparecer o resultado da busca-->
	<select id="resultado_busca">
		<option></option>
	</select>
    
</body>
</html>