	<h3 class="text-center">
        Data Admin
    </h3>
    <?php echo '<a class="btn btn-primary btn-xs" href="'.base_url().'index.php/manajemen_admin/insert_admin/">Tambah admin <span class="glyphicon glyphicon-plus"></span></a><p>';?>
    <p>
	<div class="panel-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($all_admin->result() as $row)
                        {
                            echo "<tr>
                                        <td>".$no."</td>
                                        <td>".$row->nama."</td>
                                        <td>".$row->username."</td>
										<td>".$row->password."</td>
                                        <td align=center>
											<a class='btn btn-info btn-xs' href=".base_url()."index.php/manajemen_admin/edit_admin/". $row->admin_id .">Edit <span class='glyphicon 

glyphicon-pencil'></span></a>

 <a class='btn btn-danger btn-xs' href=".base_url()."index.php/manajemen_admin/delete_admin/". $row->admin_id ." onClick=\"return confirm

('Anda yakin ingin menghapus konten ini ?')\"> Hapus <span class='glyphicon glyphicon-trash'></span></a>
                                        </td>
                                </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
        </div>
	</div>	