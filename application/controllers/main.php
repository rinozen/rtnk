<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index()
	{
		$konten = array("brg"=>array());
		$brg    = $this->crud->listBrg();
		foreach ($brg as $a) {
			$beli = $this->crud->brgBeli($a["nama_brg"]);
			$this->arrayBeli($beli);			
			$a["bidr"] = array_sum(array_column($beli,"idr"));
			$a["bbea"] = array_sum(array_column($beli,"bea"));
			$a["bjml"] = array_sum(array_column($beli,"jml"));
			$a["bqty"] = array_sum(array_column($beli,"qty"));
			$a["beli"] = $beli;
			unset($beli);

			$jual         = $this->crud->brgJual($a["nama_brg"]);
			$a["jqty"]    = array_sum(array_column($jual,"qty"));
			$a["jjml"]    = array_sum(array_column($jual,"jml"));
			$a["jlaba"]   = array_sum(array_column($jual,"laba"));
			$a["jongkir"] = array_sum(array_column($jual,"ongkir"));
			$a["jual"]    = $jual;
			unset($jual);
			array_push($konten["brg"],$a);
		}
		unset($brg);

		formatArray($konten);

		$sidebar = sidebar(array("",""));
		$data = array(
			"url"     => base_url(),
			"sidebar" => $this->parser->parse("sidebar/sidebar",$sidebar,true),
			"konten"  => $this->parser->parse("konten/main",$konten,true),
			"js"      => "main"
		);
		$this->load->view("template",$data);
		unset($konten);
		unset($data);
	}
	private function arrayBeli(&$beli){
		foreach ($beli as &$a) {
			$a["bea"]  = $this->crud->getBea($a["order_number"])*$a["qty"];
			$a["jml"]  = $a["bea"]+$a["idr"];
			$a["hsat"] = $a["jml"]/$a["qty"];
		}
	}
}
