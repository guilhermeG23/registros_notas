<?php
include("../banco/banco.php");
header('Content-type: application/pdf');
$chamada=mysqli_fetch_array(mysqli_query($conexao_banco, "select Nota_PDF from Nota_Fiscal where Nota_Fiscal = '{$_POST['view']}';"));
echo $chamada["Nota_PDF"];
die();
