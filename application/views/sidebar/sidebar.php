<div class="sidebar unselectable">
	<div class="logo">
		<img src="{url}assets/img/logo.png" />
	</div>
	<a href="{url}" target="_self">
		<div class="menu">
			<i class="fab fa-microsoft fa-fw"></i> Dashboard
		</div>
	</a>
	<div class="menu {trx}">
		<i class="fas fa-bars fa-fw"></i> Transaksi
		<a href="{url}trx/tx" target="_self">
			<div class="submenu {tx}">
				<i class="fas fa-sign-out-alt fa-fw"></i> Penjualan
			</div>
		</a>
		<a href="{url}trx/rx" target="_self">
			<div class="submenu {rx}">
				<i class="fas fa-sign-in-alt fa-fw"></i> Pembelian
			</div>
		</a>
	</div>
	<div class="menu {mst}">
		<i class="fas fa-bars fa-fw"></i> Master
		<a href="{url}mst/brg" target="_self">
			<div class="submenu {brg}">
				<i class="fas fa-gift fa-fw"></i> Barang
			</div>
		</a>
		<a href="{url}mst/sup" target="_self">
			<div class="submenu {sup}">
				<i class="fas fa-warehouse fa-fw"></i> Supplier
			</div>
		</a>
	</div>
	<table class="tstat">
		<tr>
			<th colspan="3" class="hover">
				<i class="fas fa-calendar-alt fa-fw"></i> {bul1}
			</th>
		</tr>
		<tr>
			<td class="fit-td">Laba</td>
			<td class="fit-td"> : Rp. </td>
			<td class="r">{laba1}</td>
		</tr>
		<tr>
			<td class="fit-td">Ongkir</td>
			<td> : Rp. </td>
			<td class="r">{ongkir1}</td>
		</tr>
		<tr>
			<td class="fit-td b">Setoran</td>
			<td class="fit-td b"> : Rp. </td>
			<td class="b r">{setor1}</td>
		</tr>
	</table>
	<table class="tstat">
		<tr>
			<th colspan="3" class="hover">
				<i class="fas fa-calendar-alt fa-fw"></i> {bul2}
			</th>
		</tr>
		<tr>
			<td class="fit-td">Laba</td>
			<td class="fit-td"> : Rp. </td>
			<td class="r">{laba2}</td>
		</tr>
		<tr>
			<td class="fit-td">Ongkir</td>
			<td> : Rp. </td>
			<td class="r">{ongkir2}</td>
		</tr>
		<tr>
			<td class="fit-td b">Setoran</td>
			<td class="fit-td b"> : Rp. </td>
			<td class="b r">{setor2}</td>
		</tr>
	</table>
</div>