<h1>History Transaksi - Harmonis Grosir Sandal Online</h1>

<div class="panel-body">
    <div class="table-responsive">
        <table class="table table-bordered table-hover table-condensed">
            <thead>
                <tr><th>Tanggal Transaksi</th><th>Jumlah Produk Yang Dibeli</th></tr>
            </thead>
            <tbody>
                <?php
                if(count($history->result_array())>0){
                foreach($history->result_array() as $in)
                {
                    echo "<tr><td class='td-keranjang' width='50%'><a href='".site_url()."/home/dethistory/".substr($in['kode_transaksi'],0,8)."'>".substr($in['kode_transaksi'],6,2)."-".substr($in['kode_transaksi'],4,2)."-".substr($in['kode_transaksi'],0,4)."</a></td><td class='td-keranjang'>".$in['jm']." Produk</td></tr>";
                }
                }
                else{
                echo "<tr><td colspan=2>Maaf, belum ada transaksi selama anda berbelanja di website kami.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>