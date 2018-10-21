<?php
include("../banco/banco.php");
$deletar = $_POST["deletar"];
echo $deletar;
$query = "delete from Produto where ID_Produto = '{$deletar}';";
mysqli_query($conexao_banco, $query);
header("Location: index.php");
die();
