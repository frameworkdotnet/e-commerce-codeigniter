<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajemen_user extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
		//load2 model 'user_model'
		$this->load->model('user_model');
	}
	
	public function index()
	{
		$this->adminauth->restrict();
		
		$data['all_user'] = $this->user_model->get_all_user();
		$data['title'] = 'Manajemen User | Administrator | Gadget Baru';
		
		$this->template->load2('admin/tampil_user', $data);
	}
	
	function edit_user()
	{
		//mencegah user yang belum login untuk mengakses halaman ini
		$this->adminauth->restrict();
		
		//get data dari user_model
		$data['all_user'] = $this->user_model->get_all_user();
		$data['title'] = 'Edit User | Administrator | Gadget Baru';
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]');
		
		$this->form_validation->set_error_delimiters('<span style="color:#FF00000">'.'</span>');
		
		//dapatkan id user dari segment ke-3 dari URI
		$id = $this->uri->segment(3);
		if($this->form_validation->run() == FALSE)
		{
			
			//dapatkan data user yang akan diedit dari database
			$data['user'] = $this->user_model->get_user_by_id($id);
			$this->template->load2('admin/form_edit_user', $data);
		}
		else
		{
			$data_user = array(
				'user_nama' => $this->input->post('nama'),
				'user_username' => $this->input->post('username'),
				'user_password' => md5($this->input->post('password'))
			);
			$this->user_model->update_data_user($data_user, $id);
			
			//kembalikan ke halaman manajemen user
			redirect('manajemen_user');
		}
	}
	
	function delete_user()
	{
		//mencegah user yang belum login untuk mengakses halaman ini
		$this->adminauth->restrict();
		
		//dapatkan id user dari segment ke-3 dari URI
		$id = $this->uri->segment(3);
		
		$this->user_model->delete_user($id);
		
		//kembalikan ke halaman manajemen user
		redirect('manajemen_user');
	}
}
	
/* End of file manajemen_user.php */
/* Location: ./application/controllers/manajemen_user.php */