<!doctype html>
<?php

	$profil_web = $this->db->get('profil_web')->row();

?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="author" content="<?php echo $profil_web->nama; ?>">
    <meta name="description" content="<?php echo $deskripsi!=''?$deskripsi:$profil_web->deskripsi; ?>">
    <meta name="keywords" content="<?php echo $profil_web->keyword; ?>">
		<meta name="og:image" content="<?php echo $image!=''?base_url($image):base_url($profil_web->logo); ?>"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="twitter:card" content="summary" />
		<meta name="twitter:site" content="@DiskominfotikSumbawa" />
		<meta name="twitter:title" content="<?php echo $title; ?>" />
		<meta name="twitter:description" content="<?php echo $deskripsi!=''?$deskripsi:$profil_web->deskripsi; ?>" />
		<meta name="twitter:image" content="<?php echo $image!=''?base_url($image):base_url($profil_web->logo); ?>" />
    <link rel="shortcut icon" href="<?php echo base_url('assets/image/logo/logo-sumbawa.png'); ?>" />
		<title><?php echo $title; ?> | <?php echo $profil_web->nama; ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style3.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/fancybox-master/dist/jquery.fancybox.min.css">
		<link href="<?php echo base_url(); ?>assets/sweet_alert/dist/sweetalert.css" type="text/css" rel="stylesheet" media="all">
		<link href="<?php echo base_url(); ?>assets/alertifyjs/css/alertify.min.css" rel="stylesheet" >
		<link href="<?php echo base_url(); ?>assets/alertifyjs/css/themes/default.min.css" rel="stylesheet" >
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/imageslidermaker/ism/css/my-slider.css"/>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/woocommerce/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/woocommerce/flexslider-rtl.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/owlcarousel/css/owl.theme.default.min.css">

		<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.3.1.slim.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
		<!-- <script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script> -->
		<script src="<?php echo base_url(); ?>assets/sweet_alert/dist/sweetalert.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/fancybox-master/dist/jquery.fancybox.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/alertifyjs/alertify.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/woocommerce/demo/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>assets/imageslidermaker/ism/js/ism-2.2.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/multi-slide-carousel/js/multislider.js"></script>
		<script src="<?php echo base_url(); ?>assets/owlcarousel/owl.carousel.js"></script>
		<script src="<?php echo base_url(); ?>assets/highcharts/highcharts.js"></script>
		<script src="<?php echo base_url(); ?>assets/highcharts/modules/series-label.js"></script>
		<script src="<?php echo base_url(); ?>assets/highcharts/modules/exporting.js"></script>
		<style media="screen">
		.navbar-toggler:not(:disabled):not(.disabled) {
				cursor: pointer;
				margin-right: 10px;
			}
		</style>
		<script>
			(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = 'https://connect.facebook.net/id_ID/sdk.js#xfbml=1&version=v3.1';
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));
		</script>
		<style>

		@media (max-width: 900px) {
		  .hidden-search {
		    display: none;
		  }
		}

		</style>
  </head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-primary bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="<?php echo site_url(); ?>" style="color: #000"><img src="<?php echo $profil_web->logo; ?>" style="width: 265px"></a>
            <div class="form-inline my-2 my-lg-2">
                <ul class="navbar-nav mr-auto hidden-search">
                    <li class="nav-item">
											<form  method="post" action="<?php echo site_url('search'); ?>">
                      <div class="searchbar">
                        <input class="search_input" type="text" name="cari" placeholder="Search...">
                        <button name="submit" type="submit" href="#" class="search_icon"><i class="fa fa-search"></i></button>
                      </div>
											</form>
                    </li>
			          </ul>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-light navbar-expand-md bg-light justify-content-center" style="margin-top: 76px;">
      <div class="container">
        <button class="navbar-toggler ml-1" type="button" data-toggle="collapse" data-target="#collapsingNavbar2">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse justify-content-between align-items-center w-100" id="collapsingNavbar2">
            <ul class="navbar-nav mx-auto text-center">
							<li class="nav-item <?php echo $subtitle=="home"?"active":""; ?>">
									<a class="nav-link" href="<?php echo site_url(); ?>">BERANDA <span class="sr-only">(current)</span></a>
							</li>
							<li class="nav-item dropdown <?php echo $subtitle=="profil"?"active":""; ?>">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> PROFIL DESA </a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<?php
										$cek = $this->db->order_by('id', 'ASC')->get('profil')->result();
										foreach($cek as $row):
											$replace = "/[^a-zA-Z0-9]/";
											$judul = preg_replace($replace, '-', strtolower($row->judul));
									?>
									<a class="dropdown-item submenu1" href="<?php echo site_url('profil/index/'.$row->id.'/'.$judul.'.html'); ?>"><?php echo $row->judul; ?></a>
									<?php endforeach; ?>
									<a class="dropdown-item submenu1" href="<?php echo site_url('profil/pegawai/struktur'); ?>">Struktur Organisasi</a>
									<a class="dropdown-item submenu1" href="<?php echo site_url('profil/pegawai/data'); ?>">Data Pegawai</a>
								</div>
							</li>
							<li class="nav-item dropdown <?php echo $subtitle=="informasi"?"active":""; ?>">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> LEMBAGA </a>
								<ul class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdownMenuLink">
									<?php
										$cek = $this->db->order_by('id', 'ASC')->get('info')->result();
										foreach($cek as $row):
									?>
									<li class="dropdown-submenu"><a class="dropdown-item" href="<?php echo site_url('informasi/id/'.$row->id.'/'.$judul.'.html'); ?>"><?php echo $row->judul; ?></a></li>
									<?php endforeach; ?>
								</ul>
							</li>
							<li class="nav-item <?php echo $subtitle=="berita"?"active":""; ?>">
									<a class="nav-link" href="<?php echo site_url('berita'); ?>">BERITA/ARTIKEL</a>
							</li>
							<li class="nav-item dropdown <?php echo $subtitle=="galeri"?"active":""; ?>">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									DOKUMENTASI
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									<a class="dropdown-item submenu1" href="<?php echo site_url('galeri_foto/'); ?>">Foto</a>
									<a class="dropdown-item submenu1" href="<?php echo site_url('galeri_video/'); ?>">Video</a>
								</div>
							</li>
							<li class="nav-item <?php echo $subtitle=="kontak"?"active":""; ?>">
								<a class="nav-link" href="<?php echo site_url('kontak'); ?>">KONTAK</a>
							</li>
            </ul>
        </div>
      </div>
    </nav>

		<?php echo $content; ?>

    <div style="clear: both"></div>
  	<footer class="navbar-primary" style="padding: 35px 0; font-size: 13px;background:#ddd;color:#000">
  		<div class="container">
  			<div class="footer-atas">
  				<div sclass="col-md-10 offset-md-1">
  					<div class="row">
  						<div class="col-md-5">
								<div class="title-footer">
									<img src="<?php echo $profil_web->logo; ?>" style="width: 100%; margin-top: -12px">
								</div>
								<ul class="menu-footer">
										<?php echo $profil_web->deskripsi; ?><br><br>
									<li>
										<i class="fa fa-map-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $profil_web->alamat; ?>
									</li>
									<li>
										<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <?php echo $profil_web->telp; ?>
									</li>
									<li>
										<i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;<?php echo $profil_web->email; ?>
									</li>
									<li>
										<i class="fa fa-globe" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp; <?php echo $profil_web->url; ?>
									</li>
								</ul>
  						</div>

  						<div class="col-md-4">
  							<div class="title-footer">
  								SOSIAL MEDIA
  							</div>
  							<ul class="menu-footer">
                    <div>
                      <a href="<?php echo $profil_web->facebook; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/image/fb.png"></a>&nbsp;&nbsp;
            					<a href="<?php echo $profil_web->twitter; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/image/tw.png"></a>&nbsp;&nbsp;
            					<a href="<?php echo $profil_web->instagram; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/image/ig.png"></a>&nbsp;&nbsp;
            					<a href="<?php echo $profil_web->youtube; ?>" target="_blank"><img src="<?php echo base_url(); ?>assets/image/yt.png"></a>&nbsp;&nbsp;
            				</div>
  							</ul>
  						</div>
              <div class="col-md-3">
  							<div class="title-footer">
  								MENU
  							</div>
                <ul class="menu-footer">
  								<li><a href="<?php echo site_url(); ?>">Beranda</a></li>
  								<li><a href="<?php echo site_url('profil/index/10/sejarah.html'); ?>">Profil</a></li>
  								<li><a href="<?php echo site_url('informasi/id/3/rencana-kerja-2019.html'); ?>">Informasi</a></li>
  								<li><a href="<?php echo site_url('berita'); ?>">Berita</a></li>
  								<li><a href="<?php echo site_url('geleri_foto'); ?>">Dokumentasi</a></li>
  								<li><a href="<?php echo site_url('kontak'); ?>">Kontak</a></li>
  							</ul>
  						</div>

  					</div>
  				</div>
  			</div>
  		</div>
  	</footer>
  	<div style="background: #999">
  		<div class="container">
        <div class="col-md-5">
          <p class="text-footer">
            Copyright © <?php echo date('Y'); ?> <?php echo $profil_web->nama; ?>
            Supported by Shomad Technology
          </p>
        </div>
  		</div>
  	</div>

  </body>
</html>
