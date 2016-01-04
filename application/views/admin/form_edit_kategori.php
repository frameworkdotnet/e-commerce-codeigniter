<form method="post" class="form-inline" role="form" action="<?php echo site_url(); ?>/kategori/edit_kategori">
<h3>Form Edit Kategori</h3>
<?php
foreach($ls->result_array() as $e)
{

?>
<input type="hidden" name="id" value="<?php echo $e['id_kategori']; ?>" />
<table width="100%">
	<tr><td width="150">Nama Kategori Produk</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" name="nama" class="login-inp" size="60" value="<?php echo $e['nama_kategori']; ?>"></div></td></tr>
	<tr><td width="150">Kategori Parent</td><td>:</td><td>
	<div class="form-group"><select class="form-control" name="prnt" class="login-inp">
	<option value="0" selected>Induk</option>
	<?php
		foreach($kat->result_array() as $k)
		{
			if($k['id_kategori']==$e['kode_parent'])
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
	<tr><td width="120"></td><td></td><td><br><input class="btn btn-primary" type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
</table>
</form>
<?php
}
?>
