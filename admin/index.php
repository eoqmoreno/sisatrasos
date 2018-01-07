<?php
session_start(); 
include '../conexao.php';

if(!isset($_SESSION['usuario']) and !isset($_SESSION['senha'])) {
	header('Location: login.php');
}

$usuario = $_SESSION['usuario'];
        $sql = "SELECT * FROM administrador WHERE usuario = '$usuario'";
        $dados = mysqli_query($conexao,$sql) or die (mysqli_error($conexao)); 
        $row=mysqli_fetch_array($dados);
        $nome = $row['nome'];
        $usu = $row['usuario'];
        $tipo = "apt";
?>
<html>
<?php include "../header.php" ?>

<body>
<ul class="list-inline text-center bg-cinza pt-1 pb-1">			 
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#novoatraso" aria-expanded="false" aria-controls="collapseExample">Novo Atraso</a></li>
	    	<li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#zerar" aria-expanded="false" aria-controls="collapseExample">Zerar Atrasos</a></li>
	    	<li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#maistres" aria-expanded="false" aria-controls="collapseExample">Mais de 3 atrasos</a></li>
	    	<li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#dts" aria-expanded="false" aria-controls="collapseExample">Informações do Diretor de Turma</a></li>
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#cadprofessor" aria-expanded="false" aria-controls="collapseExample">Adicionar Diretor de Turma</a></li>
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#cadaluno" aria-expanded="false" aria-controls="collapseExample">Adicionar Aluno </a></li>
            <li class="list-inline-item"><a class="laranja" target="_blank" data-toggle="collapse" href="#relatorio" aria-expanded="false" aria-controls="collapseExample">Gerar Relatório </a></li>
            <li class="list-inline-item"><a class="laranja" href="sair.php">Sair</a></li>
        </ul>

        <div class="collapse" id="novoatraso">
        <div class="container col-md-4 border-laranja border-radius text-center">
        <script src="./ajax.js"></script>
                <label class="text-quarenta helveticalg">Novo Atraso</label>
                <form name="busca" method="POST" action="cadatras.php" class="form-group">
                        <input type="radio" name="serio" required value="1" class="ml-1" id="1anoo"> <label for="1anoo">1°Ano</label>
                        <input type="radio" name="serio" required value="2" class="ml-1" id="2anoo"> <label for="2anoo">2°Ano</label>
                        <input type="radio" name="serio" required value="3" class="ml-1" id="3anoo"> <label for="3anoo">3°Ano</label>
        	<br>
                        <select name="curso" class="form-control mb-2" required onchange="mostraConteudo('buscar.php?curso='+document.busca.curso.value+'serie'+document.busca.serio.value,'resultado_busca')">
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
                        <input type="radio" name="just" required value="sim" class="ml-1" id="sim"> <label for="sim">Justificavel</label>
                        <input type="radio" name="just" required value="nao" class="ml-1" id="nao"> <label for="nao">Não Justificavel</label>
                        <br><br>
                <input type="submit" value="ANOTAR" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer">
                        <br>
                </form>
        </div>
        </div>

        <div class="collapse" id="zerar">
                <div class="container col-md-4 border-laranja border-radius text-center">
                <form method="get" action="zerarAtrasos.php">
                <label class="text-vinte">Deseja realmente apagar os atrasos?</label><br>
                <input type="submit" value="SIM" class="btn text-bold laranja border-laranja bg-branco procurar pointer">
                </form>
                </div>
        </div>

        <div class="collapse" id="maistres">
                <div class="container col-md-12 border-laranja border-radius text-center table-responsive">
                <label class="text-quarenta helveticalg">Alunos com mais de 3 atrasos</label>
                <table class="table">
                <thead>
                <tr>
                    <th>NOME</th>
                    <th>FOTO</th> 
                    <th>SÉRIE</th>
                    <th>CURSO</th>
                    <th>TEL. ALUNO</th>
                    <th>TEL. RES.</th>
                    <th>ATRASOS</th>
                    <th>SIGE</th>
                    <th>#</th>
                </tr>
                </thead>
                <tbody>
                   <tr>
                <?php 
                $query = "SELECT * FROM alunos WHERE qtdAtraso>=3";
                
                $dados = mysqli_query($conexao,$query); 
                
                while($row=mysqli_fetch_array($dados)) 
                {
                
                $url_alterar = "addInfoAtraso.php?id=".$row["id"];
                $url_apagar = "apagarAluno.php?id=".$row["id"];
                $url_ver = "verAtrasos.php?id=".$row["id"];
                $url_editar = "editarAluno.php?id=".$row["id"];
                
                echo '<tr><td>'.$row["nome"] . '</td>';
                echo  '<td>'.'<img src="'.$row['foto'].'" height="40" width="40"/>'. '</td>';
                echo '<td>'.$row["serie"] . '</td>';
                echo '<td>'.$row["curso"] . '</td>';
                echo '<td>'.$row["telaluno"] . '</td>';
                echo '<td>'.$row["telresponsavel"] . '</td>';
                echo '<td>'.$row["qtdAtraso"] . '</td>';
                echo '<td>'.$row["numeroSige"] . '</td><td><a href="'.$url_ver.'">VER ATRASOS</a></td></tr>';
                }
                ?>
                </tr>
                </tbody>
                </table>
                </div>
        </div>

        <div class="collapse" id="dts">  
        <div class="container col-md-12 border-laranja border-radius text-center table-responsive">  
        <label class="text-quarenta helveticalg">Informações dos DTs</label>            
                <table class="table">
                <thead>
                <tr>
                <th>NOME</th>
                <th>FOTO</th> 
                <th>SERIE</th>
                <th>CURSO</th>
                <th>TELEFONE</th> 
                <th>USUÁRIO</th>
                <th>#</th>
                <th>#</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php 
                $query = "SELECT * FROM professor ORDER BY nome";
                $dados = mysqli_query($conexao,$query); 
                
                while($row=mysqli_fetch_array($dados)) 
                {                
                $url_alterar = "editarProfessor.php?id=".$row["id"];
                $url_apagar = "apagarProfessor.php?id=".$row["id"];
                
                echo '<tr><td>'.$row["nome"] . '</td>';
                echo  '<td>'.'<img src="'.$row['imagem'].'" height="40" width="40"/>'. '</td>';
                echo '<td>'.$row["serie"] . '</td>';
                echo '<td>'.$row["curso"] . '</td>';
                echo '<td>'.$row["telefone"] . '</td>';
                echo '<td>'.$row["usuario"] . '</td><td><a href="'.$url_alterar.'">EDITAR</a></td><td><a href="'.$url_apagar.'">EXCLUIR</a></td></tr>';
                }
                ?>
                </tr>
                </tbody>
                </table>
        </div>
        </div>

        <div class="collapse" id="cadprofessor">
                <div class="container col-md-8 border-laranja border-radius text-justify">
                        <label class="text-quarenta helveticalg">Cadastro de Professores</label>     
        <form method="post" action="cadProfessor.php" class="form-group" enctype="multipart/form-data">
                <input type="text" name="nome" placeholder="Nome Completo" class="form-control mb-2" required>
                <div class="form-inline"><label class="form-control-label">Foto:</label><input type="file" name="foto" accept="image/*" class="form-control-file mb-2"></div>
                <label class="form-control-label">Série:</label>
                <input type="radio" name="serie" required value="1" class="ml-1" id="1ano"> <label for="1ano">1°Ano</label>
                <input type="radio" name="serie" required value="2" class="ml-1" id="2ano"> <label for="2ano">2°Ano</label>
                <input type="radio" name="serie" required value="3" class="ml-1 mb-2" id="3ano" checked=""><label for="3ano">3°Ano</label>
                
                <select name="curso" class="form-control p-0 mb-2" required>
                        <option>Selecione o curso</option>
                        <option>Informática</option>
                        <option>Enfermagem</option>
                        <option>Segurança do Trabalho</option>
                        <option>Libras</option>
                        <option>Hospedagem</option>
                </select>
                </script>
                <input type="text" name="telefone" placeholder="Telefone" class="form-control mb-2 telefone"required>
                <input type="text" name="usuario" placeholder="Usuário" class="form-control mb-2" required>
                <input type="password" name="senha" placeholder="Senha" class="form-control mb-2" required><input type="password" name="consenha" placeholder="Confirme Senha" class="form-control mb-2" required>
                <input type="submit" name="" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer">
                <input type="reset" name="" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer">
                <br>
        </form>
                </div>
        </div>

        <div class="collapse" id="cadaluno">
                <div class="container col-md-8 border-laranja border-radius text-justify">
                        <label class="text-quarenta helveticalg">Cadastro de Aluno</label>     
        <form method="post" action="cadAluno.php" class="form-group" enctype="multipart/form-data">
                <input type="text" name="nome" placeholder="Nome" class="form-control mb-2" required>
                <input type="text" name="numeroSige" placeholder="Número do SIGE" class="form-control mb-2">
                <div class="form-inline"><label class="form-control-label">Foto:</label><input type="file" name="foto" accept="image/*" class="form-control-file mb-2"></div>
                <label class="form-control-label">Série:</label>
                <input type="radio" name="serie" required value="1" class="ml-1" id="1a"> <label for="1a">1°Ano</label>
                <input type="radio" name="serie" required value="2" class="ml-1" id="2a"> <label for="2a">2°Ano</label>
                <input type="radio" name="serie" required value="3" class="ml-1 mb-2" id="3a"><label for="3a">3°Ano</label>
                
                <select name="curso" class="form-control p-0 mb-2" required="">
                        <option>Selecione o curso</option>
                        <option>Informática</option>
                        <option>Enfermagem</option>
                        <option>Segurança do Trabalho</option>
                        <option>Libras</option>
                        <option>Hospedagem</option>
                </select>
                <div class="form-inline">
                <input type="text" name="rg" placeholder="RG" class="form-control mb-2" required>
                <input type="text" name="cpf" placeholder="CPF" class="cpf form-control mb-2" required>
                </div>
                <input type="text" name="nomeResponsavel" placeholder="Nome do Responsavel" class="form-control mb-2" required>
                <input type="text" name="telResponsavel" placeholder="Telefone do Responsavel" class="telefone form-control mb-2" required>
                <input type="text" name="telAluno" placeholder="Telefone do Aluno" class="telefone form-control mb-2" required>
                <input type="mail" name="email" placeholder="Email" class="form-control mb-2" required>
                <input type="submit" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer">
                <input type="reset" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer">
                <br>
        </form>
                </div>
        </div>

        
        <div class="collapse" id="relatorio">
                <div class="container col-md-4 border-laranja border-radius text-center">
                <label class="text-quarenta helveticalg">Gerar Relatório</label> 
                <form method="get" action="gerar_relatorio.php">
                <input type="radio" name="serie" required value="1" class="ml-1" id="1an"> <label for="1an">1°Ano</label>
                <input type="radio" name="serie" required value="2" class="ml-1" id="2an"> <label for="2an">2°Ano</label>
                <input type="radio" name="serie" required value="3" class="ml-1 mb-2" id="3an"><label for="3an">3°Ano</label>
                
                <select name="curso" class="form-control p-0 mb-2" required="">
                        <option>Selecione o curso</option>
                        <option>Informática</option>
                        <option>Enfermagem</option>
                        <option>Segurança do Trabalho</option>
                        <option>Libras</option>
                        <option>Hospedagem</option>
                </select>
                <input type="submit" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer">
                <input type="reset" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer">
                <br>
                </form>
                </div>
        </div>
</body>
</html>