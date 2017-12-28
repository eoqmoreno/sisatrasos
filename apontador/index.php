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
<ul class="list-inline text-center bg-cinza pt-1 pb-1">			 
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#novoatraso" aria-expanded="false" aria-controls="collapseExample">Novo Atraso</a></li>
	    <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#zerar" aria-expanded="false" aria-controls="collapseExample">Zerar Atrasos</a></li>
	    <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#maistres" aria-expanded="false" aria-controls="collapseExample">Mais de 3 atrasos</a></li>
	    <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#dts" aria-expanded="false" aria-controls="collapseExample">Informações do Diretor de Turma</a></li>
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#cadprofessor" aria-expanded="false" aria-controls="collapseExample">Adicionar Diretor de Turma</a></li>
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#cadaluno" aria-expanded="false" aria-controls="collapseExample">Adicionar Aluno </a></li>
            <li class="list-inline-item"><a class="laranja" data-toggle="collapse" href="#relatorio" aria-expanded="false" aria-controls="collapseExample">Gerar Relatório </a></li>
            <li class="list-inline-item"><a class="laranja" href="sair.php">Sair</a></li>
        </ul>

        <div class="collapse" id="novoatraso">
                <div class="container col-md-4 border-laranja border-radius text-center">
                <label class="text-quarenta helveticalg">Novo Atraso</label>
                <form method="get" action="procurarTurma.php" class="form-group">
                        <input type="radio" name="serio" required="" value="1" class="ml-1" id="1ano"> <label for="1ano">1°Ano</label>
                        <input type="radio" name="serio" required="" value="2" class="ml-1" id="2ano"> <label for="2ano">2°Ano</label>
                        <input type="radio" name="serio" required="" value="3" class="ml-1" id="3ano" checked=""> <label for="3ano">3°Ano</label>
        	<br>
                        <select name="curso" class="form-control" required>
                                <option>Selecione o curso</option>
                                <option>Informática</option>
                                <option>Enfermagem</option>
                                <option>Segurança do Trabalho</option>
                                <option>Libras</option>
                                <option>Hospedagem</option>
                        </select>
                        <br><br>
                <input type="submit" value="ANOTAR" class="btn float-right text-bold laranja border-laranja bg-branco procurar pointer helveticalg">
                        <br>
                </form>
                </div>
        </div>

        <div class="collapse" id="zerar">
                <div class="container col-md-4 border-laranja border-radius text-center">
                <form method="get" action="zerarAtrasos.php">
                <label class="text-vinte helveticalg">Deseja realmente apagar os atrasos?</label><br>
                <input type="submit" value="SIM" class="btn text-bold laranja border-laranja bg-branco procurar pointer helveticalg">
                </form>
                </div>
        </div>

        <div class="collapse" id="maistres">
                <div class="container col-md-12 border-laranja border-radius text-center">
                <label class="text-quarenta helveticalg">Alunos com mais de 3 atrasos</label>
                <table class="table">
                <thead>
                <tr>
                    <th>NOME</th>
                    <th>FOTO</th> 
                    <th>SERIE</th>
                    <th>CURSO</th>
                    <th>CPF</th> 
                    <th>RG</th>
                    <th>TELEFONE ALUNO</th>
                    <th>TELEFONE RES.</th>
                    <th>EMAIL</th>
                    <th>QTD Atrasos</th>
                    <th>NUMERO SIGE</th>
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
                echo  '<td>'.'<img src="'.$row['foto'].'" height="69" width="69"/>'. '</td>';
                echo '<td>'.$row["serie"] . '</td>';
                echo '<td>'.$row["curso"] . '</td>';
                echo '<td>'.$row["telaluno"] . '</td>';
                echo '<td>'.$row["telresponsavel"] . '</td>';
                echo '<td>'.$row["email"] . '</td>';
                echo '<td>'.$row["qtdAtraso"] . '</td>';
                echo '<td>'.$row["numeroSige"] . '</td><td><a href="'.$url_ver.'">VER ATRASOS</a></td><td><a href="'.$url_alterar.'">ADICIONAR ATRASO</a></td><td><a href="'.$url_apagar.'">EXCLUIR</a></td><td><a href="'.$url_editar.'">EDITAR</a></td></tr>';
                }
                ?>
                </tr>
                </tbody>
                </table>
                </div>
        </div>

        <div class="collapse" id="dts">  
        <div class="container col-md-12 border-laranja border-radius text-center">  
        <label class="text-quarenta helveticalg">Informações dos DTs</label>            
                <table class="table">
                <thead>
                <tr>
                <th>NOME</th>
                <th>FOTO</th> 
                <th>SERIE</th>
                <th>CURSO</th>
                <th>TELEFONE</th> 
                <th>USUARIO</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <?php 
                $query = "SELECT * FROM professor ORDER BY nome";
                $dados = mysqli_query($conexao,$query); 
                
                while($row=mysqli_fetch_array($dados)) 
                {                
                $url_alterar = "editar.php?id=".$row["id"];
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
                <input type="text" name="nome" placeholder="Nome" class="form-control mb-2" required>
                <label class="form-control-label">Foto:</label><input type="file" name="foto" accept="image/*" class="form-control-file mb-2">
                <label class="form-control-label">Série:</label>
                <input type="radio" name="serie" required="" value="1" class="ml-1" id="1ano"> <label for="1ano">1°Ano</label>
                <input type="radio" name="serie" required="" value="2" class="ml-1" id="2ano"> <label for="2ano">2°Ano</label>
                <input type="radio" name="serie" required="" value="3" class="ml-1 mb-2" id="3ano" checked=""><label for="3ano">3°Ano</label>
                
                <select name="curso" class="form-control p-0 mb-2" required="">
                        <option>Selecione o curso</option>
                        <option>Informática</option>
                        <option>Enfermagem</option>
                        <option>Segurança do Trabalho</option>
                        <option>Libras</option>
                        <option>Hospedagem</option>
                </select>
                </script>
                <input type="text" name="telefone" placeholder="Telefone" id="telefone" class="form-control mb-2" required>
                <input type="text" name="usuario" placeholder="Usuário" class="form-control mb-2" required>
                        <div class="form-inline">
                                <input type="password" name="senha" placeholder="Senha" class="form-control mb-2" required><input type="password" name="consenha" placeholder="Confirme Senha" class="form-control mb-2" required>
                        </div>
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
                <label class="form-control-label">Foto:</label><input type="file" name="foto" accept="image/*" class="form-control-file mb-2">
                <label class="form-control-label">Série:</label>
                <input type="radio" name="serie" required value="1" class="ml-1" id="1ano"> <label for="1ano">1°Ano</label>
                <input type="radio" name="serie" required value="2" class="ml-1" id="2ano"> <label for="2ano">2°Ano</label>
                <input type="radio" name="serie" required value="3" class="ml-1 mb-2" id="3ano"><label for="3ano">3°Ano</label>
                
                <select name="curso" class="form-control p-0 mb-2" required="">
                        <option>Selecione o curso</option>
                        <option>Informática</option>
                        <option>Enfermagem</option>
                        <option>Segurança do Trabalho</option>
                        <option>Libras</option>
                        <option>Hospedagem</option>
                </select>
                <div class="form-inline">
                <input type="text" name="rg" placeholder="RG" id="rg" class="form-control mb-2" required>
                <input type="text" name="cpf" placeholder="CPF" id="cpf" class="form-control mb-2" required>
                </div><div class="form-inline">
                <input type="text" name="telAluno" placeholder="Telefone do Aluno" id="telefone" class="form-control mb-2" required>
                <input type="text" name="telResponsavel" placeholder="Telefone do Responsavel" id="telefone" class="form-control mb-2" required>
                </div>
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
                <input type="radio" name="serie" required value="1" class="ml-1" id="1ano"> <label for="1ano">1°Ano</label>
                <input type="radio" name="serie" required value="2" class="ml-1" id="2ano"> <label for="2ano">2°Ano</label>
                <input type="radio" name="serie" required value="3" class="ml-1 mb-2" id="3ano"><label for="3ano">3°Ano</label>
                
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