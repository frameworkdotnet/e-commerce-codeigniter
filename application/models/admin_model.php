<?php

class admin_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function get_all_admin()
	{
		$this->db->from('admin');
		return $this->db->get();
	}
	
	function insert_data_admin($data)
	{
		return $this->db->insert('admin', $data);
	}
	
	//update
	function get_admin_by_id($id)
	{
		$this->db->where('admin_id', $id);
		return $this->db->get('admin');
	}
	
	function update_data_admin($data, $id)
	{
		$this->db->where('admin_id', $id);
		$this->db->update('admin', $data);
	}
	//update
	
	function delete_admin($id)
	{
		$this->db->where('admin_id', $id);
		$this->db->delete('admin');
	}
}