<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
		//load model 'usermodel'
		$this->load->model(array('ph_model','user_model'));
	}
	
	public function index()
	{
		$this->auth->restrict();
		
		$data['title'] = 'Konfirmasi Pembayaran | Gadget Baru';
		$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
		$this->template->load('konfirmasi', $data);
	}
	
	function kirim()
	{
		$tgl_skr = date('Ymd');
		$cek_kode = $this->ph_model->cek_kode2($tgl_skr);
		$kode_trans = "";
		
		foreach($cek_kode->result() as $ck)
		{
			if($ck->kd==NULL)
			{
				$kode_trans = $tgl_skr.'001';
			}
			else
			{
				$kd_lama = $ck->kd;
				$kode_trans = $kd_lama+1;
			}
		}
		$datapesan['id_konfirmasi'] = $kode_trans;
		$datapesan['nama'] = mysql_real_escape_string($this->input->post('nama'));
		$datapesan['email'] = mysql_real_escape_string($this->input->post('email'));
		$datapesan['telepon'] = mysql_real_escape_string($this->input->post('telepon'));
		$datapesan['jumlah_pembayaran'] = mysql_real_escape_string($this->input->post('jumlah'));
		$datapesan['tgl_pembayaran'] = mysql_real_escape_string($this->input->post('tanggal'));
		$datapesan['no_rekening'] = mysql_real_escape_string($this->input->post('norekening'));
		$datapesan['nama_rekening'] = mysql_real_escape_string($this->input->post('namarekening'));
		$datapesan['bank_tujuan'] = mysql_real_escape_string($this->input->post('bank'));
		$datapesan['metode_pembayaran'] = mysql_real_escape_string($this->input->post('metode'));
		
		$this->user_model->konfirmasi($datapesan);
		
		?>
		<script>
		alert('Konfirmasi pembayaran anda telah berhasil dikirim. Kami akan segera memprosesnya.');
		</script>
		<?php
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
	}
}
/* End of file web.php */
/* Location: ./application/controllers/web.php */