<?php
	function formatArray(&$array){	
		array_walk_recursive($array,function(&$item,$key){
			$cs = array("order_number","id_jual","no_resi");
			$cq = array("qty","bqty","jqty");
			if (is_numeric($item)){
				if(!in_array($key,$cs)){
					if(in_array($key,$cq)){
						$item = number_format($item);
					} else {
						$item = number_format($item,2);
					}
				}
			}
		});
	}
	function sidebar($menu){
		$ci      = & get_instance();
		$bul     = date('Y-m', strtotime('first day of previous month'));
		$laba1   = $ci->crud->getLaba($bul);
		$ongkir1 = $ci->crud->getOngkir($bul);
		$bul     = date('Y-m');
		$laba2   = $ci->crud->getLaba($bul);
		$ongkir2 = $ci->crud->getOngkir($bul);
		$data    = array(
			"url"     => base_url(),
			"trx"     => "",
			"tx"      => "",
			"rx"      => "",
			"mst"     => "",
			"brg"     => "",
			"sup"     => "",
			"bul1"    => date('F Y', strtotime('first day of previous month')),
			"bul2"    => date('F Y'),
			"laba1"   => number_format($laba1,2),
			"ongkir1" => number_format($ongkir1,2),
			"laba2"   => number_format($laba2,2),
			"ongkir2" => number_format($ongkir2,2),
			"setor1"  => number_format((0.75*$laba1)+$ongkir1,2),
			"setor2"  => number_format((0.75*$laba2)+$ongkir2,2)
		);
		if($menu){
			$data[$menu[0]] = "page";
			$data[$menu[1]] = "spage";
		}
		return $data;
	}
?>