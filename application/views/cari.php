<h4>Hasil Pencarian Produk - Gadget Baru</h4>
<?php
if(count($cariproduk)>0){
foreach($cariproduk as $kt)
{
			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$kt['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
<form method="post" action="'.base_url().'keranjang/tambah_barang">
<input type="hidden" name="id_produk" value="'.$kt['id_produk'].'">
<input type="hidden" name="banyak" value="5">
<input type="hidden" name="harga" value="'.$kt['harga'].'">
<input type="hidden" name="nama_produk" value="'.$kt['nama_produk'].'">
<a href="'.base_url().'index.php/produk/detail/'.$kt['id_produk'].'-'.$link.'" title="'.$kt['nama_produk'].' - Harga Rp.'.number_format($kt['harga'],2,',','.').'">
<div class="thumb-produk">
<p style="text-align:center; font-size: 14px; height:40px; margin:0px auto;"><strong>'.$kt['nama_produk'].'</strong></p><p style="text-align:center; margin:0px auto;"><img src="'.base_url().'assets/produk/'.$kt['gbr_kecil'].'" width="100" /><br /><p style="text-align:center; font-size: 12px; margin:0px auto;"><br /><strong>Rp. '.number_format($kt['harga'],2,',','.').'</strong> <br> Stok : '.$kt['stok'].'<div style="width:152px; margin:0px auto; padding:0px;"><br /><input type="submit" class="btn btn-sm btn-warning btn-block" value="Beli"> </div></p></div></a></form>';
}
}
else{
echo "Maaf, tidak ditemukan produk dengan keyword <b>".$kata."</b> di website ini. <br>Silahkan melihat-lihat koleksi produk kami pada kategori yang lainnya.";
}
?>
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table><br>
