<?php
	$this->load->view("konten/mst/newBrg");
?>

<div class="cardBrg">
	{brg}
		<div class="card" data-brg="{nama_brg}">
			<input type="file" style="display: none;" data-brg="{nama_brg}" accept=".jpg,.jpeg">
			<img src="<?=$url?>assets/img/icon/{nama_brg}.jpg?<?=date("his")?>" data-brg="{nama_brg}">
			<div class="label">
				{nama_brg}
			</div>
		</div>
	{/brg}
</div>