<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title><?php echo $title;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/img/fv.png" />

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/css/awesome.css" rel="stylesheet">

	<script src="<?php echo base_url();?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url();?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>

	<script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url();?>assets/img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url();?>assets/img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url();?>assets/img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url();?>assets/img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/js/scripts.js"></script>
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">

			</div>
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo base_url()."index.php/adminlogin"?>">
                     <img src="<?php echo base_url();?>/assets/img/gadget_baru_logo.png"></a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
                        	<a href="<?php echo site_url();?>/adminlogin"><span class='glyphicon glyphicon-home'></span> Home</a>
						</li>
						<li>
							<?php echo anchor('kategori', 'Kategori');?>
						</li>
                        <li>
							<?php echo anchor('produk', 'Produk');?>
						</li>
                        <li>
							<?php echo anchor('pesanan', 'Pesanan');?>
						</li>
						<li>
							<?php echo anchor('pembayaran', 'Pembayaran');?>
						</li>
					</ul>
                    <?php
			  		if($this->adminauth->is_logged_in() == true):
						$username = $this->session->userdata('admin_username');
					?>
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-star'></span> <?php echo $this->session->userdata('admin_username');?><strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
                                	<a href="<?php echo site_url();?>/manajemen_admin"><span class='glyphicon glyphicon-star'></span> Data Admin</a>
								</li>
								<li>
                                	<a href="<?php echo site_url();?>/manajemen_user"><span class='glyphicon glyphicon-user'></span> Data Pengguna</a>
								</li>
								<li class="divider">
								</li>
								<li>
                                	<a href="<?php echo base_url()."index.php/adminlogin/logout";?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
								</li>
							</ul>
						</li>
					</ul>
					<?php endif;?>
              </div>
            </nav>
            <?php echo $contents;?>
		</div>
	</div>
    <hr class="featurette-divider">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<h5 class="text-center">
				<strong>Gadget Baru | Pemrograman Web 2<br><br>
                Manajemen Informatika | Politeknik Negeri Jember</strong>
                <hr>
                <small>Beranda | Tentang Kami | Cara Belanja | Konfirmasi Pembayaran | Hubungi Kami | Site Map Produk | Keranjang Belanja</small>
			</h5>
		</div>
	</div>
</div>
</body>
</html>
