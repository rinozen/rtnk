
<div class="box" data-media="newTx">
	<div class="nbox" data-media="newTx">
		<span class="fas fa-plus-circle fa-fw"></span> Transaksi Baru
	</div>
	<table class="tmaster">
		<tr>
			<td class="fit-td">Media</td>
			<td class="spc">:</td>
			<td style="width: 275px">
				<select id="media" tabindex="1" data-ti="1">
					<option value="Tokopedia">Tokopedia</option>
					<option value="Bukalapak">Bukalapak</option>
					<option value="Shopee">Shopee</option>
					<option value="WhatsApp">WhatsApp</option>
					<option value="Lainnya">Lainnya</option>
				</select>
			</td>
			<td></td>
			<td class="fit-td">Kurir</td>
			<td class="spc">:</td>
			<td style="width: 275px">
				<select id="kurir" tabindex="4" data-ti="4">
					<option value="JNE">JNE</option>
					<option value="J&T">J&T</option>
					<option value="Pos">Pos</option>
					<option value="Ext">Ext</option>
				</select>
			</td>
		</tr>
		<tr>
			<td class="fit-td">Tanggal</td>
			<td class="spc">:</td>
			<td style="width: 275px">
				<input type="hidden" id="tgl">
				<div id="input">
					<span class="fas fa-calendar-alt fa-fw"></span>
					<input type="text" id="dp" placeholder="Tanggal Jual" tabindex="2" data-ti="2">
				</div>
			</td>
			<td></td>
			<td class="fit-td">Ongkos Kirim</td>
			<td class="spc">:</td>
			<td style="width: 275px">
				<div id="input">
					<span class="fas fa-shipping-fast fa-fw"></span>
					<input type="text" id="ongkir" placeholder="Ongkos Kirim" class="angka" tabindex="5" data-ti="5">
				</div>
			</td>
		</tr>
		<tr>
			<td class="fit-td">Buyer</td>
			<td class="spc">:</td>
			<td style="width: 275px">
				<div id="input">
					<span class="fas fa-user fa-fw"></span>
					<input type="text" id="buyer" placeholder="Nama Pembeli" tabindex="3" data-ti="3">
				</div>
			</td>
			<td></td>
			<td class="fit-td">Add Barang</td>
			<td class="spc">:</td>
			<td>
				<div id="input">
					<i class="fas fa-search fa-fw"></i>
					<input type="text" tabindex="6" id="cbrg" placeholder="Cari Barang">
					<ul id="lsbrg"></ul>
				</div>
			</td>
		</tr>
	</table>
	<table class="addBrg" id="tAddBrg">
		<tr>
			<td class="b fit-td">Nama Barang</td>
			<td class="fit-td">:</td>
			<td id="xnb" class="b" colspan="11"></td>
		</tr>
		<tr>
			<td class="fit-td">Harga Modal</td>
			<td class="fit-td">:</td>
			<td class="fit-td"><select id="xmodal" tabindex="7"></select></td>
			<td class="spc"></td>
			<td class="fit-td">Harga Jual</td>
			<td class="fit-td">:</td>
			<td class="fit-td">
				<div id="input">
					<i class="fas fa-calculator fa-fw"></i>
					<input type="text" id="xharga" tabindex="8" class="angka" placeholder="Harga Jual" size="7">
				</div>
			</td>
			<td class="spc"></td>
			<td class="fit-td">Qty</td>
			<td class="fit-td">:</td>
			<td class="fit-td">
				<div id="input">
					<i class="fas fa-calculator fa-fw"></i>
					<input type="text" id="xqty" tabindex="9" class="angka" placeholder="Quantity" size="7">
				</div>
			</td>
			<td></td>
			<td class="fit-td unselectable">
				<button id="btn-add" tabindex="10">
					<i class="fas fa-cart-plus fa-fw"></i> Add Barang
				</button>
			</td>
		</tr>
	</table>
	<table class="tdtil">
		<tr>
			<th class="fit-td"></th>
			<th>Nama Barang</th>
			<th style="width: 100px">Harga Modal</th>
			<th style="width: 100px">Harga Jual</th>
			<th style="width: 55px">Qty</th>
			<th style="width: 100px">Jumlah Modal</th>
			<th style="width: 100px">Jumlah Jual</th>
			<th style="width: 75px">Laba</th>
			<th style="width: 75px">Aksi</th>
		</tr>
		<tr id="sum">
			<td colspan="5" class="r b nobor">
				<span class="fas fa-calculator fa-fw"></span> Total
			</td>
			<th class="r jmod">0.00</th>
			<th class="r jml">0.00</th>
			<th class="r jlaba">0.00</th>
			<td class="btn-save unselectable" id="btn-save">
				<span class="fas fa-save fa-fw"></span> Simpan
			</td>
		</tr>
	</table>
</div>

<table class="tempTR">	
	<tr>
		<td class="ximg"><img src=""/></td>
		<td class="xnb"></td>
		<td class="r xmodal"></td>
		<td class="r xharga"></td>
		<td class="r xqty"></td>
		<td class="r b xjmod"></td>
		<td class="r b xjml"></td>
		<td class="r b xlaba"></td>
		<td class="btn-del unselectable">
			<i class="fas fa-window-close fa-fw"></i> Hapus
		</td>
	</tr>
</table>