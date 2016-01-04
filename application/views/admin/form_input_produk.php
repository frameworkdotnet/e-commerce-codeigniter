<fieldset style="border:1px solid #ccc;padding:10px;">
	<legend><strong>Form Tambah Produk</strong></legend>
    <form method="post" class="form-inline" role="form" action="<?php echo base_url()."index.php/" ?>produk/insert_produk" enctype="multipart/form-data">
    <table width="100%">
        <tr>
            <td width="120">Kode Produk</td><td width="10">:</td>
            <td><div class="form-group">
                    <input type="text" class="form-control" value="GDT" name="kons" readonly="readonly"></div> - <div class="form-group">
                    <input type="text" class="form-control" value="<?php echo $digit_akhir; ?>" name="digit" readonly="readonly">
                </div>
            </td>
        </tr>
        <tr>
            <td width="150">Nama Produk</td><td>:</td>
            <td>
                <div class="form-group">
                    <input class="form-control" type="text" name="nama"  size="60">
                </div>        
            </td>
        </tr>
        <tr>
            <td width="150">Kategori Produk</td><td>:</td>
        <td>
           <div class="form-group"><select class="form-control" name="kategori" >
            <?php
                foreach($kat->result_array() as $k)
                {
                    echo '<option value="'.$k['id_kategori'].'">'.$k['nama_kategori'].'</option>';
                }
            ?>
            </select></div>
        </td></tr>
        <tr>
            <td width="120">Harga</td><td>:</td>
            <td><div class="form-group"><input class="form-control" type="text" name="harga"  size="60"></div> </td>
        </tr>
        <tr>
            <td width="120">Stok Barang</td><td>:</td>
            <td><div class="form-group"><input class="form-control" type="text" name="stok"  size="60"></div> </td>
        </tr>
        <tr>
            <td width="120">Dibeli</td><td>:</td>
            <td><div class="form-group"><input class="form-control" type="text" name="dibeli" value="1"  size="20"></div> </td>
        </tr>
        <tr>
            <td width="120" valign="top">Deskripsi Produk</td><td valign="top">:</td>
            <td><div class="form-group"><textarea class="form-control" name="deskripsi"  cols="62" rows="8"></textarea></div></td>
        </tr>
        <tr>
            <td width="120">Gambar Produk</td><td>:</td>
            <td><input type="file" size="40" name="imagefile" > * Gambar maksimal ukuran 400px</td>
        </tr>
        <tr>
            <td width="120"></td><td></td>
            <td><br><input class="btn btn-primary" type="submit" value="Simpan Data"> </td>
        </tr>
    </table>
    </form>
</fieldset>