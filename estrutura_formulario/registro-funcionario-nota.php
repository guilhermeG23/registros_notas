<?php include("selecao-setor.php"); ?>
<tr>	
	<td><label class="col-form-label">Usuario: </label></td>
	<td><select class="form-control" name="funcionario" id="funcionario">
		<option value="" select>...</option>
		<?php
		$query = "select * from Funcionario";
		$setores = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($setores)) {
		?>
		<option value="<?=$chamada['Chapa'];?>"><?=$chamada['Nome'];?></option>
		<?php
		}
		?>
	</select></td>
</tr>
