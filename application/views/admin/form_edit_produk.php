<strong>Form Edit Produk :</strong>
<form method="post" class="form-inline" role="form"  action="<?php echo site_url(); ?>/produk/update_produk" enctype="multipart/form-data">
<?php
foreach($ls->result_array() as $e)
{
?>
<input type="hidden" name="id" value="<?php echo $e['id_produk']; ?>" />
<input type="hidden" name="gbr" value="<?php echo $e['gbr_kecil']; ?>" />
<table width="100%">
	<tr><td width="120">Kode Produk</td><td width="10">:</td><td><div class="form-group"><input class="form-control" type="text" name="kd" readonly="readonly" size="40" value="<?php echo $e['id_produk']; ?>"></div> </td></tr>
    
	<tr><td width="150">Nama Produk</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" name="nama" size="60" value="<?php echo $e['nama_produk']; ?>"></div></td></tr>
    
	<tr><td width="150">Kategori Produk</td><td>:</td><td>
	<div class="form-group"><select class="form-control" name="kategori">
	<?php
		foreach($kat->result_array() as $k)
		{
			if($e['id_kategori']==$k['id_kategori'])
			{
				echo '<option value="'.$k['id_kategori'].'" selected>'.$k['nama_kategori'].'</option>';
			}
			else
			{
				echo '<option value="'.$k['id_kategori'].'">'.$k['nama_kategori'].'</option>';
			}
		}
	?>
	</select></div>
	</td></tr>
    
	<tr><td width="120">Harga</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" name="harga" size="60" value="<?php echo $e['harga']; ?>"></div></td></tr>
    
	<tr><td width="120">Stok Barang</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" name="stok" size="60" value="<?php echo $e['stok']; ?>"></div> </td></tr>
    
	<tr><td width="120">Dibeli</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" name="dibeli" size="20" value="<?php echo $e['dibeli']; ?>"></div> </td></tr>
    
	<tr><td width="120" valign="top">Deskripsi Produk</td><td valign="top">:</td><td><div class="form-group"><textarea class="form-control" name="deskripsi" cols="70" rows="8"><?php echo $e['deskripsi']; ?></textarea></div></td></tr>
    
	<tr><td width="120" valign="top">Gambar</td><td valign="top">:</td><td><img src="<?php echo base_url(); ?>assets/produk/<?php echo $e['gbr_kecil'];?>"</td></tr>
    
	<tr><td width="120">Ganti Gambar</td><td>:</td><td><input type="file" size="40" name="imagefile"> * Gambar maksimal ukuran 400px</td></tr>
    
	<tr><td width="120"></td><td></td><td><input class="btn btn-primary" type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
</form>
		</td></tr>
		</table>
<?php
}
?>