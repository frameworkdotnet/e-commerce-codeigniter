<h1>History Transaksi - Harmonis Grosir Sandal Online</h1>
<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr><th>Tgl Transaksi</th><th>Kode Transaksi</th><th>Nama Produk</th></tr>
            </thead>
            <tbody>
                <?php
                if(count($history->result_array())>0){
					foreach($history->result_array() as $in)
					{
						$tot = $in['harga']*$in['jumlah'];
						echo "<tr><td rowspan=2>".substr($in['kode_transaksi'],6,2)."-".substr($in['kode_transaksi'],4,2)."-".substr($in['kode_transaksi'],0,4)."</td><td class='td-keranjang' rowspan=2>".$in['kode_transaksi']."</td><td class='td-keranjang'>".$in['nama_produk']."</td></tr><tr><td class='td-keranjang'>Rp. ".number_format($in['harga'],2,',','.')." x ".$in['jumlah']." = Rp. ".number_format($tot,2,',','.')."</td></tr>";
					}
                }
                else
				{
                echo "<tr><td colspan=3>Maaf, belum ada transaksi pada tanggal ini.</td></tr>";
                }
                ?>
			</tbody>
        </table>
    </div>
</div>