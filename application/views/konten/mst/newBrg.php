<div class="box" data-media="newTx">
	<div class="nbox" data-media="newTx">
		<span class="fas fa-plus-circle fa-fw"></span> Barang Baru
	</div>
	<table class="tmaster">
		<tr>
			<td class="fit-td">Nama Barang</td>
			<td class="spc">:</td>
			<td>
				<div id="input">
					<i class="fas fa-gift fa-fw"></i>
					<input type="text" id="nb" placeholder="Nama Barang" size="50">
				</div>
			</td>
		</tr>
		<tr>
			<td class="fit-td">Tipe Barang</td>
			<td class="spc">:</td>
			<td>
				<select>
					{tipe}
						<option value="{tipe_brg}">
							{tipe_brg}
						</option>
					{/tipe}
				</select>
			</td>
		</tr>
		<tr>
			<td colspan="3" class="btn-save unselectable">
				<i class="fas fa-save fa-fw"></i> Simpan
			</td>
		</tr>
	</table>
</div>