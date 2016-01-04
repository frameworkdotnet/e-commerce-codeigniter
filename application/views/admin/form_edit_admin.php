<div id="main-content">
	<div class="title">Form Edit Admin</div>
    <?php
    $row = $admin->row();
	echo form_open('manajemen_admin/edit_admin/'.$row->admin_id);
	?>
    <table width="100%">
    	<tr>
        	<td>Nama</td>
            <td>:</td>
            <td>
            	<?php echo form_input('nama', $row->nama);?>
                <?php echo form_error('nama');?>
            </td>
        </tr>
		<tr>
        	<td>Username</td>
            <td>:</td>
            <td>
            	<?php echo form_input('username', $row->username);?>
                <?php echo form_error('username');?>
            </td>
        </tr>
        <tr>
        	<td>Password</td>
            <td>:</td>
            <td>
            	<?php echo form_password('password');?>
                <?php echo form_error('password');?>
            </td>
        </tr>
        <tr>
        	<td>Konfirmasi Password</td>
            <td>:</td>
            <td>
            	<?php echo form_password('password_conf');?>
                <?php echo form_error('password_conf');?>
            </td>
        </tr>
        <tr>
        	<td></td>
            <td></td>
            <td><?php echo form_submit('submit', 'Update');?></td>
        </tr>
    </table>
    <?php echo form_close();?>
</div>