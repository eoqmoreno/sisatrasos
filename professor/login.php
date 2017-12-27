<!DOCTYPE html>
<html>
    <head>
        <title>Página do Professor</title>
    </head>
<?php
include "../header.php";
?>
<body class="bg-branco">
        <a title="voltar" class="bg-laranja helveticalg preto pointer text-bold m-0 p-2 pt-2 voltar" onclick="voltar()"><span class="fa fa-arrow-circle-o-left" aria-hidden="true"></span> Voltar</a> 
        <div class="container col-md-4 border-laranja border-radius pt-3 pb-2 pr-5 pl-5 mt-5 text-center">
            <label class="text-quarenta helveticalg">Diretor de Turma</label>

            <form action="loga.php" class="m-0 p-0 mt-2" method="post">
                <input class="form-control helveticalg mb-2" required type="text" name="usuario" placeholder="Usuário">
                <input class="form-control helveticalg" required type="password" name="senha" placeholder="Senha">
                <input type="submit" value="ENTRAR" class="btn float-right mt-1 text-bold laranja border-laranja bg-branco procurar pointer helveticalg"><br><br>
            </form>
        </div>
</body>
</html>