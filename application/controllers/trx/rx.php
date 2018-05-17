<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rx extends CI_Controller {
	public function index(){
		$konten = array("beli"=>array());
		$beli   = $this->crud->listBeli();

		foreach ($beli as $a){
			$bea         = $this->crud->getBea($a["order_number"]);
			$dtil        = $this->crud->dtilBeli($a["order_number"]);
			$this->arrayDtil($dtil, $bea);
			$a["jusd"] = array_sum(array_column($dtil,"usd"));
			$a["jidr"] = array_sum(array_column($dtil,"idr"));
			$a["jbea"] = array_sum(array_column($dtil,"bea"));
			$a["jjml"] = array_sum(array_column($dtil,"jml"));
			$a["dtil"] = $dtil;
			array_push($konten["beli"],$a);
			unset($dtil);
		}
		unset($beli);

		formatArray($konten);
		$sidebar = sidebar(array("trx","rx"));
		$data = array(
			"url"     => base_url(),
			"sidebar" => $this->parser->parse("sidebar/sidebar",$sidebar,true),
			"konten"  => $this->parser->parse("konten/trx/rx",$konten,true),
			"js"      => "rx"
		);
		$this->load->view("template",$data);
		unset($konten);
		unset($data);
	}
	private function arrayDtil(&$dtil, $bea){
		foreach ($dtil as &$a) {
			$a["bea"]  = $bea*$a["qty"];
			$a["jml"]  = $a["idr"]+$a["bea"];
			$a["hsat"] = $a["jml"]/$a["qty"];
		}
	}
	public function setTerima(){
		$id     = $_POST["id"];
		$terima = $_POST["terima"];
		$bea    = $_POST["bea"];
		if ($terima=="1") {
			$this->crud->setTerima($id, $bea);
		} else {
			$this->crud->setTidakTerima($id);
		}
	}
}