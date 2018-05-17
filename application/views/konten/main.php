{brg}
	<div class="box">
		<div class="nbox">
			<img src="<?=$url?>assets/img/icon/{nama_brg}.jpg"/> {nama_brg}
		</div>
		<div class="lbrg beli">
			<i class="far fa-hand-point-right fa-fw"></i> Pembelian :
		</div>
		<table class="tbeli">
			<tr>
				<th style="width:90px">Order Number</th>
				<th style="width:57px">Tanggal</th>
				<th>Supplier</th>
				<th class="fit-td">Link</th>
				<th style="width:65px">Kurs</th>
				<th style="width:40px">USD</th>
				<th style="width:90px">IDR</th>
				<th style="width:75px">Bea</th>
				<th style="width:90px">Total</th>
				<th style="width:55px">Qty</th>
				<th style="width:85px">Harga Satuan</th>
				<th style="width:50px">Status</th>
			</tr>
			{beli}
				<tr>
					<td class="b c beli">{order_number}</td>
					<td class="c">{tgl}</td>
					<td>
						<a href="{link_supplier}" target="_blank">{nama_supplier}</a>
					</td>
					<td class="c">
						<a href="{link_brg}" target="_blank"><i class="fas fa-share-square fa-fw"></i></a>
					</td>
					<td class="r">{kurs}</td>
					<td class="r">{usd}</td>
					<td class="r beli b">{idr}</td>
					<td class="r beli b">{bea}</td>
					<td class="r beli b">{jml}</td>
					<td class="r beli b">{qty}</td>
					<td class="r beli b">{hsat}</td>
					<td class="c b" data-stat="{stat}">{stat}</td>
				</tr>
			{/beli}
			<tr>
				<td colspan="6" class="b r beli nobor">
					<i class="fas fa-calculator fa-fw"></i> Total
				</td>
				<th class="r">{bidr}</th>
				<th class="r">{bbea}</th>
				<th class="r">{bjml}</th>
				<th class="r">{bqty}</th>
			</tr>
		</table>
		<div class="lbrg jual">
			<i class="far fa-hand-point-right fa-fw"></i> Penjualan :
		</div>
		<table class="tjual">
			<tr>
				<th style="width:35px">Id Jual</th>
				<th style="width:57px">Tanggal</th>
				<th>Buyer</th>
				<th style="width:55px">Media</th>
				<th style="width:70px">Modal</th>
				<th style="width:70px">Jual</th>
				<th style="width:55px">Qty</th>
				<th style="width:90px">Jumlah</th>
				<th style="width:75px">Laba</th>
				<th style="width:60px">Ongkir</th>
				<th class="fit-td">Kurir</th>
				<th style="width:110px">Nomor Resi</th>
				<th style="width:50px">Status</th>
			</tr>
			{jual}
				<tr>
					<td class="b c jual">{id_jual}</td>
					<td class="c">{tgl}</td>
					<td>{buyer}</td>
					<td class="c" data-media="{media}">{media}</td>
					<td class="r">{modal}</td>
					<td class="r">{harga}</td>
					<td class="r b jual">{qty}</td>
					<td class="r b jual">{jml}</td>
					<td class="r b jual">{laba}</td>
					<td class="r b jual">{ongkir}</td>
					<td class="c">{kurir}</td>
					<td class="c">{no_resi}</td>
					<td class="c b" data-stat="{stat}">{stat}</td>
				</tr>
			{/jual}
			<tr>
				<td colspan="6" class="b r jual nobor">
					<i class="fas fa-calculator fa-fw"></i> Total
				</td>
				<th class="r">{jqty}</th>
				<th class="r">{jjml}</th>
				<th class="r">{jlaba}</th>
				<th class="r">{jongkir}</th>
			</tr>
		</table>
	</div>
{/brg}