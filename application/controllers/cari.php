<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cari extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ph_model');
		session_start();
	}
	
	function index()
	{
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/cari/lihat'>";
	}
	
	function lihat()
	{
		$data['title'] = "Hasil Pencarian Produk | Gadget Baru";
		$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);

		$data['kata']="";
			if(isset($_POST['cari']))
			{
				$data['kata'] = mysql_real_escape_string($this->input->post('cari'));
				$this->session->set_userdata('simpan_kata', $data['kata']);
			} else {
				$data['kata'] = $this->session->userdata('simpan_kata');
			}
		
		$page=$this->uri->segment(3);
      	$limit=12;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['cariproduk'] = $this->ph_model->pencarian($limit,$offset,$data['kata']);
		$tot_hal = $this->ph_model->hitung_isi_1tabel('produk',"where nama_produk like '%".$data['kata']."%'");
		
		$config['base_url'] = site_url('cari/lihat/');
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
       		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		
		$this->template->load('cari', $data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
