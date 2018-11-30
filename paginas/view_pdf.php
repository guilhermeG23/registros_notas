<?php
#Incluir banco
include("../banco/banco.php");
#Habilitando pagina para entender pdf
header('Content-type: application/pdf');
#Executando query sql
$chamada=mysqli_fetch_array(mysqli_query($conexao_banco, "select Nota_PDF from Nota_Fiscal where Nota_Fiscal = '{$_POST['view']}';"));
#printando nota na pagina web
echo $chamada["Nota_PDF"];
#Matar pagina
die();
