<fieldset>
<legend style="text-align:left; background-color:#F2F2F2; border-top:4px solid #0090C9;border-left:2px solid #0090C9;padding:5px"><strong>Notebook</strong></legend>
<?php
foreach($slide_produk_home->result_array() as $sph)
{
$tss = "";
$mati = "";
if($sph['stok']>0)
{
	$tss = 'Tersedia';
	$mati = "";
}
else
{
	$tss = 'Habis';
	$mati = "disabled";
}
	$link_mentah = str_replace(' ','-',$sph['nama_produk']);
	$link = strtolower($link_mentah);
	echo '
<form method="post" action="'.base_url().'index.php/keranjang/tambah_barang">
	<input type="hidden" name="id_produk" value="'.$sph['id_produk'].'">
	<input type="hidden" name="banyak" value="1">
	<input type="hidden" name="stok" value="'.$sph['stok'].'">
	<input type="hidden" name="harga" value="'.$sph['harga'].'">
	<input type="hidden" name="nama_produk" value="'.$sph['nama_produk'].'">
	
	<a href="'.base_url().'index.php/produk/detail/'.$sph['id_produk'].'-'.$link.'" title="'.$sph['nama_produk'].' - Harga Rp.'.number_format($sph['harga'],2,',','.').'">
	
		<div class="thumb-produk hidden-xs">
			<img src="'.base_url().'assets/produk/'.$sph['gbr_kecil'].'" width="100" />
			<p style="text-align:center; font-size: 14px; height:40px; margin:0px auto;"><strong>'.$sph['nama_produk'].'</strong></p><p style="text-align:center; font-size: 12px; margin:0px auto;"><br /><strong>Rp. '.number_format($sph['harga'],2,',','.').'</strong> <br> Stok '.$tss.'<div class="tombolbeli" style="width:152px; margin:0px auto; padding:0px;"><br /><input type="submit" class="btn btn-sm btn-warning btn-block" value="Beli" '.$mati.'> </div>
			</p>
		</div>
	</a>

<a href="'.base_url().'index.php/produk/detail/'.$sph['id_produk'].'-'.$link.'" title="'.$sph['nama_produk'].' - Harga Rp.'.number_format($sph['harga'],2,',','.').'">
<div class="thumb-produk-small visible-xs">
<img src="'.base_url().'assets/produk/'.$sph['gbr_kecil'].'" width="100" />
<p style="text-align:center; font-size: 14px; height:40px; margin:0px auto;"><strong>'.$sph['nama_produk'].'</strong></p><p style="text-align:center; font-size: 12px; margin:0px auto;"><br /><strong>Rp. '.number_format($sph['harga'],2,',','.').'</strong> <br> Stok '.$tss.'<div style="width:152px; margin:0px auto; padding:0px;"><br /><input type="submit" style="float:left;width:140px" class="btn btn-sm btn-warning " value="Beli" '.$mati.'></div></p></div>
</a>
</form>';
}
?>
</fieldset>
<br>
<fieldset>
<legend style="text-align:left; background-color:#F2F2F2; border-top:4px solid #5D3380;border-left:2px solid #5D3380;padding:5px;padding:5px"><strong>Smartphone</strong></legend>
<?php
foreach($slide_produk_home2->result_array() as $sph)
{
$tss = "";
$mati = "";
if($sph['stok']>0)
{
	$tss = 'Tersedia';
	$mati = "";
}
else
{
	$tss = 'Habis';
	$mati = "disabled";
}
	$link_mentah = str_replace(' ','-',$sph['nama_produk']);
	$link = strtolower($link_mentah);
	echo '
<form method="post" action="'.base_url().'index.php/keranjang/tambah_barang">
<input type="hidden" name="id_produk" value="'.$sph['id_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$sph['harga'].'">
<input type="hidden" name="nama_produk" value="'.$sph['nama_produk'].'">
<a href="'.base_url().'index.php/produk/detail/'.$sph['id_produk'].'-'.$link.'" title="'.$sph['nama_produk'].' - Harga Rp.'.number_format($sph['harga'],2,',','.').'">
<div class="thumb-produk hidden-xs">
<img src="'.base_url().'assets/produk/'.$sph['gbr_kecil'].'" width="100" />
<p style="text-align:center; font-size: 14px; height:40px; margin:0px auto;"><strong>'.$sph['nama_produk'].'</strong></p><p style="text-align:center; font-size: 12px; margin:0px auto;"><br /><strong>Rp. '.number_format($sph['harga'],2,',','.').'</strong> <br> Stok '.$tss.'<div style="width:152px; margin:0px auto; padding:0px;"><br /><input type="submit" class="btn btn-sm btn-warning  btn-block" value="Beli" '.$mati.'></div></p></div></a>

<a href="'.base_url().'index.php/produk/detail/'.$sph['id_produk'].'-'.$link.'" title="'.$sph['nama_produk'].' - Harga Rp.'.number_format($sph['harga'],2,',','.').'">
<div class="thumb-produk-small visible-xs">
<img src="'.base_url().'assets/produk/'.$sph['gbr_kecil'].'" width="100" />
<p style="text-align:center; font-size: 14px; height:40px; margin:0px auto;"><strong>'.$sph['nama_produk'].'</strong></p><p style="text-align:center; font-size: 12px; margin:0px auto;"><br /><strong>Rp. '.number_format($sph['harga'],2,',','.').'</strong> <br> Stok '.$tss.'<div style="width:152px; margin:0px auto; padding:0px;"><br /><input type="submit" style="float:left;width:140px" class="btn btn-sm btn-warning " value="Beli" '.$mati.'></div></p></div>
</a></form>';
}
?>

</fieldset>