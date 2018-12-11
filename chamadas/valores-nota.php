<?php
#Padronizar nos dois locais que usam as mesmas variaveis e tratamentos

#Seguranca javascript caso nao rodar
$contador = limpar_entrada_numero($_POST["contador"]);

#tratamento para atribuir valores as variaveis
$data = tratamento_entrada_data(limpar_entrada_numero($_POST["data_entrada"]));
$funcionario = tratamento_entrada_palavra($_POST["funcionario"]);
$relacao = limpar_entrada_numero($_POST["relacao"]);
$valor_cnpj = limpar_entrada_numero($_POST["cnpj"]);
$empresa = tratamento_entrada_palavra($_POST["empresa"]);
$setor = tratamento_uppercase($_POST["setor"]);

#cadastrar empresa caso ela nao exista
if(confirma_cnpj($conexao_banco, $valor_cnpj)) {
	cadastrar_cnpj($conexao_banco, $valor_cnpj, $empresa);
} else {
	atualizar_cnpj($conexao_banco, $valor_cnpj, $empresa);
}
