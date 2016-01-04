<h4><?php echo $nama_kategori; ?> </h4>

<?php
if(count($kategori->result_array())>0){
foreach($kategori->result_array() as $kt)
{

			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$kt['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
	<form method="post" action="'.site_url().'/keranjang/tambah_barang">
	<input type="hidden" name="id_produk" value="'.$kt['id_produk'].'">
	<input type="hidden" name="banyak" value="1">
	<input type="hidden" name="stok" value="'.$kt['stok'].'">
	<input type="hidden" name="harga" value="'.$kt['harga'].'">
	<input type="hidden" name="nama_produk" value="'.$kt['nama_produk'].'">
	
	<a href="'.site_url().'/produk/detail/'.$kt['id_produk'].'-'.$link.'" class="vtip" title="'.$kt['nama_produk'].' - Harga Rp'.number_format($kt['harga'],2,',','.').'">
		<div class="thumb-produk">
			<p style="text-align:center; margin:0px auto;"><img src="'.base_url().'assets/produk/'.$kt['gbr_kecil'].'" width="100" />
			<p style="text-align:center; height:40px; margin:0px auto;">
				<strong>'.$kt['nama_produk'].'</strong></p>
				<br /> 
				<p style="text-align:center; font-size: 12px; margin:0px auto;">
				Rp '.number_format($kt['harga'],2,',','.').'
				<br>Stok : '.$kt['stok'].'<div style="width:152px; margin:0px auto; padding:0px;">
				<div style="width:152px; margin:0px auto; padding:0px;">
					<br><input type="submit" class="btn btn-sm btn-warning btn-block" value="Beli">
				</div>
				</div>
			</p>
		</div>
	</a>
	</form>';
}
}
else{
echo "<div class='jumbotron'>Maaf, belum ada produk pada kategori ini. <br>Silahkan melihat-lihat koleksi produk kami pada kategori yang lainnya.</div>";
}
?>