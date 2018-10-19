<input type="hidden" class="form-control" value="" id="contador" name="contador" maxlength="100" placeholder="" autocomplete="off"></td>
<div class="form-group">
	<table class="table">			
		<tr>
			<td><label class="col-form-label">N Nota</label></td>
			<td colspan="6"><input type="number" class="form-control" onkeyup="limitarInput(this,11)"  value="" id="nota" name="nota" maxlength="44" placeholder="EX: N Nota" autocomplete="off" required></td>
		</tr>
		<tr>
			<td><label class="col-form-label">Chave</label></td>
			<td colspan="6"><input type="number" class="form-control" onkeyup="limitarInput(this,15)"  value="" id="chave" name="chave" maxlength="15" placeholder="EX: Chave" autocomplete="off" required></td>
		</tr>
		<tr>
			<td><label class="col-form-label">Emissao: </label></td>
			<td colspan="6"><input type="text" class="form-control data" onkeyup="limitarInput(this,10)" value="" id="data_entrada" name="data_entrada" maxlength="10" placeholder="EX: dd/mm/yyyy" autocomplete="off" required></td>
		</tr>
		<tr>
			<td><label class="col-form-label">Empresa: </label></td>
			<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this,100)" value="" id="empresa" name="empresa" maxlength="100" placeholder="EX: Empresa da nota" autocomplete="off" required>		
		</tr>
		<tr>
			<td><label class="col-form-label">Arquivo: </label></td>
			<td colspan="6"><input type="file" accept="application/pdf" class="btn" id="arq" name="arq" required></td>
		</tr>
		<tr>
			<td><label class="col-form-label">Setor: </label></td>
			<td colspan="6"><select class="form-control" id="setor" name="setor" required>
				<option value="" select>...</option>
				<?php
				$query = "select * from Setor";
				$setores = mysqli_query($conexao_banco, $query);
				while($chamada = mysqli_fetch_array($setores)) {
				?>
				<option value="<?=$chamada['Centro_Custo']?>"><?=$chamada['Setor'];?></option>
				<?php
				}
				?>
			</select></td>
		</tr>
		<tr>
			<td><label class="col-form-label">Funcionario: </label></td>
			<td colspan="6"><input type="text" class="form-control" onkeyup="limitarInput(this, 100)" maxlength="100" value="" id="funcionario" name="funcionario" placeholder="Ex: Nome" autocomplete="off"></td>
		</tr>
		<tr>
			<td colspan="6" class="alinhar-direita">
				<button type="button" class="btn" style="cursor: pointer;" onclick="duplicarCampos();">Add</button>
				<button type="button" class="btn" style="cursor: pointer;" onclick="removerCampos();">Remove</button>
			</td>
		</tr>
		<table id="destino" class="table">
			<tr>
				<td><label class="col-form-label">Equipamento: </label></td>
				<td><label class="col-form-label">Marca: </label></td>
				<td><label class="col-form-label">Descricao: </label></td>
				<td><label class="col-form-label">Serial: </label></td>
				<td><label class="col-form-label">Atual: </label></td>
			</tr>
		</table>
		<table style="display: none;">
			<tr id="clonar">
			<td colspan="1"><select class="form-control" value="" id="Equipamento" name="Equipamento" required>
				<option value="" select>...</option>
				<?php
				$query = "select * from Modelos";
				$setores = mysqli_query($conexao_banco, $query);
				while($chamada = mysqli_fetch_array($setores)) {
				?>
				<option value="<?=$chamada['ID_Modelo']?>"><?=$chamada['Modelo'];?></option>
				<?php
				}
				?>
			</select></td>	
			<td colspan="1"><select class="form-control" value="" id="Marca" name="Marca" maxlength="100" placeholder="" autocomplete="off" required>
				<option value="" select>...</option>
				<?php
				$query = "select * from Marcas";
				$setores = mysqli_query($conexao_banco, $query);
				while($chamada = mysqli_fetch_array($setores)) {
				?>
				<option value="<?=$chamada['ID_Marca']?>"><?=$chamada['Marca'];?></option>
				<?php
				}
				?>
			</select></td>
			<td colspan="1"><input type="text" class="form-control" value="" id="Descricao" name="Descricao" maxlength="100" placeholder="" autocomplete="off" required></td>
			<td colspan="1"><input type="text" class="form-control" value="" id="Serial" name="Serial" maxlength="100" placeholder="" autocomplete="off"></td>
			<td colspan="1"><select class="form-control" value="" id="Localatual" name="Atual" maxlength="100" placeholder="" autocomplete="off" required>
				<option value="" select>...</option>
				<?php
				$query = "select * from Setor";
				$setores = mysqli_query($conexao_banco, $query);
				while($chamada = mysqli_fetch_array($setores)) {
				?>
				<option value="<?=$chamada['Centro_Custo']?>"><?=$chamada['Setor'];?></option>
				<?php
				}
				?>
			</select></td>
			</tr>
		</table>
	</table>
</div>
