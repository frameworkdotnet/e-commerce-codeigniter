<div id="slider-banner">
	<div id="wrap"> 
		<ul id="hs" class="jcarousel-skin-tango-hs"> 
<?php
foreach($slide_atas->result_array() as $sa)
{

			$c = array (' ');
    		$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
			$s = strtolower(str_replace($d,"",$sa['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '<li><a href="'.base_url().'produk/detail/'.strtolower($sa['kode_produk']).'-'.$link.'" class="vtip" title="'.$sa['nama_produk'].' - Harga Rp.'.number_format($sa['harga'],2,',','.').'"><img src="'.base_url().'asset/produk/'.$sa['gbr_kecil'].'" alt="'.$sa['nama_produk'].'"><br />'.$sa['nama_produk'].'<br>Harga Rp.'.number_format($sa['harga'],2,',','.').'</a></li> ';
}
?>
		</ul> 
	</div> 
</div>