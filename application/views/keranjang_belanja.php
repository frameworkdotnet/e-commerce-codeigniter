<h1>Keranjang Belanja - Gadget Baru</h1>
<?php if(!$this->cart->contents()):
	echo '<div class="jumbotron">
		  <h3 align=center>Maaf, Keranjang Belanja Anda Masih Kosong.</h3>
		</div>';
else:
?>

<form method="post" class="form-inline" role="form" action="<?php echo site_url()."/keranjang/update_keranjang"; ?>">
<div class="table-responsive">
    <table class="table table-bordered table-condensed" cellpding="0" cellspacing="0" border="1">
        <thead>    
            <tr class="active">
                <th >Jumlah</th>
                <th >Nama Barang</th>
                <th >Harga</td>
                <th >Sub Total</th>
                <th >Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach($this->cart->contents() as $items): ?>
            
            <?php echo form_hidden('rowid[]', $items['rowid']); ?>
            <tr <?php if($i&1){ echo 'class="alt"'; }?>>
                <td ><div class="form-group">
                <select class="form-control" name="qty[]" class="input-teks">
                    <?php 
                    for($i=1;$i<=$items['stk'];$i++)
                    {
						if($i==$items['qty'])
						{
							echo "<option selected>".$items['qty']."</option>";
						}
						else
						{
							echo "<option>".$i."</option>";
						}
                    }	
                    ?>
                </select></div>
                </td>
                
                <td ><?php echo $items['name']; ?></td>
                
                <td >Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                <td >Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                <td  align="center"><a class="btn btn-danger btn-xs" href="<?php echo base_url(); ?>index.php/keranjang/hapus_keranjang/<?php echo $items['rowid']; ?>">Hapus <span class='glyphicon glyphicon-trash'></span></a></td>
            </tr>
            
            <?php $i++; ?>
            <?php endforeach; ?>
            
            <tr>
                <td  colspan=3><b>Total Belanja</b></td>
                <td  colspan=2>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
            </tr>
            <tr>
                <td  colspan=5><?php echo "<button type=submit class='btn btn-success btn-xs'>Update Keranjang Belanja <span class='glyphicon glyphicon-refresh'></span></button>";?></td>
            </tr>
        </tbody>
    </table>
</div>
<div style="float:right">
    <a class="btn btn-info btn-default" href="<?php echo base_url(); ?>index.php/web">Lanjut Belanja <span class='glyphicon glyphicon-share'></span></a>
    <a class="btn btn-primary btn-default" href="<?php echo base_url(); ?>index.php/checkout">Selesai Belanja <span class='glyphicon glyphicon-check'></span></a>
</div><br><br>
<small>* Total harga di atas belum termasuk ongkos kirim yang akan dihitung saat Selesai Belanja</small>

<?php 
echo form_close(); 
endif;
?>

<div class="cleaner_h20"></div>
<h1>Rekomendasi Produk Dari kami</h1>
<?php
foreach($slide_rekomendasi->result_array() as $sr)
{
$tss = "";
$mati = "";
if($sr['stok']>0)
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
			$s = strtolower(str_replace($d,"",$sr['nama_produk']));
			$link = strtolower(str_replace($c, '-', $s));
	echo '
<form method="post" action="'.base_url().'index.php/keranjang/tambah_barang">
<input type="hidden" name="id_produk" value="'.$sr['id_produk'].'">
<input type="hidden" name="banyak" value="1">
<input type="hidden" name="stok" value="'.$sr['stok'].'">
<input type="hidden" name="harga" value="'.$sr['harga'].'">
<input type="hidden" name="nama_produk" value="'.$sr['nama_produk'].'">

<a href="'.base_url().'index.php/produk/detail/'.$sr['id_produk'].'-'.$link.'" title="'.$sr['nama_produk'].' - Harga Rp.'.number_format($sr['harga'],2,',','.').'">
<div class="thumb-produk">
<p style="text-align:center; margin:0px auto;"><img src="'.base_url().'assets/produk/'.$sr['gbr_kecil'].'" width="100" />
<p style="text-align:center; height:40px; margin:0px auto;"><strong>'.$sr['nama_produk'].'</strong></p>
<p style="text-align:center; font-size: 12px; margin:0px auto;"><br /><strong>Rp. '.number_format($sr['harga'],2,',','.').'</strong> <br> Stok '.$tss.'<div style="width:152px; margin:0px auto; padding:0px;"><br />
<input type="submit" class="btn btn-sm btn-warning btn-block" value="Beli" '.$mati.'> </div></p></div>
</a>
</form>';
}
?>

