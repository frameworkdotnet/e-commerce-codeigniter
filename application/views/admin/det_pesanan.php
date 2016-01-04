<h1>History Transaksi - Harmonis Grosir Sandal Online</h1>
<div class="cleaner_h10"></div>
<table width="100%" style="border:1px solid #CCCCCC;" cellspacing="0">
<tr><td class="td-keranjang">Tgl Transaksi</td><td class="td-keranjang">Kode Transaksi</td><td class="td-keranjang">Nama Produk</td></tr>
<?php
if(count($history->result_array())>0){
foreach($history->result_array() as $in)
{
	$tot = $in['harga']*$in['jumlah'];
		echo "<tr><td class='td-keranjang' width='80' rowspan=2>".substr($in['kode_transaksi'],6,2)."-".substr($in['kode_transaksi'],4,2)."-".substr($in['kode_transaksi'],0,4)."</td><td class='td-keranjang' rowspan=2>".$in['kode_transaksi']."</td><td class='td-keranjang'>".$in['nama_produk']."</td></tr><tr><td class='td-keranjang'>Rp. ".number_format($in['harga'],2,',','.')." x ".$in['jumlah']." = Rp. ".number_format($tot,2,',','.')."</td></tr>";
}
}
else{
echo "<tr><td colspan=3>Maaf, belum ada transaksi pada tanggal ini.</td></tr>";
}
?>
</table>
<div class="cleaner_h5"></div>
<table align="center"><tr><td><?php echo $paginator; ?></td></tr></table>