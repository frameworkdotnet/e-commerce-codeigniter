<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
		//load model 'usermodel'
		$this->load->model(array('user_model', 'ph_model'));
	}
	
	public function index()
	{
	   if($this->auth->is_logged_in() == false)
	   {
			$this->login();
	   }
	   else
	   {
		  redirect('web');
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
			redirect('web');
		}
		else
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$success = $this->auth->do_login($username,$password);
			
			if($success)
			{
				redirect('home/index');
			}
			else
			{
				echo "<script>alert('Username atau password anda salah!')</script>";
				echo "<meta http-equiv='refresh' content=0; url=".base_url().">";
			}
		}
	}
	
	function logout()
	{
		if($this->auth->is_logged_in() == true)
		{
			$this->auth->do_logout();
		}
		
		redirect('web');
	}
	
	function daftar()
	{
		if($this->session->userdata('user_id') == true)
	   {
			echo "<meta http-equiv='refresh' content='0; url=".site_url()."/home'>";
	   }
	   else
	   {
		  	$data['title'] = 'Daftar Member | Gadget Baru';
			$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
			$this->template->load('daftar', $data);
	   }
	}
	
	function kirimregister()
	{
		$datapesan['user_username'] = mysql_real_escape_string($this->input->post('username'));
		$datapesan['user_password'] = md5($this->input->post('password'));
		$datapesan['user_nama'] = mysql_real_escape_string($this->input->post('nama'));
		$datapesan['email'] = mysql_real_escape_string($this->input->post('email'));
		$datapesan['alamat'] = mysql_real_escape_string($this->input->post('alamat'));
		$datapesan['telepon'] = mysql_real_escape_string($this->input->post('telepon'));
		$datapesan['propinsi'] = mysql_real_escape_string($this->input->post('propinsi'));
		$datapesan['kota'] = mysql_real_escape_string($this->input->post('kota'));
		$datapesan['kode_pos'] = mysql_real_escape_string($this->input->post('kodepos'));
		$tgl = $this->input->post('tgl');
		$bln = $this->input->post('bln');
		$thn = $this->input->post('thn');
		$datapesan['tgl_lahir'] = $tgl.'-'.$bln.'-'.$thn;
		$datapesan['status'] = 1;
		
		$q = $this->user_model->cek_username($datapesan['username_user'],$datapesan['email']);
		if (count($q->result())>0){
			$data['pesan'] =  "Username atau Email yang anda masukkan sudah terpakai. Silahkan pilih yang lainnya";
		}
		else
		{
			$this->user_model->insert_data_user($datapesan);
			echo "<script>
				alert('Pendaftaran Berhasil - Selamat Bergabung Dengan Kami, Selamat Berbelanja');
				</script>";
				
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."'>";
		}
	}
	
	function set_profil()
	{	
		if($this->auth->is_logged_in() == false)
	   {
			echo "<meta http-equiv='refresh' content='0; url=".site_url()."/home'>";
	   }
	   else
	   {
		  	$data['title'] = 'Pengaturan Profil | Gadget Baru';
			$data["user_id"]= $this->session->userdata('user_id');
			$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
			$data['det_member'] = $this->ph_model->pilih_member($data["user_id"]);
			
			$this->template->load('set_profil', $data);
	   }
	}
	
	function update_profil()
	{
		if($this->auth->is_logged_in() == false)
	   {
			echo "<meta http-equiv='refresh' content='0; url=".site_url()."/home'>";
	   }
	   else
	   {
		$datapesan['nama'] = mysql_real_escape_string($this->input->post('nama'));
		$datapesan['email'] = mysql_real_escape_string($this->input->post('email'));
		$datapesan['alamat'] = mysql_real_escape_string($this->input->post('alamat'));
		$datapesan['telepon'] = mysql_real_escape_string($this->input->post('telepon'));
		$datapesan['propinsi'] = mysql_real_escape_string($this->input->post('propinsi'));
		$datapesan['kota'] = mysql_real_escape_string($this->input->post('kota'));
		$datapesan['kodepos'] = mysql_real_escape_string($this->input->post('kodepos'));
		$tgl = $this->input->post('tgl');
		$bln = $this->input->post('bln');
		$thn = $this->input->post('thn');
		$datapesan['tgl_lahir'] = $tgl.'-'.$bln.'-'.$thn;
		

		if($datapesan['nama']=="" && $datapesan['email']=="" && $datapesan['alamat']=="" && $datapesan['telpon']=="" && $datapesan['propinsi']=="" && $datapesan['kota']=="" && $datapesan['tgl_lahir']=="" && $datapesan['kodepos']=="")
		{
			$data['pesan'] = "Field belum lengkap. Mohon diisi dengan selengkap-lengkapnya.";
		}
		else
		{
			$user_id = $this->session->userdata('user_id');
			$q_update = "update user set user_nama='".$datapesan['nama']."',email='".$datapesan['email']."',alamat='".$datapesan['alamat']."',telepon='".$datapesan['telepon']."',propinsi='".$datapesan['propinsi']."',kota='".$datapesan['kota']."',tgl_lahir='".$datapesan['tgl_lahir']."',kode_pos='".$datapesan['kodepos']."' where user_id='".$user_id."'";
			
			$this->ph_model->update_profil_member($q_update);
			$data['pesan'] = "Berhasil memperbaharui data profil anda.";
			?>
				<script>
				alert('Berhasil memperbaharui data profil anda.');
				</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".site_url()."/home'>";
		}
		$this->template->load('hasil_update_member', $data);
	   }
	}
	
	function history()
	{	
		if($this->auth->is_logged_in() == false)
		{
			$this->login();
		}
		else
		{
			$data['title'] = 'History Belanja | Gadget Baru';
			$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
			$data["kd_user"]= $this->session->userdata('user_id');
			$page=$this->uri->segment(3);
			$limit=15;
			if(!$page):
			$offset = 0;
			else:
			$offset = $page;
			endif;	
			
			$data['history'] = $this->ph_model->tampil_semua_history($data["kd_user"],$limit,$offset);
			$tot_hal = $this->ph_model->hitung_isi_1tabel('tbl_transaksi_header','group by substring(kode_transaksi,1,8)');
			
			$config['base_url'] = site_url() . '/home/history/';
			$config['total_rows'] = $tot_hal->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Selanjutnya';
			$config['prev_link'] = 'Sebelumnya';
			$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
			$this->template->load('history', $data);
		}
	}
	
	function dethistory()
	{
		if($this->auth->is_logged_in() == false)
		{
			$this->login();
		}
		else
		{
			$kode='';		
			if ($this->uri->segment(3) === FALSE)
			{
					$kode='';
			}
			else
			{
					$kode = $this->uri->segment(3);
			}
			if($this->auth->is_logged_in() == false)
			{
				$this->login();
			}
			else
			{	
				$data["kd_user"]= $this->session->userdata('user_id');
				$page=$this->uri->segment(4);
				$limit=15;
				if(!$page):
				$offset = 0;
				else:
				$offset = $page;
				endif;	
				
				$data['history'] = $this->ph_model->tampil_det_history($data["kd_user"],$kode,$limit,$offset);
				$tot_hal = $this->ph_model->hitung_isi_1tabel("tbl_transaksi_detail","where kode_transaksi like '%$kode%'");
				
				$config['base_url'] = site_url() . '/home/dethistory/'.$kode;
					$config['total_rows'] = $tot_hal->num_rows();
					$config['per_page'] = $limit;
					$config['uri_segment'] = 4;
					$config['first_link'] = 'Awal';
					$config['last_link'] = 'Akhir';
					$config['next_link'] = 'Selanjutnya';
					$config['prev_link'] = 'Sebelumnya';
					$this->pagination->initialize($config);
				$data["paginator"] =$this->pagination->create_links();
				$data['title'] = "Detail History | Gadget Baru";
				$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
				$this->template->load('det_history', $data);
			}
		}
	}
	
	function set_pass()
	{
		if($this->auth->is_logged_in() == false)
		{
			$this->login();
		}
		else
		{	
			
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username', 'username', 'trim|required');
			$this->form_validation->set_rules('passlama', 'passlama', 'trim|required');
			$this->form_validation->set_rules('passbaru', 'passbaru', 'trim|required');
			$this->form_validation->set_rules('ulangi', 'ulangi', 'trim|required|matches[passbaru]');
			
			$this->form_validation->set_error_delimiters('<span style="color:#FF00000">'.'</span>');
			
			if($this->form_validation->run() == FALSE)
			{
				$data["kd_user"]= $this->session->userdata('user_id');
				$data['det_member'] = $this->ph_model->pilih_member($data["kd_user"]);
				$data['title'] = 'Pengaturan Password | Gadget Baru';
				$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
				$this->template->load('set_pass', $data);
			}
			else
			{
				$datapesan['username'] = $this->input->post('username');
				$datapesan['passlama'] = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($this->input->post('passlama'),ENT_QUOTES))));
				$datapesan['passbaru'] = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($this->input->post('passbaru'),ENT_QUOTES))));
				$datapesan['ulangi'] = mysql_real_escape_string($this->input->post('ulangi'));
				$bersih = md5($datapesan['passbaru']);
				$id = $this->session->userdata('user_id');
				
				$cek = $this->ph_model->data_login_member($datapesan['username'],$datapesan['passlama']);
				if(count($cek->result())>0){
					$q_update = "update user set user_password='".$bersih."' where user_id='".$id."'";
					$this->ph_model->update_profil_member($q_update);
					?>
						<script>
						alert('Berhasil memperbaharui password anda.');
						</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".site_url()."/home'>";
				}
				else
				{
					?>
						<script>
						alert('Password Lama Salah. Gagal memperbaharui data password anda.');
						</script>
					<?php
					echo "<meta http-equiv='refresh' content='0; url=".site_url()."/home/set_pass'>";
				}
			}
			
		}
	}
}	
/* End of file home.php */
/* Location: ./application/controllers/home.php */