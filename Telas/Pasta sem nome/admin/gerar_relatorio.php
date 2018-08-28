<?php 
include '../pdf/mpdf.php';
include '../conexao.php';

$serie = $_GET['serie'];
$curso = $_GET['curso'];

	$result_usuario = "SELECT * FROM alunos WHERE curso='$curso' AND serie='$serie'";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);	
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
	$row=mysqli_fetch_array($resultado_usuario);

      $retorno = "  
<html>
<body>
";  

 $retorno .= '<div><img src="../img/logoPro.png"/></div>';
 $retorno .= '<h1> Turma: '.$serie.'º '.$curso.'</h1>';

 
      $sql = "SELECT * FROM alunos WHERE curso='$curso' AND serie='$serie' AND qtdAtraso > 0"; 
      $ese =  mysqli_query($conexao,$sql);

      $retorno .="<table>";
      $retorno .="<thead>";
      $retorno .="<tr><th>NOME</th><th>SIGE</th><th>ATRASOS</th></tr>";
      $retorno .="</thead>";

	while($row=mysqli_fetch_array($ese)) {
      $sige = $row['numeroSige'];
      $nome = $row['nome'];
      $quantidade = $row['qtdAtraso'];

        $retorno .= "<tr><td>".$nome."</td><td>".$sige."</td><td>".$quantidade."</td></tr>";
        
      }
      $retorno .= "</table>";
      $retorno .= "</body></html>";  


$mpdf = new mPDF('utf-8', 'A4');
$mpdf->SetDisplayMode('fullpage');
$css = file_get_contents("../style/stilo.css");
$mpdf->WriteHTML($css,1);
$mpdf->WriteHTML($retorno);
$mpdf->Output($arquivo, 'I');

?>