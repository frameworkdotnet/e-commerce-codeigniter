		<h1>Pesanan Pelanggan</h1><br>
		<table width="98%" cellpadding="10">
		<tr><td valign="top">
<form method="post" class="form-inline" role="form" action="<?php echo site_url(); ?>/pesanan">
<div class="form-group"><select class="form-control" name="tgl" class="login-inp">
<?php
  for ($i=1; $i<=31; $i++)
  {
		$lebar=strlen($i);
		switch($lebar){
		  case 1:
		  {
			echo '<option value="0'.$i.'">0'.$i.'</option>';
			break;     
		  }
		  case 2:
		  {
			echo '<option value="'.$i.'">'.$i.'</option>';
			break;     
		  }      
		} 
	}
?>
</select></div>
<div class="form-group"><select class="form-control" name="bln" class="login-inp">
<?php
  for ($j=1; $j<=12; $j++)
  {
		$lebar=strlen($j);
		switch($lebar){
		  case 1:
		  {
			echo '<option value="0'.$j.'">0'.$j.'</option>';
			break;     
		  }
		  case 2:
		  {
			echo '<option value="'.$j.'">'.$j.'</option>';
			break;     
		  }      
		} 
	}
?>
</select></div>
<div class="form-group"><select class="form-control" name="thn" class="login-inp">
<?php
	for($k=2010;$k<=date('Y');$k++)
	{
		echo '<option value="'.$k.'">'.$k.'</option>';
	}
?>
</select></div>
<input type="submit" class="btn btn-success" value="Lihat Transaksi" class="input-tombol" />
</form>
<p>
<div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed" id="dataTables-example">
				<thead><tr><td>Kode Transaksi</td><td>Pemesan</td><td>Penerima</td><td>Kode Produk</td><td>Nama Produk</td><td>Harga</td><td  >Jumlah</td><td  >Total Harga</td>
				</tr></thead>
				<tbody><?php
					foreach($tampil->result_array() as $tp)
					{
					$tot = $tp['jumlah']*$tp['harga'];
					echo '<tr><td width="120"  >'.$tp['kode_transaksi'].'</td><td  >'.$tp['user_nama'].'</td>
					<td  >'.$tp['nama_penerima'].'</td><td  >'.$tp['id_produk'].'</td>
					<td  >'.$tp['nama_produk'].'</td><td  >'.$tp['harga'].'</td>
					<td  >'.$tp['jumlah'].'</td><td>'.$tot.'</td>
					</tr>';
					}
					?></tbody>
			</table>
		</div>
</div>