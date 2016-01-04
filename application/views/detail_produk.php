<?php
foreach($detail_produk->result_array() as $dp)
{
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$dp['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
?>
<?php
echo '<h2>'.$dp['nama_produk'].'</h2>';
?>

<div class="share">Bagikan Produk ini ke : 
	<script language="javascript">
document.write("<a href='http://twitter.com/home/?status=" + document.URL + "' target='_blank'> Twitter</a> | <a href='http://www.facebook.com/share.php?u=" + document.URL + "' target='_blank'> Facebook</a> | <a href='http://www.reddit.com/submit?url=" + document.URL + "' target='_blank'> Reddit</a> | <a href='http://digg.com/submit?url=" + document.URL + "' target='_blank'> Digg</a>");
</script>
</div>
<br>
<?php
$ts = "";
$tmati = "";
if($dp['stok']>0)
{
	$ts = $dp['stok'];
	$tmati = "";
}
else
{
	$ts = 'Maaf, Stok Barang Habis';
	$tmati = "disabled";
}
echo '<form method="post" class="form-inline" role="form" action="'.base_url().'index.php/keranjang/tambah_barang">
<table width=100% class=hidden-xs>
<tr><td rowspan=5>
		<img id="popup" src='.base_url().'assets/produk/'.$dp['gbr_kecil'].' width=150 data-zoom-image="'.base_url().'assets/produk/imgoriginal/'.$dp['gbr_besar'].'"/>


</td>
<td>Harga </td><td>:</td><td><span style="margin:0px auto; padding:0px; font-size:15px;"><b>Rp.'.number_format($dp['harga'],2,',','.').'</b></span></td></tr>
<tr><td>Stok Barang </td><td>:</td><td>'.$ts.'</td></tr>

<tr><td>Jumlah Pesanan </td><td>:</td><td>
<div class="form-group">
<select class="form-control" name="banyak">';
for($j=1;$j<=$dp['stok'];$j++)
{
	echo '<option value="'.$j.'">'.$j.'</option>';
}
echo '</select></div>
<input type="hidden" name="stok" value="'.$dp['stok'].'">
<input type="hidden" name="id_produk" value="'.$dp['id_produk'].'">
<input type="hidden" name="harga" value="'.$dp['harga'].'">
<input type="hidden" name="nama_produk" value="'.$dp['nama_produk'].'">
<tr><td colspan=3><input type="submit" value="Beli" class="btn btn-warning btn-default beli" '.$tmati.'></td></tr>
<tr><td>
</td></tr>
</table>';


//------------------------------------tampil di ukuran smartphone-------------------------------------//
echo '<table width=auto class=visible-xs>
<tr>
	<td align="center">
			<img id="popup" src='.base_url().'assets/produk/'.$dp['gbr_kecil'].' width=150 data-zoom-image="'.base_url().'assets/produk/imgoriginal/'.$dp['gbr_besar'].'"/>
	<br><br></td>
</tr>
<tr><td>Harga :</td></tr>
<tr><td><span style="margin:0px auto; padding:0px; font-size:15px;"><b>Rp.'.number_format($dp['harga'],2,',','.').'</b></span><br><br></td></tr>

<tr><td>Stok Barang :</td></tr><tr><td>'.$ts.'<br><br></td></tr>

<tr><td>Jumlah Pesanan :</td></tr>
<tr><td>
	<div class="form-group">
		<select class="form-control" name="banyak">';
		for($j=1;$j<=$dp['stok'];$j++)
		{
			echo '<option value="'.$j.'">'.$j.'</option>';
		}
		echo '</select>
	</div>
	<input type="hidden" name="stok" value="'.$dp['stok'].'">
	<input type="hidden" name="id_produk" value="'.$dp['id_produk'].'">
	<input type="hidden" name="harga" value="'.$dp['harga'].'">
	<input type="hidden" name="nama_produk" value="'.$dp['nama_produk'].'">
</td></tr>
<tr><td>
	
	<input style="width:290px" type="submit" value="Beli" class="btn btn-warning btn-default btn-lg btn-block" '.$tmati.'></td>
</tr>
</table>';
//------------------------------------tampil di ukuran smartphone-------------------------------------//

echo'</form>
<br>
<fieldset class="bingkai" style="width:auto">
    	<legend class="jd-bingkai"><strong>Deskripsi Produk</strong></legend>';
		if($dp['deskripsi']==null)
		{ 
			echo "Deskripsi produk masih kosong."; 
		} 
		else 
		{ 
			echo $dp['deskripsi']; 
		}
		echo '</fieldset>';
}
?>
<br>
<p>
<blockquote class="hidden-xs"><h3>Produk Lainnya Dengan Kategori <?php echo $nama_kategori; ?></h3></blockquote>
<?php
foreach($slide_produk_sejenis->result_array() as $sps)
{
$tss = "";
$mati = "";
if($sps['stok']>0)
{
	$tss = 'Tersedia';
	$mati = "";
}
else
{
	$tss = 'Habis';
	$mati = "disabled";
}
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$sps['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
<form method="post" action="'.base_url().'index.php/keranjang/tambah_barang">
	<input type="hidden" name="id_produk" value="'.$sps['id_produk'].'">
	<input type="hidden" name="banyak" value="1">
	<input type="hidden" name="stok" value="'.$sps['stok'].'">
	<input type="hidden" name="harga" value="'.$sps['harga'].'">
	<input type="hidden" name="nama_produk" value="'.$sps['nama_produk'].'">
	<a href="'.base_url().'index.php/produk/detail/'.$sps['id_produk'].'-'.$link.'" title="'.$sps['nama_produk'].' - Harga Rp.'.number_format($sps['harga'],2,',','.').'">
		<div class="thumb-produk hidden-xs">
			<p style="text-align:center; margin:0px auto;"><img src="'.base_url().'assets/produk/'.$sps['gbr_kecil'].'" width="100" />
			<p style="text-align:center; height:40px; margin:0px auto;"><strong>'.$sps['nama_produk'].'</strong></p>
			<br />
			<p style="text-align:center; font-size: 12px; margin:0px auto;">
				<strong>Rp. '.number_format($sps['harga'],2,',','.').'</strong> 
				<br> Stok '.$tss.'
				<div style="width:152px; margin:0px auto; padding:0px;">
					<br /><input type="submit" class="btn btn-sm btn-warning btn-block" value="Beli" '.$mati.'>
				</div>
			</p>
		</div></a>
</form>';
}
?>
