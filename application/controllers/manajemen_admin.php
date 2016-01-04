<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Manajemen_admin extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
		//load2 model 'admin_model'
		$this->load->model('admin_model');
	}
	
	public function index()
	{
		$this->adminauth->restrict();
		
		$data['all_admin'] = $this->admin_model->get_all_admin();
		$data['title'] = 'Manajemen Admin | Administrator | Gadget Baru';
		
		$this->template->load2('admin/tampil_admin', $data);
	}
	
	function insert_admin()
	{
		//mencegah admin yang belum login untuk mengakses halaman ini
		$this->adminauth->restrict();
		
		//get data dari admin_model
		$data['all_admin'] = $this->admin_model->get_all_admin();
		$data['title'] = 'Tambah Admin | Administrator | Gadget Baru';
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'adminname', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]');
		
		$this->form_validation->set_error_delimiters('<span style="color:#FF00000">'.'</span>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['title'] = 'Input admin baru | Administrator | Gadget Baru';
			$this->template->load2('admin/form_input_admin', $data);
		}
		else
		{
			$data_admin = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password'))
			);
			$this->admin_model->insert_data_admin($data_admin);
			
			//kembalikan ke halaman manajemen admin
			redirect('manajemen_admin');
		}
	}
	
	function edit_admin()
	{
		//mencegah admin yang belum login untuk mengakses halaman ini
		$this->adminauth->restrict();
		
		//get data dari admin_model
		$data['all_admin'] = $this->admin_model->get_all_admin();
		
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('username', 'adminname', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('password_conf', 'Password Confirmation', 'trim|required|matches[password]');
		
		$this->form_validation->set_error_delimiters('<span style="color:#FF00000">'.'</span>');
		
		//dapatkan id admin dari segment ke-3 dari URI
		$id = $this->uri->segment(3);
		if($this->form_validation->run() == FALSE)
		{
			//dapatkan data admin yang akan diedit dari database
			$data['admin'] = $this->admin_model->get_admin_by_id($id);
			$data['title'] = 'Edit Admin| Administrator | Gadget Baru';
			$this->template->load2('admin/form_edit_admin', $data);
		}
		else
		{
			$data_admin = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
			);
			$this->admin_model->update_data_admin($data_admin, $id);
			
			//kembalikan ke halaman manajemen admin
			redirect('manajemen_admin');
		}
	}
	
	function delete_admin()
	{
		//dapatkan id admin dari segment ke-3 dari URI
		$id = $this->uri->segment(3);
		
		$this->admin_model->delete_admin($id);
		
		//kembalikan ke halaman manajemen admin
		redirect('manajemen_admin');
	}
}
	
/* End of file manajemen_admin.php */
/* Location: ./application/controllers/manajemen_admin.php */