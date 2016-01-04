	<h3 class="text-center">
        Data Pengguna
    </h3>
    <?php echo '<a class="btn btn-primary btn-xs" href="'.base_url().'index.php/manajemen_user/insert_user/">Tambah User <span class="glyphicon glyphicon-plus"></span></a><p>';?>
    <p>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-condensed">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach($all_user->result() as $row)
                        {
                            echo "<tr>
                                        <td>".$no."</td>
                                        <td>".$row->user_nama."</td>
                                        <td>".$row->user_username."</td>
                                        <td align=center>
											<a class='btn btn-info btn-xs' href=".base_url()."index.php/manajemen_user/edit_user/". $row->user_id .">Edit <span class='glyphicon 

glyphicon-pencil'></span></a>

 <a class='btn btn-danger btn-xs' href=".base_url()."index.php/manajemen_user/delete_user/". $row->user_id ." onClick=\"return confirm

('Anda yakin ingin menghapus konten ini ?')\"> Hapus <span class='glyphicon glyphicon-trash'></span></a>
                                        </td>
                                </tr>";
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>