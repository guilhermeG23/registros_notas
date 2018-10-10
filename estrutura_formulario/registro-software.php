<tr>
	<td><label class="col-form-label">Serial: </label></td>
	<td colspan="6"><input type="text" class="form-control" onkeyup="limitarinput(this, 30)" value="" id="serial_comum" name="serial_comum" maxlength="30" placeholder="xxxxx-xxxxx-xxxxx-xxxxx-xxxxx" autocomplete="off"></td>
</tr>
<tr>
	<td><label class="col-form-label">Tipo: </label></td>
	<td><select class="form-control" id="tipo" name="tipo">
		<option value="" select>...</option>
		<?php
		$query = "select * from Tipos_Sistemas;";
		$resultado = mysqli_query($conexao_banco, $query);
		while($chamada = mysqli_fetch_array($resultado)) {
		?>
			<option value="<?=$chamada['ID_Tipo'];?>"><?=$chamada['Sistema'];?></option>
		<?php
		}
		?>
	</select></td>
</tr>
<tr>
	<td><label class="col-form-label">versao: </label></td>
	<td><select class="form-control" id="versao" name="versao">
		<option value="" select>...</option>
		<?php
		$query = "select ID_Modelo, Versao from Software_Microsoft_Modelos";
		$resultado = mysqli_query($conexao_banco, $query);
		while($chamada = mysqli_fetch_array($resultado)) {
		?>
			<option value="<?=$chamada['ID_Modelo'];?>"><?=$chamada['Versao'];?></option>
		<?php
		}
		?>
	</select></td>
</tr>
