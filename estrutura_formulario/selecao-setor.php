<tr>
	<td><label class="col-form-label">Setor: </label></td>
	<td><select class="form-control" name="setor" id="setor">
		<option value="" select>...</option>
		<?php
		$query = "select * from Setor";
		$setores = mysqli_query($conexao_banco, $query);
		while($chamada=mysqli_fetch_array($setores)) {
		?>
		<option value="<?=$chamada['Setor_ID'];?>"><?=$chamada['Setor'];?></option>
		<?php
		}
		?>
	</select></td>
</tr>
