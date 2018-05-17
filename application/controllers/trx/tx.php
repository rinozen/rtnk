<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tx extends CI_Controller {
	public function index(){
		$konten = array("jual"=>array());
		$jual   = $this->crud->listJual();

		foreach ($jual as $a){
			$dtil       = $this->crud->dtilJual($a["id_jual"]);
			$a["jjmod"] = array_sum(array_column($dtil,"jmod"));
			$a["jjml"]  = array_sum(array_column($dtil,"jml"));
			$a["jlaba"] = array_sum(array_column($dtil,"laba"));
			$a["tot"]   = $a["jjml"]+$a["ongkir"];
			$a["dtil"]  = $dtil;
			unset($dtil);
			array_push($konten["jual"],$a);
		}
		unset($jual);

		formatArray($konten);
		$sidebar = sidebar(array("trx","tx"));
		$data = array(
			"url"     => base_url(),
			"sidebar" => $this->parser->parse("sidebar/sidebar",$sidebar,true),
			"konten"  => $this->parser->parse("konten/trx/tx",$konten,true),
			"js"      => "tx"
		);
		$this->load->view("template",$data);
		unset($konten);
		unset($data);
	}
	public function setResi(){
		$id   = $_POST["id"];
		$resi = $_POST["resi"];
		$this->crud->setResi($id,$resi);
	}	
	public function setSelesai(){
		$id = $_POST["id"];
		$this->crud->setSelesai($id);
	}
	public function lsbrg(){
		$nb = $_POST["nb"];
		echo json_encode($this->crud->lsbrg($nb));
	}
	public function getModal(){
		$nb  = $_POST["nb"];
		$brg = $this->crud->getModal($nb);
		$aMod = array();
		foreach ($brg as $a) {
			$bea   = $this->crud->getBea($a["order_number"])*$a["qty"];
			$jml   = $a["idr"]+$bea;
			$modal = $jml/$a["qty"];
			array_push($aMod,array(
				"modal" => $modal,
				"xmod"  => number_format($modal,2)
			));
		}
		echo json_encode($aMod);
	}
	public function saveJual(){
		$id     = $this->crud->getIdJual();
		$media  = $_POST["media"];
		$tgl    = $_POST["tgl"];
		$buyer  = $_POST["buyer"];
		$kurir  = $_POST["kurir"];
		$ongkir = $_POST["ongkir"];
		$dtil   = json_decode($_POST["dtil"]);
		$this->crud->saveJual($id, $media, $tgl, $buyer, $kurir, $ongkir);
		foreach ($dtil as $a) {
			$this->crud->saveDtilJual($id, $a->nb, $a->mod, $a->jual, $a->qty);
		}
	}
}
