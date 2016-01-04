<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produk extends CI_Controller {
	function __construct ()
	{
		parent::__construct();
		$this->load->model(array('produk_model', 'kategori_model', 'ph_model'));
	}
	
	public function index()
	{
		$this->adminauth->restrict();
		
		$data['title'] = 'Produk | Gadget Baru';
		$data['all_produk'] = $this->produk_model->get_all_produk();
		$this->load->vars($data);
		
		$this->template->load2('admin/tampil_produk');
	}
	
	function insert_produk()
	{
		//mencegah user yang belum login untuk mengakses halaman ini
		$this->adminauth->restrict();
		
		$data['title'] = "Tambah Produk Baru | Gadget Baru";
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('kategori', 'kategori', 'trim|required');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		$this->form_validation->set_rules('dibeli', 'dibeli', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		
		$this->form_validation->set_error_delimiters('<span style="color:#FF00000">'.'</span>');
		
		if($this->form_validation->run() == FALSE)
		{
			$data["digit_akhir"] = "";
			$data["kat"] = $this->kategori_model->tampil_semua_kategori();
			$q = $this->produk_model->jalankan_query_manual_select("select MAX(substring(id_produk,4,6)) as akhir from produk");
			foreach($q->result() as $a)
			{
				if($a->akhir==NULL){
					$data["digit_akhir"] = "100001";
				}
				else{
					$data["digit_akhir"] = $a->akhir+1;
				}
			}
		
			$this->template->load2('admin/form_input_produk', $data);
		}
		else
		{
			$kategori = mysql_real_escape_string($this->input->post('kategori'));
			$nama = mysql_real_escape_string($this->input->post('nama'));
			$harga = mysql_real_escape_string($this->input->post('harga'));
			$stok = mysql_real_escape_string($this->input->post('stok'));
			$dibeli = mysql_real_escape_string($this->input->post('dibeli'));
			$deskripsi = mysql_real_escape_string($this->input->post('deskripsi'));
			$kd_maks = $this->input->post('digit');
			$kode = 'GDT'.$kd_maks;
			
			if ($_FILES['imagefile']['type'] == "image/jpeg"){
					$ori_src="assets/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
					if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
					{
						chmod("$ori_src",0777);
					}else{
						echo "Gagal melakukan proses upload2 file.";
						exit;
					}

					$thumb_src="assets/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
					
					$n_width = 150;
					$n_height = 150;
				
					if(($_FILES['imagefile']['type']=="image/jpeg") || ($_FILES['imagefile']['type']=="image/png") ||($_FILES['imagefile']['type']=="image/gif"))
					{
						$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
						$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
						$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
						$im = false; // If image is not JPEG, PNG, or GIF
						
						//$im=ImageCreateFromJPEG($ori_src); 
						$width=ImageSx($im);              // Original picture width is stored
						$height=ImageSy($im);             // Original picture height is stored
						if(($n_height==0) && ($n_width==0)) {
							$n_height = $height;
							$n_width = $width;
						}	
		
						if(!$im) {
							echo '<p>Gagal membuat thumnail</p>';
							exit;
						}
						else {				
							$newimage=@imagecreatetruecolor($n_width,$n_height);                 
							@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							@ImageJpeg($newimage,$thumb_src);
							chmod("$thumb_src",0777);
						}
					}
					$this->produk_model->jalankan_query_manual("insert into produk 
					(id_produk,id_kategori,nama_produk,harga,stok,dibeli,gbr_kecil,gbr_besar,deskripsi) 
					values('".$kode."','".$kategori."','".$nama."','".$harga."','".$stok."','".$dibeli."','".$_FILES['imagefile']['name']."'
					,'".$_FILES['imagefile']['name']."','".$deskripsi."')");
					echo "<meta http-equiv='refresh' content='0; url=".base_url()."produk'>";
				}
				else
				{
					echo "Mohon upload foto yang berjenis gambar!";
				}
			
			//kembalikan ke halaman manajemen user
			redirect('produk');
		}
	}
	
	function edit_produk()
	{
		//mencegah user yang belum login untuk mengakses halaman ini
		$this->adminauth->restrict();
		
		$kode='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$kode='';
		}
		else
		{
    			$kode = $this->uri->segment(3);
		}
		
		$data["ls"] = $this->produk_model->tampil_detail_produk($kode);
		$data["kat"] = $this->kategori_model->tampil_semua_kategori();
		$data["title"] = "Edit Produk - Harmonis Grosir Sandal Online";
		
		$this->template->load2('admin/form_edit_produk', $data);
	}
		
	function update_produk(){
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama', 'nama', 'trim|required');
		$this->form_validation->set_rules('harga', 'harga', 'trim|required');
		$this->form_validation->set_rules('stok', 'stok', 'trim|required');
		$this->form_validation->set_rules('dibeli', 'dibeli', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'trim|required');
		$this->form_validation->set_error_delimiters('<span style="color:#FF00000">'.'</span>');
				
			$kategori = mysql_real_escape_string($this->input->post('kategori'));
			$nama = mysql_real_escape_string($this->input->post('nama'));
			$harga = mysql_real_escape_string($this->input->post('harga'));
			$stok = mysql_real_escape_string($this->input->post('stok'));
			$dibeli = mysql_real_escape_string($this->input->post('dibeli'));
			$deskripsi = mysql_real_escape_string($this->input->post('deskripsi'));
			$tipe = mysql_real_escape_string($this->input->post('tipe'));
			$kode = $this->input->post('id');
			$gbr = $this->input->post('gbr');
			
			if(empty($_FILES['imagefile']['name']))
			{
				$this->produk_model->jalankan_query_manual("update produk set id_kategori='".$kategori."', nama_produk='".$nama."', harga='".$harga."', stok='".$stok."', dibeli='".$dibeli."', deskripsi='".$deskripsi."' where id_produk='".$kode."'");;
				echo "<meta http-equiv='refresh' content='0; url=".site_url()."/produk'>";
			}
			else
			{
				if ($_FILES['imagefile']['type'] == "image/jpeg"){
					$ori_src="assets/produk/imgoriginal/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
					if(move_uploaded_file ($_FILES['imagefile']['tmp_name'],$ori_src))
					{
						chmod("$ori_src",0777);
					}else{
						echo "Gagal melakukan proses upload file.";
						exit;
					}
		
					$thumb_src="assets/produk/".strtolower( str_replace(' ','_',$_FILES['imagefile']['name']) );
					
					$n_width = 150;
					$n_height = 150;
				
					if(($_FILES['imagefile']['type']=="image/jpeg") || ($_FILES['imagefile']['type']=="image/png") ||($_FILES['imagefile']['type']=="image/gif"))
					{
						$im = @ImageCreateFromJPEG ($ori_src) or // Read JPEG Image
						$im = @ImageCreateFromPNG ($ori_src) or // or PNG Image
						$im = @ImageCreateFromGIF ($ori_src) or // or GIF Image
						$im = false; // If image is not JPEG, PNG, or GIF
						
						//$im=ImageCreateFromJPEG($ori_src); 
						$width=ImageSx($im);              // Original picture width is stored
						$height=ImageSy($im);             // Original picture height is stored
						if(($n_height==0) && ($n_width==0)) {
							$n_height = $height;
							$n_width = $width;
						}	
		
						if(!$im) {
							echo '<p>Gagal membuat thumnail</p>';
							exit;
						}
						else {				
							$newimage=@imagecreatetruecolor($n_width,$n_height);                 
							@imageCopyResized($newimage,$im,0,0,0,0,$n_width,$n_height,$width,$height);
							@ImageJpeg($newimage,$thumb_src);
							chmod("$thumb_src",0777);
						}
					}
					$this->produk_model->jalankan_query_manual("update produk set id_kategori='".$kategori."', nama_produk='".$nama."', harga='".$harga."', stok='".$stok."', dibeli='".$dibeli."', gbr_kecil='".$_FILES['imagefile']['name']."', gbr_besar='".$_FILES['imagefile']['name']."', deskripsi='".$deskripsi."' where id_produk='".$kode."'");
					$file_kcl = './assets/produk/'.$gbr;
					$file_bsr = './assets/produk/imgoriginal/'.$gbr;
					unlink($file_kcl);
					unlink($file_bsr);
					echo "<meta http-equiv='refresh' content='0; url=".site_url()."/produk'>";
				}
				else
				{
					echo "Mohon upload foto yang berjenis gambar!";
				}
		}
	}
	
	
	function hapus_produk()
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
		$gb='';		
		if ($this->uri->segment(4) === FALSE)
		{
    			$gb='';
		}
		else
		{
    			$gb = $this->uri->segment(4);
		}
		
				$file_kcl = './assetss/produk/'.$gb;
				$file_bsr = './assetss/produk/imgoriginal/'.$gb;
				unlink($file_kcl);
				unlink($file_bsr);
				$data["upd"] = $this->produk_model->hapus_konten($kode,"id_produk","produk");
				echo "<meta http-equiv='refresh' content='0; url=".site_url()."/produk'>";

	}
	
	function detail()
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
		$p_kode = explode("-",$kode);
		
		$data['detail_produk'] = $this->ph_model->tampil_detail_produk($p_kode[0]);
		$judul = "";
		$kd_kategori = "";
		foreach($data['detail_produk']->result() as $dp)
		{
			$judul = $dp->nama_produk.' - Kategori '.$dp->nama_kategori;
			$kd_kategori = $dp->id_kategori;
			$data['nama_kategori'] = $dp->nama_kategori;
			$data['nama_produk'] = $dp->nama_produk;
			$data['title'] = $dp->nama_produk.' | Gadget Baru';
			$link_mentah = str_replace(' ','-',$data['nama_kategori']);
			$data['link'] = strtolower($kd_kategori.'-'.$link_mentah);
		}
		$data['menu'] = $this->ph_model->menu_kategori('0');
		$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
		$data['slide_produk_sejenis'] = $this->ph_model->tampil_produk_sejenis($kd_kategori,$p_kode[0],4);
		
		$this->template->load('detail_produk', $data);
	}
	
	function belanja()
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
		$p_kode = explode("-",$kode);
		
		$data['nama_kategori'] = '';
		if($p_kode[0]=="")
		{
			$seleksi = 'where harga>=0 and harga<='.$p_kode[1].'';
			$data['nama_kategori'] = 'Barang Dengan Kisaran Harga Rp.0,00 - Rp.'.number_format($p_kode[1],2,',','.').'';
		}
		else if($p_kode[1]=="")
		{
			$seleksi = 'where harga>='.$p_kode[0].'';
			$data['nama_kategori'] = 'Barang Dengan Kisaran Harga Di Atas Rp.'.number_format($p_kode[0],2,',','.').'';
		}
		else
		{
			$seleksi = 'where harga>='.$p_kode[0].' and harga<='.$p_kode[1].'';
			$data['nama_kategori'] = 'Barang Dengan Kisaran Harga Rp.'.number_format($p_kode[0],2,',','.').' - Rp.'.number_format($p_kode[1],2,',','.').'';
			
		}
		$data['title'] = $data['nama_kategori'].' | Gadget Baru';
		$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
		$data['kategori'] = $this->ph_model->tampil_produk_per_harga($seleksi);
		
		$this->template->load('belanja_harga', $data);
	}
	
	function kategori()
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
		
		$kat = $this->kategori_model->get_kategori_by_id($kode);
		foreach($kat->result() as $row){
			$nama_kat = $row->nama_kategori;
		}
		$data['nama_kategori'] = 'Kategori '.$nama_kat;
		$data['kategori'] = $this->produk_model->tampil_kategori($kode);
		
		$data['title'] = 'Kategori '.$nama_kat." | Gadget Baru";
		$data['slide_atas'] = $this->ph_model->tampil_slide_produk(15);
		$this->template->load('belanja_harga', $data);
	}
}
	
/* End of file manajemen_user.php */
/* Location: ./application/controllers/manajemen_user.php */