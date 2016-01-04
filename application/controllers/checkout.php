<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ph_model');
	}

	function index()
	{
		if($this->auth->is_logged_in() == false)
	   {
	   		echo "<script>
                alert('Anda Harus Login Dahulu Untuk Melakukan Pemesanan');	
				window.history.back()		
                </script>";
	   }
	   else
	   {
			$user_id = $this->session->userdata('user_id');
			$data['det_member'] = $this->ph_model->pilih_member($user_id);
			$data['title'] = 'Pemesanan Barang | Gadget Baru';
			$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
			
			$this->template->load('checkout', $data);
	   }
			
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
		echo "<meta http-equiv='refresh' content='0; url=".site_url()."/checkout/'>";
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
		echo "<meta http-equiv='refresh' content='0; url=".site_url()."/checkout/'>";
	}
	
	function kirim_invoice()
	{	
	
		if($this->auth->is_logged_in() == false)
		{
			echo "<meta http-equiv='refresh' content='0; url=".site_url()."/home/login'>";
		}
		else
		{
			$tgl_skr = date('Ymd');
			$cek_kode = $this->ph_model->cek_kode($tgl_skr);
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
			
			$datapesan["kd_user"]= $this->session->userdata('user_id');;
			
			$datapesan['qty'] = mysql_real_escape_string($this->input->post('qty[]'));		
			$datapesan['nama_pembeli'] = mysql_real_escape_string($this->input->post('namapem'));
			$datapesan['email_pembeli'] = mysql_real_escape_string($this->input->post('emailpem'));
			$datapesan['alamat_pembeli'] = mysql_real_escape_string($this->input->post('alamatpem'));
			$datapesan['propinsi_pembeli'] = mysql_real_escape_string($this->input->post('propinsipem'));
			$datapesan['telepon_pembeli'] = mysql_real_escape_string($this->input->post('teleponpem'));
			$datapesan['kota_pembeli'] = mysql_real_escape_string($this->input->post('kotapem'));
			$datapesan['kodepos_pembeli'] = mysql_real_escape_string($this->input->post('kodepospem'));
			
			$datapesan['metode'] = mysql_real_escape_string($this->input->post('metode'));
			$datapesan['paket'] = mysql_real_escape_string($this->input->post('paket'));
			$datapesan['bank'] = mysql_real_escape_string($this->input->post('bank'));
			$datapesan['pesan'] = mysql_real_escape_string($this->input->post('pesan'));
			if($datapesan['pesan']=="")
			{
				$datapesan['pesan'] = "-";
			}
			else
			{
				$datapesan['pesan'] = mysql_real_escape_string($this->input->post('pesan'));
			}
			
			if($datapesan['nama_pembeli']=="" || $datapesan['email_pembeli']=="" || $datapesan['alamat_pembeli']=="" || $datapesan['propinsi_pembeli']=="" || $datapesan['kota_pembeli']=="" || $datapesan['kodepos_pembeli']=="" || $datapesan['telepon_pembeli']=="" )
			{
				$data['pesan'] = "Field belum lengkap. Mohon diisi dengan selengkap-lengkapnya";
				$user_id = $this->session->userdata('user_id');
				$data['det_member'] = $this->ph_model->pilih_member($user_id);
				$data['title'] = 'Pemesanan Barang | Gadget Baru';
				$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
				
				$this->template->load('checkout', $data);
			}
			else
			{
				$q = "insert into tbl_transaksi_header(kode_transaksi,kode_user,nama_penerima,email_penerima,alamat_penerima,propinsi,kota,kodepos,telepon,metode,paket_kirim,bank,pesan) values('".$kode_trans."','".$datapesan["kd_user"]."','".$datapesan['nama_pembeli']."','".$datapesan['email_pembeli']."','".$datapesan['alamat_pembeli']."','".$datapesan['propinsi_pembeli']."','".$datapesan['kota_pembeli']."','".$datapesan['kodepos_pembeli']."','".$datapesan['telepon_pembeli']."','".$datapesan['metode']."','".$datapesan['paket']."','".$datapesan['bank']."','".$datapesan['pesan']."')";
				
				$this->ph_model->simpan_pesanan($q);
				foreach($this->cart->contents() as $items)
				{
					$this->ph_model->simpan_pesanan("insert into tbl_transaksi_detail (kode_transaksi,id_produk,nama_produk,harga,jumlah) values('".$kode_trans."','".$items['id']."','".$items['name']."','".$items['price']."','".$items['qty']."')");
					$this->ph_model->update_dibeli($items['id'],$items['qty']);//update database stok
				}
				$this->cart->destroy();
				?>
				<script type="text/javascript">
                alert("Pesanan anda telah terkirim, kami akan segera memprosesnya dalam waktu 1x24 jam. Silahkan cek email anda beberapa saat lagi untuk melihat rincian detail pembayaran.\n Terima Kasih");			
                </script>
                <?php
                redirect("home");
			}
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
