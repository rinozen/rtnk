<?php
	$this->load->view("konten/mst/newSup");
?>
{sup}
	<div class="box" data-sup="{nama_supplier}" data-media="WhatsApp">
		<div class="nbox" data-media="WhatsApp">
			<i class="fas fa-tags fa-fw"></i> 
			<a href="{link_supplier}" target="_blank">{nama_supplier}</a>
		</div>
		<table class="tdtil">
			<tr>
				<th style="width:110px">Order Number</th>
				<th style="width:100px">Tanggal</th>
				<th>Items</th>
				<th style="width:65px">Bea</th>
				<th style="width:75px">Status</th>
			</tr>
			{dtil}
				<tr>
					<td class="b c top">{order_number}</td>
					<td class="c b top">{tgl}</td>
					<td>
						{brg}
							<div>
								<img src="<?=$url?>/assets/img/icon/{nama_brg}.jpg?<?=date("his")?>">
								<a href="{link_brg}">{nama_brg}</a>
							</div>
						{/brg}
					</td>
					<td class="b r top">{bea}</td>
					<td data-stat="{stat}" class="b c top">{stat}</td>
				</tr>
			{/dtil}
		</table>
	</div>
{/sup}