<fieldset style="border:1px solid #ccc;padding:10px;">
	<legend><strong>Form Input Kategori</strong></legend>
    <form method="post" class="form-inline" role="form" action="<?php echo site_url(); ?>/kategori/insert_kategori">
        <table width="100%">
            <tr><td>Nama Kategori Produk</td><td>:</td><td><div class="form-group">
            <input type="text" class="form-control" name="nama" size="30"></div></td></tr>
            
            <tr><td width="150">Kategori Produk</td><td>:</td><td>
            <div class="form-group">
            <select class="form-control" name="kategori">
            <option value="0">Induk</option>
            <?php
                foreach($kategori->result_array() as $k)
                {
                    echo '<option value="'.$k['id_kategori'].'">'.$k['nama_kategori'].'</option>';
                }
            ?>
            </select></div>
            </td></tr>
            <tr><td width="120"></td><td></td><td><br><input class="btn btn-primary" type="submit" class="input-tombol" value="Simpan Data"> </td></tr>
        </table>
    </form>
</fieldset>