<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sup extends CI_Controller {
	public function index()
	{
		$konten = array("sup"=>array());
		$sup   = $this->crud->listSupplier();

		foreach ($sup as $a) {
			$dtil = $this->crud->dtilSupplier($a["nama_supplier"]);
			$this->arrayDtil($dtil);
			$a["dtil"] = $dtil; 
			array_push($konten["sup"], $a);
		}

		unset($sup);

		formatArray($konten);
		$sidebar = sidebar(array("mst","sup"));
		$data = array(
			"url"     => base_url(),
			"sidebar" => $this->parser->parse("sidebar/sidebar",$sidebar,true),
			"konten"  => $this->parser->parse("konten/mst/sup",$konten,true),
			"js"      => "sup"
		);
		$this->load->view("template",$data);
		unset($konten);
		unset($data);
	}
	private function arrayDtil(&$dtil){
		foreach ($dtil as &$a) {
			$a["brg"] = $this->crud->dtilBeli($a["order_number"]);
		}
	}
	public function saveSup(){
		$ns = $this->db->escape_str($_POST["ns"]);
		$ls = $this->db->escape_str($_POST["ls"]);
		$this->crud->saveSup($ns, $ls);
	}
}
