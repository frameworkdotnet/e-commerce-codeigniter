<h1>Konfirmasi Pembayaran</h1><br>
<table width="98%" cellpadding="10">
<tr><td valign="top">
<form method="post" class="form-inline" role="form" action="<?php echo site_url(); ?>/laporan">
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
				<thead><tr><td>Id Transaksi</td><td style="padding:5px;">Nama</td><td  >Email</td><td  >Telepon</td><td  >Jumlah Pembayaran</td><td  >Tanggal Pembayaran</td><td  >No Rekening</td><td  >Nama Rekening</td><td  >Bank Tujuan</td><td  >Metode Pembayaran</td></tr></thead>
				<tbody>
				<?php
				foreach($tampil->result_array() as $tp)
				{
				echo '<tr>
				<td width="120"  >'.$tp['id_konfirmasi'].'</td>
				<td  >'.$tp['nama'].'</td>
				<td  >'.$tp['email'].'</td>
				<td  >'.$tp['telepon'].'</td>
				<td  >'.$tp['jumlah_pembayaran'].'</td>
				<td  >'.$tp['tgl_pembayaran'].'</td>
				<td  >'.$tp['no_rekening'].'</td>
				<td  >'.$tp['nama_rekening'].'</td>
				<td  >'.$tp['bank_tujuan'].'</td>
				<td  >'.$tp['metode_pembayaran'].'</td>
				
				</tr>';
				}
				?></tbody>
			</table>