<?php
	$this->load->view("konten/trx/newRx");
?>
{beli}
	<div class="box" data-media="Bukalapak">
		<div class="nbox" data-media="Bukalapak">
			<i class="fas fa-tags fa-fw"></i> Order Number : {order_number}
		</div>
		<table class="tmaster">
			<tr>
				<td class="fit-td">Tanggal</td>
				<td class="spc">:</td>
				<td style="width: 275px">{tgl}</td>
				<td></td>
				<td class="fit-td">Status</td>
				<td class="spc">:</td>
				<td data-stat="{stat}" data-id="{order_number}">{stat}</td>
			</tr>
			<tr>
				<td class="fit-td">Supplier</td>
				<td class="spc">:</td>
				<td>
					<a href="{link_supplier}" target="_blank">
						{nama_supplier}
					</a>
				</td>
				<td></td>
				<td class="fit-td">Bea</td>
				<td class="spc">:</td>
				<td style="width: 275px" class="bea" data-id="{order_number}">{bea}</td>
			</tr>
			<tr>
				<td class="fit-td">Kurs</td>
				<td class="spc">:</td>
				<td>{kurs}</td>
				<td></td>
				<td></td>
				<td></td>
				<td class="btn-set" data-id="{order_number}">
					<button class="terima">
						<i class="fas fa-check-circle fa-fw"></i> Terima
					</button>
					<button class="tidak-terima">
						<i class="fas fa-minus-circle fa-fw"></i> Tidak Terima
					</button>
				</td>
			</tr>
		</table>
		<table class="tdtil">
			<tr>
				<th class="fit-td"></th>
				<th>Nama Barang</th>
				<th style="width: 65px;">USD</th>
				<th style="width: 100px;">IDR</th>
				<th style="width: 75px;">Bea</th>
				<th style="width: 100px;">Jumlah</th>
				<th style="width: 55px;">Qty</th>
				<th style="width: 100px;">Harga Satuan</th>
			</tr>
			{dtil}
				<tr>
					<td><img src="<?=$url?>assets/img/icon/{nama_brg}.jpg?<?=date("his")?>"></td>
					<td class="b">
						<a href="{link_brg}" target="_blank">
							{nama_brg}
						</a>
					</td>
					<td class="r b">{usd}</td>
					<td class="r b">{idr}</td>
					<td class="r b">{bea}</td>
					<td class="r b">{jml}</td>
					<td class="r b">{qty}</td>
					<td class="r b">{hsat}</td>
				</tr>
			{/dtil}
			<tr>
				<td colspan="2" class="r b nobor">
					<i class="fas fa-calculator fa-fw"></i> Total
				</td>
				<th class="r b">{jusd}</th>
				<th class="r b">{jidr}</th>
				<th class="r b">{jbea}</th>
				<th class="r b">{jjml}</th>
			</tr>
		</table>
	</div>
{/beli}