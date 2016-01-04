<?php

class Produk_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function tampil_kategori($kode)
	{
		$q = $this->db->query("SELECT * from produk join kategori on produk.id_kategori=kategori.id_kategori or
		kategori.kode_parent=kategori.id_kategori where kategori.kode_parent='$kode'");
		return $q;
	}
	
	function tampil_detail_produk($kode)
	{
		$q = $this->db->query("SELECT * from produk left join kategori on produk.id_kategori=kategori.id_kategori where
		id_produk='$kode'");
		return $q;
	}
	
	function get_all_produk()
	{		
		$this->db->from('produk');
		$this->db->join('kategori', 'produk.id_kategori=kategori.id_kategori', 'left');
		return $this->db->get();
	}
	
	function insert_data_produk($data)
	{
		return $this->db->insert('produk', $data);
	}
	
	function get_produk_by_id($id)
	{
		$this->db->where('id_produk', $id);
		return $this->db->get('produk');
	}
	
	function update_data_produk($data, $id)
	{
		$this->db->where('id_produk', $id);
		$this->db->update('produk', $data);
	}
	
	function hapus_konten($id,$seleksi,$tabel)
	{
		$this->db->where($seleksi,$id);
		$this->db->delete($tabel);
	}
	
	function jalankan_query_manual($datainput)
	{
		$q = $this->db->query($datainput);
	}
	
	function jalankan_query_manual_select($datainput)
	{
		$q = $this->db->query($datainput);
		return $q;
	}
	
	function tampil_trans_harian($tgl,$limit,$offset)
	{
		$q = $this->db->query("SELECT * from tbl_transaksi_detail as a left join (select x.kode_user,x.kode_transaksi,x.nama_penerima,user_nama from tbl_transaksi_header as x left join user as y on x.kode_user=y.user_id) b on  a.kode_transaksi=b.kode_transaksi where a.kode_transaksi like '%$tgl%' order by a.kode_transaksi desc LIMIT $offset,$limit ");
		return $q;
	}
	
	function tampil_laporan($tgl,$limit,$offset)
	{
		$q = $this->db->query("SELECT * from konfirmasi where id_konfirmasi like '%$tgl%' order by id_konfirmasi desc LIMIT $offset,$limit ");
		return $q;
	}

}