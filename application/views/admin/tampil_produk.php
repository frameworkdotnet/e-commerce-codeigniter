	<h3 class="text-center">
        Data Produk
    </h3>
    <?php echo "<a class='btn btn-primary btn-xs' href=".base_url()."index.php/produk/insert_produk>Tambah Produk <span class='glyphicon glyphicon-plus'></span></a>";?>
    <p>
	<div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Stok</th>
                            <th>Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($all_produk->result() as $row)
                        {
                            echo "<tr>
                                        <td>".$row->id_produk."</td>
                                        <td>".$row->nama_produk."</td>
                                        <td>".$row->nama_kategori."</td>
										<td>".$row->stok."</td>
                                        <td>".$row->harga."</td>
                                        <td align=center>
                                            <a class='btn btn-info btn-xs' href=".base_url()."index.php/produk/edit_produk/".$row->id_produk.">Edit <span class='glyphicon glyphicon-pencil'></span></a> <a class='btn btn-danger btn-xs' href=".base_url()."index.php/produk/hapus_produk/".$row->id_produk." onClick=\"return confirm('Anda yakin ingin menghapus konten ini ?')\"> Hapus <span class='glyphicon glyphicon-trash'></span></a>
                                        </td>
                                </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
		</div>