<?php
include("../banco/banco.php");
$query = "select * from Setor";
$setores = mysqli_query($conexao_banco, $query);
while($chamada = mysqli_fetch_array($setores)) {
echo $chamada['Setor'];
}
?>
