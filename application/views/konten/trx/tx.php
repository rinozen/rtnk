<?php
	$this->load->view("konten/trx/newTx");
?>
{jual}
	<div class="box" data-media="{media}">
		<div class="nbox" data-media="{media}">
			<i class="fas fa-tags fa-fw"></i> Transaksi via {media}
		</div>
		<table class="tmaster">
			<tr>
				<td class="fit-td">Id Jual</td>
				<td class="spc">:</td>
				<td style="width:275px">{id_jual}</td>
				<td></td>
				<td class="fit-td">Kurir</td>
				<td class="spc">:</td>
				<td style="width:275px">{kurir}</td>
			</tr>
			<tr>
				<td class="fit-td">Tanggal</td>
				<td class="spc">:</td>
				<td>{tgl}</td>
				<td></td>
				<td class="fit-td">Nomor Resi</td>
				<td class="spc">:</td>
				<td data-resi="{no_resi}" data-id="{id_jual}">{no_resi}</td>
			</tr>
			<tr>
				<td class="fit-td">Buyer</td>
				<td class="spc">:</td>
				<td>{buyer}</td>
				<td></td>
				<td class="fit-td">Status</td>
				<td class="spc">:</td>
				<td class="stat unselectable" data-stat="{stat}" data-id="{id_jual}">{stat}</td>
			</tr>
		</table>
		<table class="tdtil">
			<tr>
				<th class="fit-td"></th>
				<th>Nama Barang</th>
				<th style="width: 100px">Harga Jual</th>
				<th style="width: 100px">Harga Modal</th>
				<th style="width: 55px">Qty</th>
				<th style="width: 100px">Jumlah Jual</th>
				<th style="width: 100px">Jumlah Modal</th>
				<th style="width: 90px">Laba</th>
			</tr>
			{dtil}
				<tr>
					<td>
						<img src="<?=$url?>assets/img/icon/{nama_brg}.jpg?<?=date("his")?>"/>
					</td>
					<td class="b">{nama_brg}</td>
					<td class="r">{harga}</td>
					<td class="r">{modal}</td>
					<td class="r b">{qty}</td>
					<td class="r b">{jml}</td>
					<td class="r b">{jmod}</td>
					<td class="r b">{laba}</td>
				</tr>
			{/dtil}
			<tr>
				<td class="r b nobor" colspan="5">
					<i class="fas fa-calculator fa-fw"></i> Total
				</td>
				<th class="r">{jjml}</th>
				<th class="r">{jjmod}</th>
				<th class="r">{jlaba}</th>
			</tr>
			<tr>
				<td class="r b nobor" colspan="5">
					<i class="fas fa-shipping-fast fa-fw"></i> Ongkir
				</td>
				<th class="r">{ongkir}</th>
			</tr>
			<tr>
				<td class="r b nobor" colspan="5">
					<i class="fas fa-book fa-fw"></i> Total Transaksi
				</td>
				<th class="r">{tot}</th>
			</tr>
		</table>
	</div>
{/jual}