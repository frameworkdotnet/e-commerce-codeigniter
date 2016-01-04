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
    <link href="<?php echo base_url();?>assets/css/mediaqueries.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/carousel.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>assets/css/datepicker.css" rel="stylesheet">
    
	<script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins/dataTables/dataTables.bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
	
    <!-- css3-mediaqueries.js for IE8 or older -->
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->
    <script src="<?php echo base_url(); ?>assets/js/carousel.js"></script>
    
    <script type="text/javascript">
		$(function(){
			$("#tanggal").datepicker({
				format:'yyyy-mm-dd'
			});
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
</head>

<body>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo base_url();?>"><img src="<?php echo base_url();?>/assets/img/gadget_baru_logo.png"></a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li class="active">
                            <a href="<?php echo base_url();?>"><span class='glyphicon glyphicon-home'></span> Home</a>
						</li>
						<li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Brand<strong class="caret"></strong></a>
                            <ul class="dropdown-menu">
                            	<li>
									<?php 
                                    if(count($d_kategori->result())>0){
                                        foreach($d_kategori->result() as $kt){?>
                                            <a href="#" value><?php echo $kt->nama_kategori;?></a>
                                        <?php 
                                        }
                                    }
                                    else
                                    {?>
                                    	<a href="#">Belum Ada Kategori</a>
                                    <?php
                                    }?>
                                 </li>
                            </ul>
                        </li>  
						<li>
							<?php echo anchor('web/kontak', 'Kontak');?>
						</li>
                        <li>
							<?php echo anchor('cara_belanja', 'Cara Belanja');?>
						</li>
					</ul>
					<form class="navbar-form navbar-left" method="post" action="<?php echo base_url(); ?>index.php/cari/lihat" role="search">
						<div class="form-group">
							<input type="text" name="cari" class="form-control" placeholder="Pencarian . . ." x-webkit-speech>
						</div> <button type="submit" class="btn btn-primary">Cari <span class='glyphicon glyphicon-search'></span></button>
					</form>
					<ul class="nav navbar-nav navbar-right">
						<li class="visible-xs">
                        	<a href="<?php echo site_url();?>/keranjang"><span class='glyphicon glyphicon-shopping-cart'></span> Cart</a>
						</li>
						
							 <?php
                             if($this->auth->is_logged_in() == false)
							   {
							   ?>
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"><span class='glyphicon glyphicon-log-in'></span> Login <strong class="caret"></strong></a>
                                        <div class="dropdown-menu" style="padding: 15px;">
                                            <h4 style="color:#999999"><span class='glyphicon glyphicon-user'></span> Login Anggota</h4>
                                            <hr>
                                            <form action="<?php echo site_url();?>/home/login" class = "form-signin" method = "post" role = "form">
                                                <input type="input" name="username" class="form-control" placeholder="Username" required autofocus>
                                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                                            	<button class="btn btn-primary btn-block" type="submit">Login</button>
                                            </form><br>
                                            <small style="color:#999999" class="form-signin-heading">Pelanggan Baru ? <?php echo anchor('home/daftar', 'Daftar Disini');?></small>
                                        </div>
                                    </li>
									<?php
							   }
							   else
							   {
							   ?>    
                               		<li class="dropdown">
                                         <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class='glyphicon glyphicon-user'></span> <?php echo $this->session->userdata('username');?> <strong class="caret"></strong></a>
                                        <ul class="dropdown-menu">
                                            <li>
                                            	<a href="<?php echo site_url();?>/home/set_profil"><span class='glyphicon glyphicon-user'></span> Ubah Data Profil</a>
                                            </li>
                                            <li>
                                            	<a href="<?php echo site_url();?>/home/set_pass"><span class='glyphicon glyphicon-asterisk'></span> Ubah Password</a>
                                            </li>
                                            <li>
                                            	<a href="<?php echo site_url();?>/home/history"><span class='glyphicon glyphicon-list-alt'></span> History Transaksi</a>
                                            </li>
                                            <li>
                                            	<a href="<?php echo site_url();?>/konfirmasi"><span class='glyphicon glyphicon-earphone'></span> Konfirmasi Pembayaran</a>
                                            </li>
                                            <li class="divider">
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url()."index.php/home/logout";?>"><span class="glyphicon glyphicon-log-out"></span> Log Out</a>
                                            </li>
                                        </ul>
                                    </li>  
                                    
								<?php   
							   } 
							   ?>
					</ul>
				</div>
				
			</nav>
			<div class="page-header">
            	<div class="logo-header">
            		<a href="<?php echo base_url();?>"><img class="hidden-xs" src="<?php echo base_url();?>assets/img/logo_web.png"></a>
                    <a href="<?php echo base_url();?>"><img class="visible-xs" src="<?php echo base_url();?>assets/img/logo-web-mini.png"></a>
                </div>
            </div>
		</div>
	</div>
    <div class="row clearfix">
		<div class="col-md-4 column">
        	<ul class="nav nav-pills nav-stacked" style="border-right:1px solid #ccc;padding-right:2px;">
            	<?php 
				if(count($d_kategori->result())>0){
					foreach($d_kategori->result() as $kt){?>
                        <li>
                            <a href="<?php echo site_url()."/produk/kategori/".$kt->id_kategori.""?>"><strong><?php echo $kt->nama_kategori;?></strong></a>
                        </li>
                 <?php 
					}
				}
				else
				{?>
					<li>
						<a href="#">Belum Ada Kategori</a>
					</li>   
				<?php
				}?>
			</ul>
		</div>
		<div class="col-md-8 column">
        
            <div id='carousel-container' class="hidden-xs"> <!-- sebagai penampung / induk elemen -->
                <div id='nav-carousel-left'><a href='javascript:slide("left");'>&#171;</a></div> <!--navigasi kiri-->
                    <div id='carousel'>
                        <ul>
                        	 <?php
							foreach($slide_atas->result_array() as $sa)
							{
							
										$c = array (' ');
										$d = array ('-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');
										$s = strtolower(str_replace($d,"",$sa['nama_produk']));
										$link = strtolower(str_replace($c, '-', $s));
								echo '
								<li>
									<a href="'.site_url().'/produk/detail/'.strtolower($sa['id_produk']).'-'.$link.'" class="vtip" title="'.$sa['nama_produk'].' - Harga Rp.'.number_format($sa['harga'],2,',','.').'">
										<div class="carousel-thumb">
											<img src="'.base_url().'assets/produk/'.$sa['gbr_kecil'].'" alt="'.$sa['nama_produk'].'">
											<p >'.$sa['nama_produk'].'
										</div>
									</a>
								</li> ';
							}
							?>
                        <!-- tambahkan lagi item baru disini di antara tag <li> </li> -->
                         
                        </ul>
                    </div><!--#carousel-->
                 
                  <div id='nav-carousel-right'>
                <a href='javascript:slide("right");'>&#187;</a></div><!--navigasi kanan-->
                <input type='hidden' id='hidden_auto_slide_seconds' value=0 />
                 
            </div><!--#carousel-container-->
           
		</div>
	</div>
    <hr class="hidden-xs" width="68%" align="left">
    <br class="visible-xs">
    <fieldset class="bingkai visible-xs">
    		<legend align="center" class="jd-bingkai" style="font-size:20px"><strong>Belanja Berdasarkan Harga</strong></legend>
            <select class="form-control" id="cari-harga" onChange="window.location.href=this.value">
           		<option selected disabled > -- Harga --</option>
                <option value="<?php echo site_url(); ?>/produk/belanja/-2000000">Kurang dari &le; Rp 2.000.000</option>
                <option value="<?php echo site_url(); ?>/produk/belanja/2000000-4000000" >Rp 2.000.000 - Rp 4.000.000</option>
                <option value="<?php echo site_url(); ?>/produk/belanja/4000000-6000000" >Rp 4.000.000 - Rp 6.000.000</option>
                <option value="<?php echo site_url(); ?>/produk/belanja/6000000-8000000" >Rp 6.000.000 - Rp 8.000.000</option>
                <option value="<?php echo site_url(); ?>/produk/belanja/8000000-10000000">Rp 8.000.000 - Rp 10.000.000</option>
                <option value="<?php echo site_url(); ?>/produk/belanja/10000000-">Lebih dari &ge; Rp 10.000.000</option>
            </select>
    </fieldset>
	<div class="row clearfix">
		<div class="col-md-8 column">
        	<h3 class="text-center">
        		<?php echo $contents;?>
            </h3>
		</div>
		<div class="col-md-4 column">
        
		<fieldset class="bingkai hidden-xs">
    		<legend align="center" class="jd-bingkai"><strong>Keranjang Belanja Anda</strong></legend>
				<img src="<?php echo base_url(); ?>assets/img/beli.png" class="img-right" />
				<strong><?php echo $this->cart->total_items(); ?> item produk</strong>
				<div style="border-bottom:1px solid #264A5F; width:80%"></div>
				Total: <strong>Rp. <?php echo number_format($this->cart->total(),2,',','.'); ?></strong>
				<?php
				if($this->cart->total_items()>0)
				{
				?>
				<a class='btn btn-success btn-xs' href="<?php echo site_url(); ?>/keranjang"><div class="lihat-keranjang-kiri">Lihat Keranjang <span class='glyphicon glyphicon-shopping-cart'></span></div></a>
				<a class='btn btn-primary btn-xs' href="<?php echo site_url(); ?>/checkout"><div class="selesai-belanja-kanan">Selesai Belanja <span class='glyphicon glyphicon-check'></span></div></a>
				<?php
				} else { }
				?>
		</fieldset>
        <br>
		<fieldset class="bingkai hidden-xs">
    		<legend align="center" class="jd-bingkai" style="font-size:20px"><strong>Belanja Berdasarkan Harga</strong></legend>
            <ul class="bds-hr" style="list-style:square">
                <li><a href="<?php echo site_url(); ?>/produk/belanja/-2000000">Kurang dari <strong>&le; Rp 2.000.000</strong></a></li>
                <li><a href="<?php echo site_url(); ?>/produk/belanja/2000000-4000000"><strong>Rp 2.000.000 - Rp 4.000.000</strong></a></li>
                <li><a href="<?php echo site_url(); ?>/produk/belanja/4000000-6000000"><strong>Rp 4.000.000 - Rp 6.000.000</strong></a></li>
                <li><a href="<?php echo site_url(); ?>/produk/belanja/6000000-8000000"><strong>Rp 6.000.000 - Rp 8.000.000</strong></a></li>
                <li><a href="<?php echo site_url(); ?>/produk/belanja/8000000-10000000"><strong>Rp 8.000.000 - Rp 10.000.000</strong></a></li>
                <li><a href="<?php echo site_url(); ?>/produk/belanja/10000000-">Lebih dari <strong>&ge; Rp 10.000.000</strong></a></li>
            </ul>
        </fieldset>
		<br>
        <fieldset class="bingkai">
    		<legend align="center" class="jd-bingkai"><strong>Jasa Pengiriman Barang</strong></legend>
                
                <p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.tiki-online.com/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/tiki.png" border="0" /></a></p>
                <p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.esl-express.com/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/sl.png" border="0" /></a></p>
                <p align="center" style="margin:0px auto; padding:3px;"><a href="http://www.jne.co.id/" target="_blank"><img src="<?php echo base_url(); ?>assets/img/jne.png" border="0" /></a></p>
                
         </fieldset><br><br>
		 </div>
	</div>
	<div class="row clearfix">
		<div class="col-md-12 column footer">
			<h5>
            	<hr>
                <div style="height:130px;margin:40px 0xp 40px 0px;">
                	<div style="width:auto;float:left;padding-right:200px">
                    	<fieldset class="bingkai hidden-xs" style="width:auto">
    						<legend class="jd-bingkai" style="text-align:center"><strong>Metode Pembayaran</strong></legend>
                                <div id="sub-rekening"><img src="<?php echo base_url(); ?>assets/img/bank-syariah.png" /></div>
                                <div id="sub-rekening"><img src="<?php echo base_url(); ?>assets/img/bank-bri.png" /></div>
                                <div id="sub-rekening"><img src="<?php echo base_url(); ?>assets/img/bank-bca.png" /></div>
                                <div id="sub-rekening"><img src="<?php echo base_url(); ?>assets/img/bank-mandiri.png" /></div>
                         </fieldset>
                    </div>
                    <div class="text-center" style="width:auto;float:left;padding-top:40px">
                        <strong>Gadget Baru | Pemrograman Web 2<br><br>
                        Manajemen Informatika | Politeknik Negeri Jember</strong>
                    </div>
                    
                </div>
                <hr>
                <small>Beranda | Tentang Kami | Cara Belanja | Konfirmasi Pembayaran | Hubungi Kami | Site Map Produk | Keranjang Belanja</small>
			</h5>
		</div>
	</div>
</div>
</body>
</html>
