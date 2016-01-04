<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminauth{
   var $CI = NULL;
   function __construct()
   {
      // get CI's object
      $this->CI =& get_instance();
   }
   // untuk validasi login
   function do_login($username,$password)
   {
      // cek di database, ada ga?
      $this->CI->db->from('admin');
      $this->CI->db->where('username',$username);
      $this->CI->db->where('password=MD5("'.$password.'")','',false);
      $result = $this->CI->db->get();
      if($result->num_rows() == 0) 
      {
         // username dan password tsb tidak ada 
         return false;
      }
      else 
      {
         // ada, maka ambil informasi dari database
         $admindata = $result->row();
         $session_data = array(
            'admin_id'  => $admindata->admin_id,
			'admin_username'  => $admindata->username,
            'admin_nama'      => $admindata->nama
			
         );
         // buat session
         $this->CI->session->set_userdata($session_data);
         return true;
      }
   }
   // untuk mengecek apakah user sudah login/belum
   function is_logged_in()
   {
      if($this->CI->session->userdata('admin_id') == '')
      {
         return false;
      }
      return true;
   }
   // untuk validasi di setiap halaman yang mengharuskan authentikasi
   function restrict()
   {
      if($this->is_logged_in() == false)
      {
         redirect('adminlogin/login');
      }
   }
   
   // untuk logout
	function do_logout()
	{
	   $this->CI->session->sess_destroy(); 
	}
}