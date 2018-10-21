<?php
include("../banco/banco.php");
$deletar = $_POST["deletar"];
echo $deletar;
$query = "delete from Produto where ID_Nota = '{$deletar}';";
mysqli_query($conexao_banco, $query);
$query = "delete from Nota_Fiscal where Nota_Fiscal = '{$deletar}';";
mysqli_query($conexao_banco, $query);
header("Location: index.php");
die();
