<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Keranjang extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ph_model');
		session_start();
	}

	function index()
	{
		$data['menu'] = $this->ph_model->menu_kategori('0');
		$data['title'] = "Keranjang Belanja - Gadget Baru";
		$data['slide_baru'] = $this->ph_model->tampil_produk(5);
		$data['slide_rekomendasi'] = $this->ph_model->tampil_slide_produk(4);
		$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
		
		$session=isset($_SESSION['username_grosir_sandal']) ? $_SESSION['username_grosir_sandal']:'';
		if($session!=""){
			$pecah=explode("|",$session);
			$data["nama"]=$pecah[1];
		}
		
		$this->template->load('keranjang_belanja', $data);
	}

	function tambah_barang()
	{
		$data = array(
			'id'      => $this->input->post('id_produk'),
			'qty'     => $this->input->post('banyak'),
			'stk'     => $this->input->post('stok'),
		       'price'   => $this->input->post('harga'),
			'name'    => $this->input->post('nama_produk'));
		$this->cart->insert($data);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/keranjang/'>";
	}
	
	
	function update_keranjang()
	{
		$total = $this->cart->total_items();
		$item = $this->input->post('rowid');
		$qty = $this->input->post('qty');
		for($i=0;$i < $total;$i++)
		{
			$data = array(
			'rowid' => $item[$i],
			'qty'   => $qty[$i]);
			$this->cart->update($data);
		}
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/keranjang/'>";
	}

	function hapus_keranjang($kode)
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array(
			'rowid' => $kode,
			'qty'   => 0);
			$this->cart->update($data);
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/keranjang/'>";
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
