<tr>
	<td><label class="col-form-label">Marca: </label></td>
	<td><select class="form-control" name="marca" id="marca" required>
		<option value="" select>...</option>
		<?php
		$query = "select * from vw_marca_arrumada";
		$resultado = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($resultado)) {
		?>
		<option value="<?=$chamada['ID_Marca'];?>"><?=$chamada['Marca'];?></option>
		<?php
		}
		?>
	</select></td>
</tr>
<tr>
	<td><label class="col-form-label">Modelo: </label></td>
	<td><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="" id="modelo" name="modelo" maxlength="100" placeholder="EX: Modelo" autocomplete="off" required></td>
</tr>
<tr>
	<td><label class="col-form-label">Serial:</label></td>
	<td><input type="number" class="form-control" onkeyup="limitarInput(this, 44)" value="" id="sn" name="sn" maxlenght="44" placeholder="EX: 000000000" autocomplete="off" required></td>
</tr>
