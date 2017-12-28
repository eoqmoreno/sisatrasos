<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="content-type" content="text/html; charset=ISO-8859-1">

<!-- Responsividade -->
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="../style/style.css">

<link rel="stylesheet" href="../style/bootstrap.min.css">
<link rel="stylesheet" href="../style/bootstrap.min.css.map">
<link rel="stylesheet" href="../style/bootstrap.css">
<link rel="stylesheet" href="../style/bootstrap.css.map">

<link rel="stylesheet" href="../font-awesome/css/font-awesome.min.css">

<script src="../js/jquery-3.2.1.slim.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/bootstrap.js"></script>

<title>Adicionar Aluno</title>

<nav class="navbar navbar-toggleable-md bg-cinza border-bottom-branco">

<img class="img-vinte m-0 p-0" src="../img/logoPro.png">

<button class="navbar-toggler border-radius border-laranja" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars laranja"></span>
  </button>
<?php
if(isset($nome) &&$nome != null){
if($tipo == "aluno"){
echo '<div class="collapse navbar-collapse text-center border-radius border-branca p-1" id="navbarNav">
                 <script>
                        window.onload = function what(){
                        
                        document.getElementById("nome").innerHTML ="'.$nome.'";
                        document.getElementById("info").innerHTML ="'.$serie.'º '.$curso.'";
                        document.getElementById("img").setAttribute("src","'.$img.'");
                        };
                 </script>
             <img id="img" class="img-foto border-laranja">
             <div class="d-inline-block align-middle m-1 text-left">
             <label id="nome" class="text-dez helvetica laranja m-0 d-block"></label>
             <label id="info" class="text-dez helvetica branco m-0"></label>
             </div>
        </div>';
}elseif($tipo=="apt"){
echo '<div class="collapse navbar-collapse text-center border-radius border-branca p-1" id="navbarNav">
                 <script>
                        window.onload = function what(){
                        
                        document.getElementById("nome").innerHTML ="'.$nome.'";
                        document.getElementById("info").innerHTML ="'.$usu.'";
                        document.getElementById("img").setAttribute("src","'.$img.'");
                        };
                 </script>
             <img id="img" class="img-foto border-laranja">
             <div class="d-inline-block m-1 text-left align-middle">
             <label id="nome" class="text-dez helvetica laranja m-0 d-block"></label>
             <label id="info" class="text-dez helvetica branco m-0"></label>
             </div>
        </div>';
}else{
echo '<div class="collapse navbar-collapse text-center border-radius border-branca p-1" id="navbarNav">
                 <script>
                        window.onload = function what(){
                        
                        document.getElementById("nome").innerHTML ="'.$nome.'";
                        document.getElementById("info").innerHTML ="'.$serie.'º '.$curso.'";
                        document.getElementById("img").setAttribute("src","'.$img.'");
                        };
                 </script>
             <img id="img" class="img-foto border-laranja">
             <div class="d-inline-block m-1 text-left align-middle">
             <label id="nome" class="text-dez helvetica laranja m-0 d-block"></label>
             <label id="info" class="text-dez helvetica branco m-0"></label>
             </div>
        </div>';
}


}else{
echo '  <div class="collapse navbar-collapse text-center" id="navbarNav">
            <a class="dropdown-item verde w-content ml-3 p-0" href="../"><span class="fa fa-home text-vinte d-inline" aria-hidden="true"></span> Página Inicial</a>
            <a class="dropdown-item verde w-content ml-3 p-0" href="../aluno"><span class="fa fa-user-circle" aria-hidden="true"></span> Aluno</a>
            <a class="dropdown-item verde w-content ml-3 p-0" href="../professor"><span class="fa fa-graduation-cap" aria-hidden="true"></span> Professor Diretor de Turma</a>
            <a class="dropdown-item verde w-content ml-3 p-0" href="../apontador"><span class="fa fa-address-card" aria-hidden="true"></span> Apontador de Atraso</a>
        </div>';
}
?>
  
</nav>
<script src="//cdnjs.cloudflare.com/ajax/libs/tether/1.4.3/js/tether.min.js"></script>
<div class="bg-laranja pb-1"></div>