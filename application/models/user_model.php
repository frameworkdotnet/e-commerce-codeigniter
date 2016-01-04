<?php

class User_model extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function get_all_user()
	{
		$this->db->from('user');
		return $this->db->get();
	}
	
	function insert_data_user($data)
	{
		return $this->db->insert('user', $data);
	}
	
	//update
	function get_user_by_id($id)
	{
		$this->db->where('user_id', $id);
		return $this->db->get('user');
	}
	
	function update_data_user($data, $id)
	{
		$this->db->where('user_id', $id);
		$this->db->update('user', $data);
	}
	//update
	
	function delete_user($id)
	{
		$this->db->where('user_id', $id);
		$this->db->delete('user');
	}
	
	function cek_username($user,$email)
	{
		$query=$this->db->query("select * from user where user_username='$user' or email='$email'");
		return $query;
	}
	
	function konfirmasi($data)
	{
		return $this->db->insert("konfirmasi", $data);
	}
}