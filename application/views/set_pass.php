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
    <legend align="left"><strong>Pengaturan Password</strong></legend>
<div class="cleaner_h10"></div>
<?php
	foreach($det_member->result_array() as $dm)
	{
?>
<form class="form-inline" role="form" method="post" action="<?php echo site_url(); ?>/home/set_pass">
<table width="100%">
<tr><td width="150">Username</td><td>:</td><td><div class="form-group"><input class=form-control name="username" readonly="readonly" type="text" class="input-teks" size="50" value="<?php echo $dm['user_username']; ?>" /></div></td></tr>
<tr><td width="150">Password Lama</td><td valign="top">:</td><td><div class="form-group"><input class=form-control name="passlama" type="password" class="input-teks" size="50" /></div></td></tr>
<tr><td width="150">Password Baru</td><td valign="top">:</td><td><div class="form-group"><input class=form-control name="passbaru" type="password" class="input-teks" size="50" /></div></td></tr>
<tr><td width="150">Ulangi Password Baru</td><td valign="top">:</td><td><div class="form-group"><input class=form-control name="ulangi" type="password" class="input-teks" size="50" /></div></td></tr>
<tr><td width="150"></td><td></td><td><br><input class="btn btn-primary" type="submit" class="input-tombol" onclick="MM_validateForm('username','','R','captcha','','R','passlama','','R','passbaru','','R','ulangi','','R');return document.MM_returnValue" value="Ubah Password" />
</table>
</form>
<?php
}
?>
</fieldset>
<br>
