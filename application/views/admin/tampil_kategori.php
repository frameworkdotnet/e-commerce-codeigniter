<h3 class="text-center">
    Data Kategori
</h3>
<?php echo '<a class="btn btn-primary btn-xs" href="'.base_url().'index.php/kategori/insert_kategori/">Tambah Kategori <span class="glyphicon glyphicon-plus"></span></a><p>';
foreach($all_kategori->result_array() as $k1)
{
	$nm_link1 = $k1['id_kategori'].'-'.$k1['nama_kategori'];
	$ld1 = strtolower(str_replace(" ","-",$nm_link1));
	?>
	<div class="panel panel-default">
      <!-- Default panel contents -->
      <div class="panel-heading">
      	<?php echo "<h4>". $k1['nama_kategori'].' - <a class="btn btn-info btn-xs" href="'.base_url().'index.php/kategori/edit_kategori/'.$k1['id_kategori'].'">Edit <span class="glyphicon glyphicon-pencil"></span></a> <a class="btn btn-danger btn-xs" href="'.base_url().'index.php/kategori/hapus_kategori/'.$k1['id_kategori'].'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini ?")\'> Hapus <span class="glyphicon glyphicon-trash"></span></a></h4>';?>
      </div>
      <div class="panel-body">
      
		<ul class="list-group">
			<?php 
			$sub1 = $this->kategori_model->get_all_kategori($k1['id_kategori']);
			foreach($sub1->result() as $sm1)
			{
				echo '<li class="list-group-item">';
				$nm_link2 = $sm1->id_kategori.'-'.$sm1->nama_kategori;
				$ld2 = strtolower(str_replace(" ","-",$nm_link2));
				$sub2 = $this->kategori_model->get_all_kategori($sm1->id_kategori);
				
				echo $sm1->nama_kategori.' - <a class="btn btn-info btn-xs" href="'.base_url().'index.php/kategori/edit_kategori/'.$sm1->id_kategori.'">Edit <span class="glyphicon glyphicon-pencil"></span></a>  <a class="btn btn-danger btn-xs" href="'.base_url().'index.php/kategori/hapus_kategori/'.$sm1->id_kategori.'" onClick=\'return confirm("Anda yakin ingin menghapus konten ini ?")\'> Hapus <span class="glyphicon glyphicon-trash"></span></a>';
				
				echo "</li>";
			}
			?>
		  </ul>
     </div>
</div>
<?php
}
?>