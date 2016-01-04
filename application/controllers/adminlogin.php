<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adminlogin extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
	}
	
	public function index()
	{
	   if($this->adminauth->is_logged_in() == false)
	   {
			$this->login();
	   }
	   else
	   {
		  $data['title'] = 'Halaman Administrator | Gadget Baru';
		  $this->template->load2('admin/index', $data);
	   }
	}
	
	public function login()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		$this->form_validation->set_error_delimiters(' <span style="color:#FF0000">', '</span>');

		if ($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Login Admin | Gadget Baru';
			$this->load->view('admin/admin_login', $data);
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$success = $this->adminauth->do_login($username,$password);
			
			if($success)
			{
				redirect('adminlogin/index');
			}
			else
			{
				$data['title'] = 'Login Admin | Gadget Baru';
				$data['login_info'] = "Username atau password anda salah!";
				$this->load->view('admin/admin_login', $data);
			}
		}
	}
	
	function logout()
	{
		if($this->adminauth->is_logged_in() == true)
		{
			$this->adminauth->do_logout();
		}
		
		redirect('web');
	}
	
	function daftar()
	{
		$session=isset($_SESSION['username_grosir_sandal']) ? $_SESSION['username_grosir_sandal']:'';
		if($session!=""){
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."member'>";
		}
		else{
			$data['title'] = 'Daftar Member | Gadget Baru';
			$this->load->view('admin_login', $data);
		}
	}
}
	
/* End of file home.php */
/* Location: ./application/controllers/home.php */