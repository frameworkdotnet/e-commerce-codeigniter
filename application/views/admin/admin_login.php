<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

    <title><?php echo $title;?></title>

    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body class="bg-adminlogin">
	<?php
    $data = array(
                'class' => 'form-signin-admin',
                'method' => 'post',
                'role' => 'form'
    );
                
    echo form_open('adminlogin/login', $data);		
    ?>
            <h2 align="center" class="form-signin-heading"><span class='glyphicon glyphicon-user'></span> Login Admin</h2>
            <input type="input" name="username" class="form-control" placeholder="Username" required autofocus>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button><br>
            <p align="right"><a style="text-decoration:none" href="<?php echo base_url();?>">Kembali <span class='glyphicon glyphicon-chevron-right'></span></a></p>
    <?php
    echo form_close();
    // hanya untuk menampilkan informasi saja
    if(isset($login_info))
    {
        echo "<script>alert('";
        echo $login_info;
        echo "');</script>";
    }
    ?>
  </body>
</html>
