<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Web extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
		//load model 'usermodel'
		$this->load->model(array('user_model', 'ph_model'));
	}
	
	public function index()
	{
	    $data['title'] = 'Gadget Baru | Toko Gadget Online Terlengkap';
		$data['slide_produk_home'] = $this->ph_model->tampil_produk(4);
		$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
		$data['slide_baru'] = $this->ph_model->tampil_produk(5);
		$data['slide_produk_home2'] = $this->ph_model->tampil_produk2(4);
		$this->template->load('produk_home', $data);
	}
}
/* End of file web.php */
/* Location: ./application/controllers/web.php */