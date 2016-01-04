<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pesanan extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
		//load model 'usermodel'
		$this->load->model(array('ph_model','produk_model'));
	}
	
	public function index()
	{
		$this->adminauth->restrict();

		$page=$this->uri->segment(3);
		$limit=15;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
		$data['kata']="";
		$tg = $this->input->post("tgl");
		$bl = $this->input->post("bln");
		$th = $this->input->post("thn");
		$tanggal = $th.$bl.$tg;
		if(!empty($tg))
		{
			$data['kata'] = $tanggal;
			$this->session->set_userdata('trans_harian', $data['kata']);
		} else {
			$data['kata'] = $this->session->userdata('trans_harian');
		}
		$data['title'] = 'Daftar Pesanan Pelanggan | Gadget Baru';
		$data["tampil"] = $this->produk_model->tampil_trans_harian($data['kata'],$limit,$offset);
		$tot_hal = $this->ph_model->hitung_isi_1tabel('tbl_transaksi_detail',"where kode_transaksi like '%".$data['kata']."%'");
		
		$config['base_url'] = base_url() . 'pesanan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();

		$this->template->load2('admin/transaksi_harian', $data);
	}
}
/* End of file web.php */
/* Location: ./application/controllers/web.php */