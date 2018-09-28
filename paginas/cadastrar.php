<?php
include("../banco/banco.php");
$serial = $_POST['sn'];
$nota = $_POST['nota'];
$data = $_POST['data_entrada'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$setor = $_POST['setor'];
$usuario = $_POST['usuario'];
$query = "insert into Nota_Fiscal values({$nota}, '2018-12-12');";
mysqli_query($conexao_banco, $query);
$query = "insert into Maquina values('{$serial}', '{$marca}', '{$modelo}', 1111111111);";
mysqli_query($conexao_banco, $query);
header("Location: index.php");
