<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud extends CI_Model {
	public function getBea($ordno){
		$sql="SELECT (a.bea/SUM(b.qty)) AS bea FROM rinotronik.beli AS a INNER JOIN rinotronik.dtil_beli AS b ON (a.order_number = b.order_number) where a.order_number='".$ordno."'";
		return $this->db->query($sql)->row()->bea;
	}
	public function getLaba($bulan){
		$sql="SELECT sum((harga-modal)*qty) AS laba FROM jual AS a INNER JOIN dtil_jual AS b ON (a.id_jual = b.id_jual) where a.tgl_jual like '".$bulan."%'";
		return $this->db->query($sql)->row()->laba;
	}
	public function getOngkir($bulan){
		$sql="select sum(ongkir) as ongkir from jual where tgl_jual like '".$bulan."%'";
		return $this->db->query($sql)->row()->ongkir;
	}
	public function listBrg(){
		$sql="SELECT a.nama_brg, SUM((b.harga-b.modal)*b.qty) AS laba FROM brg AS a LEFT JOIN dtil_jual AS b ON (a.nama_brg = b.nama_brg) GROUP BY a.nama_brg ORDER BY laba DESC, a.nama_brg";
		return $this->db->query($sql)->result_array();
	}
	public function brgBeli($nb){
		$sql="SELECT a.order_number, DATE_FORMAT(a.tgl_beli,'%d %b %y') AS tgl, a.nama_supplier, c.link_supplier, b.link_brg, (b.idr/b.usd) AS kurs, b.usd, b.idr, b.qty, IF(a.status LIKE 'done','Received','Shipping') AS stat FROM beli AS a INNER JOIN dtil_beli AS b ON (a.order_number = b.order_number) INNER JOIN supplier AS c ON (c.nama_supplier = a.nama_supplier) where b.nama_brg='".$nb."' order by a.status, a.tgl_beli";
		return $this->db->query($sql)->result_array();
	}
	public function brgJual($nb){
		$sql="SELECT a.id_jual, DATE_FORMAT(a.tgl_jual,'%d %b %y') AS tgl, a.buyer, a.media, b.modal, b.harga, b.qty, (b.harga*b.qty) AS jml, ((b.harga-b.modal)*b.qty) AS laba, a.ongkir, a.kurir, a.no_resi, IF(a.status LIKE 'done','Selesai',IF(TRIM(a.no_resi)='','Packing','Shipping')) AS stat FROM jual AS a INNER JOIN dtil_jual AS b ON (a.id_jual = b.id_jual) where b.nama_brg='".$nb."' ORDER BY a.status, stat, a.tgl_jual";
		return $this->db->query($sql)->result_array();		
	}
	public function listJual(){
		$sql="SELECT media, id_jual, DATE_FORMAT(tgl_jual,'%a, %d %M %Y') AS tgl, buyer, kurir, no_resi, ongkir, IF(`status` LIKE 'done','Selesai',IF(TRIM(no_resi)='','Packing (Masukkan Nomor Resi)','Shipping (Set Selesai Jual)')) AS stat FROM jual ORDER BY `status`, stat, tgl_jual DESC";
		return $this->db->query($sql)->result_array();		
	}
	public function dtilJual($id){
		$sql="SELECT nama_brg, modal, harga, qty, (modal*qty) AS jmod, (harga*qty) AS jml, ((harga-modal)*qty) AS laba FROM dtil_jual where id_jual='".$id."' order by nama_brg";
		return $this->db->query($sql)->result_array();		
	}
	public function setResi($id, $resi){
		$sql="update jual set no_resi='".$resi."' where id_jual='".$id."'";
		$this->db->query($sql);
	}
	public function setSelesai($id){
		$sql="update jual set `status`='Done' where id_jual='".$id."'";
		$this->db->query($sql);
	}
	public function lsbrg($nb){
		$sql="SELECT b.nama_brg FROM beli AS a INNER JOIN dtil_beli AS b ON (a.order_number = b.order_number) WHERE a.`status`='Done' and b.nama_brg like '%".$nb."%' GROUP BY b.nama_brg ORDER BY b.nama_brg limit 7";
		return $this->db->query($sql)->result_array();
	}
	public function getModal($nb){
		$sql="SELECT a.order_number, b.idr, b.qty FROM beli AS a INNER JOIN dtil_beli AS b ON (a.order_number = b.order_number) WHERE a.status='Done' and b.nama_brg='".$nb."' ORDER BY a.tgl_beli DESC";
		return $this->db->query($sql)->result_array();		
	}
	public function getIdJual(){
		$sql="select max(id_jual)+1 as idx from jual";
		return $this->db->query($sql)->row()->idx;		
	}
	public function saveJual($id, $media, $tgl, $buyer, $kurir, $ongkir){
		$sql="INSERT INTO jual (id_jual, tgl_jual, buyer, media, kurir, ongkir, no_resi) VALUES('".$id."', '".$tgl."', '".$buyer."', '".$media."', '".$kurir."', '".$ongkir."', '')";
		$this->db->query($sql);
	}
	public function saveDtilJual($id, $nb, $mod, $jual, $qty){
		$sql="INSERT INTO dtil_jual (id_jual, nama_brg, modal, harga, qty) VALUES ('".$id."', '".$nb."', '".$mod."', '".$jual."', '".$qty."')";
		$this->db->query($sql);
	}
	public function listBeli(){
		$sql="SELECT a.order_number, DATE_FORMAT(a.tgl_beli, '%a, %d %M %Y') AS tgl, a.nama_supplier, b.link_supplier, a.bea, IF(a.status LIKE 'done', 'Received', 'Shipping (Set Received)') AS stat, (c.idr/c.usd) AS kurs FROM beli AS a INNER JOIN supplier AS b ON (a.nama_supplier = b.nama_supplier) INNER JOIN dtil_beli AS c ON (a.order_number = c.order_number) GROUP BY a.order_number ORDER BY a.status, stat DESC, a.tgl_beli DESC, a.nama_supplier";
		return $this->db->query($sql)->result_array();		
	}
	public function dtilBeli($ordno){
		$sql="SELECT nama_brg, link_brg, usd, idr, qty FROM dtil_beli where order_number='".$ordno."' order by usd desc";
		return $this->db->query($sql)->result_array();		
	}
	public function setTerima($id, $bea){
		$sql="update beli set `status`='Done', bea='".$bea."', tgl_terima=now() where order_number='".$id."'";
		$this->db->query($sql);
	}
	public function setTidakTerima($id){
		$sql="update beli set `status`='Done' where order_number='".$id."'";
		$this->db->query($sql);
	}
	public function listSupplier(){
		$sql="SELECT nama_supplier, link_supplier FROM supplier ORDER BY nama_supplier";
		return $this->db->query($sql)->result_array();		
	}
	public function dtilSupplier($nama_supplier){
		$sql="SELECT b.order_number, date_format(b.tgl_beli,'%a, %d %b %y') as tgl, b.bea, if(b.status like'done','Received','Shipping') as stat FROM supplier AS a INNER JOIN beli AS b ON (a.nama_supplier = b.nama_supplier) where a.nama_supplier='".$this->db->escape_str($nama_supplier)."' ORDER BY b.tgl_beli DESC";
		return $this->db->query($sql)->result_array();
	}
	public function saveSup($ns, $ls){
		$sql="INSERT INTO supplier (nama_supplier, link_supplier) VALUES ('".$ns."', '".$ls."')";
		$this->db->query($sql);
	}
	public function getBrg(){
		$sql="SELECT nama_brg FROM brg ORDER BY nama_brg";
		return $this->db->query($sql)->result_array();
	}
	public function getTipeBrg(){
		$sql="SELECT tipe_brg FROM brg group by tipe_brg ORDER BY tipe_brg";
		return $this->db->query($sql)->result_array();
	}
}
