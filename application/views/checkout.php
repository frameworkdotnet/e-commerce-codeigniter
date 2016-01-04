<h1>Pemesanan Barang</h1>
<hr>
<?php if(!$this->cart->contents()){
	echo '<div class="jumbotron">
		  <h3 align=center>Maaf, Keranjang Belanja Anda Masih Kosong.</h3>
		</div>';
	}
else{
?>
<?php
if(isset($pesan)){
	echo "<h4 align=center>".$pesan."</h4>";
}else{
	echo "";
}
foreach($det_member->result_array() as $dm)
{

?>
<form class="form-inline" role="form" method="post" action="<?php echo site_url(); ?>/checkout/update_keranjang">

    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed detker">
        	<thead>
                <tr>
                    <th colspan="5"><h4 align="center">Detail Keranjang Belanja</h4></th>
                </tr>
            </thead>
            <thead>
                <tr align="center">
                    <th >Jumlah</th>
                    <th >Nama Barang</th>
                    <th >Harga</th>
                    <th >Sub Total</th>
                    <th >Hapus</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach($this->cart->contents() as $items): ?>
                
                <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                <tr>
                    <td >
                        <div class="form-group">
                            <input class="form-control" type="text" size="1"  name="qty[]"  value="<?php echo $items['qty']; ?>" maxlength="2" />		</div>
                    </td>
                    
                    <td ><?php echo $items['name']; ?></td>
                    
                    <td >Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                    <td >Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                    <td  align="center"><a class='btn btn-danger btn-xs' href="<?php echo site_url(); ?>/checkout/hapus_keranjang/<?php echo $items['rowid']; ?>">Hapus <span class='glyphicon glyphicon-trash'></span></a></td>
                </tr>
                
                <?php $i++; ?>
                <?php endforeach; ?>
                
                <tr>
                    <td  colspan=3><b>Total Belanja</b></td>
                    <td  colspan=2>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                </tr>
                <tr>
                    <td  colspan=5><?php echo "<button type='submit' class='btn btn-success btn-xs'>Update Keranjang Belanja <span class='glyphicon glyphicon-refresh'></span></button>";?></td>
            </tbody>
        </table>
    </div>
</form>

<?php 
}
?>
<form class="form-inline" role="form" method="post" action="<?php echo site_url(); ?>/checkout/kirim_invoice" name="frmCheckout"><fieldset class="detail">
    <legend align="left"><strong>Detail Data Pembeli :</strong></legend>
        <table>
            <tr>
            	<td>Nama Pembeli</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" size="50"  name="namapem"  value="<?php echo $dm['user_nama']; ?>" /></div>
                </td>
            </tr>
            <tr>
            <td>Email Pembeli</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" size="50"  name="emailpem"  value="<?php echo $dm['email']; ?>" /></div></td></tr>
            
            <tr><td valign="top">Alamat Pembeli</td><td valign="top">:</td><td><div class="form-group"><textarea class="form-control" name="alamatpem" cols="53"  rows="6" ><?php echo $dm['alamat']; ?></textarea></div></td></tr>
            
            <tr><td>No. Telepon</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" size="50"  name="teleponpem"  value="<?php echo $dm['telepon']; ?>" /></div></td></tr>
            
            <tr><td>Propinsi</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" size="50"  name="propinsipem"  value="<?php echo $dm['propinsi']; ?>" /></div></td></tr>
            
            <tr><td>Kota</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" size="50"  name="kotapem"  value="<?php echo $dm['kota']; ?>" /></div></td></tr>
            
            <tr><td>Kode Pos</td><td>:</td><td><div class="form-group"><input class="form-control" type="text" size="50"  name="kodepospem"  value="<?php echo $dm['kode_pos']; ?>" /></div></td></tr>
        </table>
</fieldset>
<br><br>
<fieldset class="metode">
    <legend align="left"><strong>Metode Pembayaran dan Pengiriman Paket :</strong></legend>
        <table>
        <tr><td >Bank Tujuan</td><td>:</td><td>
        <div class="form-group"><select class="form-control"  name="bank" >
             <option value="Bank Central Asia - No. Rek 1800658299">Bank Central Asia - No. Rek 1800658299</option>
            <option value="Bank Mandiri - No. Rek 143-00-1170047-1">Bank Mandiri - No. Rek 143-00-1170047-1</option>
            <option value="Bank BRI - No. Rek 6125-01-003271-53-9">Bank BRI - No. Rek 6125-01-003271-53-9</option>
            <option value="Bank Mandiri Syariah - No. Rek 2857027105">Bank Mandiri Syariah - No. Rek 2857027105</option>
        </select></div>
        </td></tr>
        <tr><td >Metode Pembayaran</td><td>:</td><td>
        <div class="form-group"><select class="form-control" name="metode" ><option value="Setoran Tunai, Transfer Bank">Setoran Tunai, Transfer Bank</option>
            <option value="Setoran Tunai, Transfer Antar Bank">Setoran Tunai, Transfer Antar Bank</option>
            <option value="ATM">ATM</option>
            <option value="ATM - Antar Bank">ATM - Antar Bank</option>
            <option value="Internet Banking">Internet Banking</option>
            <option value="Internet Banking - Antar Bank">Internet Banking - Antar Bank</option>
            <option value="SMS Banking">SMS Banking</option>
            <option value="SMS Banking - Antar Bank">SMS Banking - Antar Bank</option>
        </select></div>
        </td></tr>
    <tr><td >Paket Pengiriman</td><td>:</td><td>
        <div class="form-group"><select class="form-control" name="paket" >
            <option value="TIKI">TIKI</option>
            <option value="JNE">JNE</option>
            <option value="ESL Express">ESL Express</option>
        </select></div>
        </td></tr>
    <tr><td valign="top">Pesan (jika ada)</td><td valign="top">:</td><td><div class="form-group"><textarea class="form-control" name="pesan" cols="53" rows="6" ></textarea></div></td></tr>
    <tr><td valign="top"></td><td valign="top"></td><td><br><input type="submit" value="Kirim Data Pesanan" class='btn btn-primary' /></td></tr>
    </table>
</fieldset>
</form>
<?php
}
?>
<p>