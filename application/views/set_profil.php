<script type="text/JavaScript">
function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_validateForm() { //v4.0
  var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
  for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=MM_findObj(args[i]);
    if (val) { nm=val.name; if ((val=val.value)!="") {
      if (test.indexOf('isEmail')!=-1) { p=val.indexOf('@');
        if (p<1 || p==(val.length-1)) errors+='- format penulisan '+nm+' salah...!\n';
      } else if (test!='R') { num = parseFloat(val);
        if (isNaN(val)) errors+='- '+nm+' harus angka.\n';
        if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
          min=test.substring(8,p); max=test.substring(p+1);
          if (num<min || max<num) errors+='- '+nm+' harus angka '+min+' and '+max+'.\n';
    } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' masih kosong...!\n'; }
  } if (errors) { alert('Ada kesalahan pada :\n'+errors);
  document.MM_returnValue = (errors == ''); }
  else { document.MM_returnValue = (errors == ''); }
}
</script>
<fieldset style="text-align:left; font-size:15px;border:1px solid #ccc; padding:15px; margin:auto">
    <legend align="left"><strong>Pengaturan Profil</strong></legend>
<?php
	foreach($det_member->result_array() as $dm)
	{
?>
<form class="form-inline" role="form" method="post" action="<?php echo site_url(); ?>/home/update_profil">
<table width="100%">
<tr><td width="100">Nama Lengkap</td><td>:</td><td><div class="form-group"><input class=form-control name="nama" type="text" class="input-teks" size="50" value="<?php echo $dm['user_nama']; ?>" /></div></td></tr>

<tr><td width="100">Email</td><td valign="top">:</td><td><div class="form-group"><input class=form-control name="email" type="text" class="input-teks" size="50" value="<?php echo $dm['email']; ?>" /></div></td></tr>

<tr><td width="100" valign="top">Alamat</td><td valign="top">:</td><td><div class="form-group"><textarea class=form-control name="alamat" class="input-teks" cols="53" rows="6"><?php echo $dm['alamat']; ?></textarea></div></td></tr>

<tr><td width="100">No. Telepon</td><td valign="top">:</td><td><div class="form-group"><input class=form-control name="telepon" type="text" class="input-teks" size="50" value="<?php echo $dm['telepon']; ?>" /></div></td></tr>

<tr><td width="100">Propinsi</td><td valign="top">:</td><td><div class="form-group"><input class=form-control name="propinsi" type="text" class="input-teks" size="50" value="<?php echo $dm['propinsi']; ?>" /></div></td></tr>

<tr><td width="100">Kota</td><td valign="top">:</td><td><div class="form-group"><input class=form-control name="kota" type="text" class="input-teks" size="50" value="<?php echo $dm['kota']; ?>" /></div></td></tr>

<tr><td width="100">Kode Pos</td><td valign="top">:</td><td><div class="form-group"><input class=form-control name="kodepos" type="text" class="input-teks" size="50" value="<?php echo $dm['kode_pos']; ?>" /></div></td></tr>
<tr><td width="100">Tanggal Lahir</td><td valign="top">:</td><td>
<?php
$lahir = explode("-",$dm['tgl_lahir']);
		echo "<div class=form-group><select class=form-control name='tgl'>";
		  for($a=1;$a<=31;$a++)
		  {
		  	if($lahir[0]==$a)
			{
		  		echo "<option value=$a selected>$a</option>";
			}
			else
			{
		  		echo "<option value=$a>$a</option>";
			}
		  }
		  echo "</select></div> ";
		  
		  echo "<div class=form-group><select class=form-control name='bln'>";
		  for($b=1;$b<=12;$b++)
		  {
		  	if($lahir[1]==$b)
			{
		  		echo "<option value=$b selected>$b</option>";
			}
			else
			{
		  		echo "<option value=$b>$b</option>";
			}
		  }
		  echo "</select></div> ";
		  
		  echo "<div class=form-group><select class=form-control name='thn'>";
		  for($c=1950;$c<=date('Y');$c++)
		  {
		  	if($lahir[2]==$c)
			{
		  		echo "<option value=$c selected>$c</option>";
			}
			else
			{
		  		echo "<option value=$c>$c</option>";
			}
		  }
		  echo "</select></div>";
?>
</td></tr>
<tr><td width="100"></td><td></td><td><br><input type="submit" class="btn btn-primary" onclick="MM_validateForm('nama','','R','email','','RisEmail','alamat','','R','telpon','','RisNum','propinsi','','R','kota','','R','captcha','','R');return document.MM_returnValue" value="Ubah Data" /></td></tr>
</table>
</fiedset>
</form>
<?php
}
?>

<br>