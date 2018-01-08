<?php
session_start(); 
include '../conexao.php';

if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])) {
	header('Location: login.php');
}
$usuario = $_SESSION['usuario'];
        $sql = "SELECT * FROM apontador WHERE usuario = '$usuario'";
        $dados = mysqli_query($conexao,$sql) or die (mysqli_error($conexao)); 
        $row=mysqli_fetch_array($dados);
        $nome = $row['nome'];
        $usu = $row['usuario'];
        $tipo = "apt";
?>
<html>
<?php include "../header.php" ?>
<body>
<a title="Sair" href="sair.php" class="bg-laranja preto pointer text-bold m-0 p-2 pt-2 voltar "><span class="fa fa-arrow-circle-o-left" aria-hidden="true"></span> Sair</a>
        <div class="container col-md-4 border-laranja border-radius text-center">
        <script src="./ajax.js"></script>
                <label class="text-quarenta helveticalg">Novo Atraso</label>
                <form name="busca" method="POST" action="cadatras.php" class="form-group">
                        <input type="radio" name="serio" required value="1" class="ml-1" id="1anoo"> <label for="1anoo">1°Ano</label>
                        <input type="radio" name="serio" required value="2" class="ml-1" id="2anoo"> <label for="2anoo">2°Ano</label>
                        <input type="radio" name="serio" required value="3" class="ml-1" id="3anoo"> <label for="3anoo">3°Ano</label>
        	<br>
                        <select name="curso" class="form-control mb-2" required onchange="mostraConteudo('buscar.php?curso='+document.busca.curso.value+'&serie='+document.busca.serio.value,'resultado_busca')">
                                <option>Selecione o curso</option>
                                <option>Informática</option>
                                <option>Segurança do Trabalho</option>
                                <option>Enfermagem</option>
                                <option>Libras</option>
                                <option>Hospedagem</option>
                        </select>
                        <select id="resultado_busca" name="nome" required class="form-control mb-2">
		                <option></option>
                        </select>
                        <?php
                        date_default_timezone_set('America/Fortaleza');
                        $data = date ("Y-m-d");
                        $hora = date("H:i");
                        ?>
                        <input type="date" name="data" value="<?php echo $data; ?>" class="form-control mb-2"/>
                        <input type="time" name="hora" value="<?php echo $hora; ?>" class="form-control"/>
                        <input type="radio" name="just" required value="sim" class="ml-1" id="sim"> <label for="sim">Justificável</label>
                        <input type="radio" name="just" required value="nao" class="ml-1" id="nao"> <label for="nao">Não Justificável</label>
                        <br><br>
                <input type="submit" value="ANOTAR" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer">
                        <br>
                </form>
        </div>
        
        
</body>
</html>