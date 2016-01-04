<?php

class Kategori_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function tampil_semua_kategori()
	{
		return $this->db->get('kategori');
	}
	
	function get_all_kategori($kd_parent)
	{
		$this->db->where('kode_parent', $kd_parent);
		return $this->db->get('kategori');
	}
	
	function insert_data_kategori($data)
	{
		return $this->db->insert('kategori', $data);
	}
	
	function get_kategori_by_id($id)
	{
		$this->db->where('id_kategori', $id);
		return $this->db->get('kategori');
	}
	
	function update_data_kategori($data, $id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->update('kategori', $data);
	}
	
	function delete_kategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('kategori');
	}
	
	function jalankan_query_manual_select($datainput)
	{
		$q = $this->db->query($datainput);
		return $q;
	}
	
	function jalankan_query_manual($datainput)
	{
		$q = $this->db->query($datainput);
	}
}