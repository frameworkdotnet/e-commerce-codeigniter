<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kategori extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
		$this->load->model('kategori_model');
	}
	
	public function index()
	{
		
		$this->adminauth->restrict();
		
		$data['all_kategori'] = $this->kategori_model->get_all_kategori(0);
		$data['title'] = 'Kategori | Gadget Baru';
		$this->load->vars($data);
		
		$this->template->load2('admin/tampil_kategori');
	}
	
	function insert_kategori(){
	
		$this->adminauth->restrict();

		$data['title'] = 'Tambah Kategori | Administrator | Gadget Baru';
		$this->load->vars($data);
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		$this->form_validation->set_error_delimiters('<span style="color:#FF00000">'.'</span>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data['kategori'] = $this->kategori_model->get_all_kategori(0);
			$this->template->load2('admin/form_input_kategori', $data);
		}
		else
		{
			$data_kategori = array(
				'nama_kategori' => mysql_real_escape_string($this->input->post('nama')),
				'kode_parent' => $this->input->post('kategori'),
			);
			$this->kategori_model->insert_data_kategori($data_kategori);
			
			redirect('kategori');
		}
	}
	
	function edit_kategori(){
		$this->adminauth->restrict();
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'Nama', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span style="color:#FF00000">'.'</span>');
		
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		
		if($this->form_validation->run() == FALSE)
		{	
			$data["ls"] = $this->kategori_model->jalankan_query_manual_select("select * from kategori where id_kategori='$kode'");
			$data["kat"] = $this->kategori_model->jalankan_query_manual_select("select * from kategori where id_kategori!='$kode'");
			
			$data['title'] = 'Edit Kategori | Administrator | Gadget Baru';
			$this->load->vars($data);
			
			$this->template->load2('admin/form_edit_kategori', $data);
		}
		else
		{	
			$id = $this->input->post('id');
			$nama = mysql_real_escape_string($this->input->post('nama'));
			$prnt = $this->input->post('prnt');
			$q = "update kategori set nama_kategori='".$nama."', kode_parent='".$prnt."' where id_kategori = '".$id."'";
			$data["upd"] = $this->kategori_model->jalankan_query_manual($q);
			
			//kembalikan ke halaman manajemen user
			redirect('kategori');
		}
	}
	
	function hapus_kategori(){
		//mencegah user yang belum login untuk mengakses halaman ini
		$this->adminauth->restrict();
		
		//dapatkan id user dari segment ke-3 dari URI
		$id = $this->uri->segment(3);
		
		$this->kategori_model->delete_kategori($id);
		
		//kembalikan ke halaman manajemen user
		redirect('kategori');
	}
}