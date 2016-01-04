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
  } if (errors) { alert('Oooopppzzz,,,,ada sedikit kesalahan pada :\n'+errors);
  document.MM_returnValue = (errors == ''); }
  else { document.MM_returnValue = (errors == ''); }
}
</script>
<h3>Daftar Anggota - Gadget Baru</h3>
<div class="cleaner_h10"></div>
<form method="post" class="form-inline" role="form" action="<?php echo base_url(); ?>index.php/home/kirimregister">
<table>

    <tr><td>Username</td><td width="20">:</td><td><div class="form-group"><input class="form-control" name="username" type="text" class="input-teks" size="50" /></div></td></tr>
    
    <tr><td>Password</td><td>:</td><td><div class="form-group"><input class="form-control" name="password" type="text" class="input-teks" size="50" /></td></tr>
    
    <tr><td>Nama Lengkap</td><td>:</td><td><div class="form-group"><input class="form-control" name="nama" type="text" class="input-teks" size="50" /></div></td></tr>
    
    <tr><td>Email</td><td valign="top">:</td><td><div class="form-group"><input class="form-control" name="email" type="text" class="input-teks" size="50" /></td></tr>
    
    <tr><td valign="top">Alamat</td><td valign="top">:</td><td><div class="form-group"><textarea class="form-control" name="alamat" class="input-teks" cols="53" rows="6"></textarea></div></td></tr>
    
    <tr><td>No. Telepon</td><td valign="top">:</td><td><div class="form-group"><input class="form-control" name="telepon" type="text" class="input-teks" size="50" /></div></td></tr>
    
    <tr><td>Propinsi</td><td valign="top">:</td><td><div class="form-group"><input class="form-control" name="propinsi" type="text" class="input-teks" size="50" /></div></td></tr>
    
    <tr><td>Kode Pos</td><td valign="top">:</td><td><div class="form-group"><input class="form-control"  name="kodepos" type="text" class="input-teks" size="50" /></div></td></tr>
    
    <tr><td>Kota</td><td valign="top">:</td><td><div class="form-group"><input class="form-control" name="kota" type="text" class="input-teks" size="50" /></div></td></tr>
    
    <tr><td>Tanggal Lahir</td><td valign="top">:</td><td>
    <?php
            echo "<div class=form-group><select class=form-control name='tgl'>";
            echo "<option selected disabled>Tanggal</option>";
                for($a=1;$a<=31;$a++)
              {
                    echo "<option value=$a>$a</option>";
              }
              echo "</select></div> ";
              
              echo "<div class=form-group><select class=form-control name='bln'>";
              echo "<option selected disabled>Bulan</option>";
              for($b=1;$b<=12;$b++)
              {
                    echo "<option value=$b>$b</option>";
              }
              echo "</select></div> ";
              
              echo "<div class=form-group><select class=form-control name='thn'>";
              echo "<option selected disabled>Tahun</option>";
              for($c=1950;$c<=date('Y')+1;$c++)
              {
                    echo "<option value=$c>$c</option>";
              }
              echo "</select></div>";
    ?>
    </td></tr>
    <tr><td></td><td></td><td><br><input type="submit" class="btn btn-primary btn-sm" onclick="MM_validateForm('username','','R','password','','R','nama','','R','email','','RisEmail','telpon','','RisNum','propinsi','','R','kodepos','','RisNum','kota','','R','captcha','','R','alamat','','R');return document.MM_returnValue" value="Daftar" /> </td></tr>
</table>
</form>

<br>