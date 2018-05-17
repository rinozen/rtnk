<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brg extends CI_Controller {
	public function index(){
		$konten = array("brg"=>array(),"tipe"=>array());
		$brg    = $this->crud->getBrg();
		$tipe   = $this->crud->getTipeBrg();

		foreach ($brg as $a){
			array_push($konten["brg"],$a);
		}
		foreach ($tipe as $a){
			array_push($konten["tipe"],$a);
		}
		unset($brg);
		unset($tipe);

		$sidebar = sidebar(array("mst","brg"));
		$data = array(
			"url"     => base_url(),
			"sidebar" => $this->parser->parse("sidebar/sidebar",$sidebar,true),
			"konten"  => $this->parser->parse("konten/mst/brg",$konten,true),
			"js"      => "brg"
		);
		$this->load->view("template",$data);
		unset($konten);
		unset($data);
	}
	public function aplod(){
		$src  = $_FILES['file']['tmp_name'];
		$nb   = $_POST["nb"];
		$targ = "./assets/img/icon/".$nb.".jpg";
		move_uploaded_file($src, $targ);
	}
}