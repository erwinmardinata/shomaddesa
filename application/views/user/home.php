<style>
.carousel-item {
  height: 60vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
<header>
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <?php foreach($slider as $no => $row): ?>

      <div class="carousel-item <?php echo $no==0?"active":""; ?>" style="background-image: url('<?php echo $row->foto; ?>')" data-interval="5000">
      </div>
      <?php
          endforeach;
      ?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
  </div>
</header>

<div style="padding: 5px;background: #5a5a5a;">
	<div class="container">
		<div style="background: #1d2124;color: #FFF;font-size: 14px;padding-top: 8px;padding-left: 17px;padding-right: 17px;padding-bottom: 5px;">
			<marquee onmouseover="this.stop()" onmouseout="this.start()">
				<?php
					foreach($pengumuman as $row):

					if($row->file == NULL || $row->file == '') {
						$file = $row->link_file;
					} else if($row->link_file == NULL || $row->link_file == '') {
						$file = $row->file;
					}

				 	echo $row->nama;
          if($row->file != NULL || $row->link_file != NULL) {

        ?>
				<a href="<?php echo $file; ?>" target="_blank" style="color: #FFF; font-family: Roboto-Bold">
					 [ KLIK DISINI ]
				</a>
				&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp;
				<?php
          } else {
            echo "&nbsp;&nbsp;&nbsp;-&nbsp;&nbsp;&nbsp";
          }
          endforeach;
        ?>
			</marquee>
		</div>
	</div>
</div>

<div style="background: #ddd; padding: 35px 0">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div style="margin-bottom: 12px">
          <h5 class="header-home-title">KEPALA</h5>
          <img src="<?php echo $sambutan->foto; ?>" class="img-fluid" style="width:100%;max-height:250px">
          <div class="nama-kepala">
              <?php echo $sambutan->nama; ?>
          </div>
        </div>
        <div style="margin-bottom: 12px">
          <h5 class="header-home-title">AGENDA KEGIATAN</h5>
          <?php
            if(!$agenda) {
          ?>
          <li class="list-group-item">
    				<div class="panel-lowongan" style="text-align:center">
              Agenda Masih Kosong
            </div>
          </li>
          <?php
            } else {
            foreach($agenda as $row):
            $replace = "/[^a-zA-Z0-9]/";
            $judul = preg_replace($replace, '-', strtolower($row->agenda));

            $day = date('D', strtotime($row->tanggal));
            $dayList = array(
              'Sun' => 'Minggu',
              'Mon' => 'Senin',
              'Tue' => 'Selasa',
              'Wed' => 'Rabu',
              'Thu' => 'Kamis',
              'Fri' => 'Jumat',
              'Sat' => 'Sabtu'
            );

            $bulan = array(
              '01' => 'Jan',
              '02' => 'Feb',
              '03' => 'Mar',
              '04' => 'Apr',
              '05' => 'Mei',
              '06' => 'Jun',
              '07' => 'Jul',
              '08' => 'Agu',
              '09' => 'Sep',
              '10' => 'Okt',
              '11' => 'Nov',
              '12' => 'Des'
            );

            $tgl = explode("-", $row->tanggal);
            $bln = $tgl[1];

            $tanggal = $dayList[$day].', '.$tgl[2].' '.$bulan[$bln].' '.$tgl[0];

            //echo $tanggal;

          ?>

          <div class="media media-box">
            <div class="mr-3 media-left">
              <div style="font-family: Roboto-Bold;font-size: 31px;line-height: 41px;"><?php echo $tgl[2]; ?></div>
              <small style="font-size: 13px;font-family: Roboto-bold;"><?php echo strtoupper($bulan[$bln]); ?></small>
            </div>
            <div class="media-body">
              <h5 class="mt-0" style="font-family: Roboto-Bold;"><a href="<?php echo site_url('agenda/id/'.$row->id.'/'.$judul.'.html'); ?>" style="color: #000"><?php echo $row->agenda; ?></a></h5>
              <div class="tanggal-pengaduan">
                <i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo $row->tempat; ?>&nbsp;
              </div>
            </div>
          </div>
          <?php endforeach; } ?>
        </div>
      </div>
      <div class="col-md-8">
        <div class="box-berita">
          <h5 class="header-berita-home">BERITA</h5>
          <div class="row">
            <?php
              if(!$berita) {
            ?>
            <div class="col-md-12" style="padding: 0 20px" style="text-align:center">
              - Berita Belum Ada -
            </div>
            <?php

              } else {

              foreach($berita as $no => $row):
                $replace = "/[^a-zA-Z0-9]/";
                $judul = preg_replace($replace, '-', strtolower($row->judul));
                $day = date('D', strtotime($row->date));
  							$dayList = array(
  								'Sun' => 'Minggu',
  								'Mon' => 'Senin',
  								'Tue' => 'Selasa',
  								'Wed' => 'Rabu',
  								'Thu' => 'Kamis',
  								'Fri' => 'Jumat',
  								'Sat' => 'Sabtu'
  							);

  							$bulan = array(
  								'01' => 'Januari',
  								'02' => 'Februari',
  								'03' => 'Maret',
  								'04' => 'April',
  								'05' => 'Mei',
  								'06' => 'Juni',
  								'07' => 'Juli',
  								'08' => 'Agustus',
  								'09' => 'September',
  								'10' => 'Oktober',
  								'11' => 'November',
  								'12' => 'Desember'
  							);

  							$tgl = explode("-", $row->date);
  							$bln = $tgl[1];

  							$tanggal = $dayList[$day].', '.$tgl[2].' '.$bulan[$bln].' '.$tgl[0];

            ?>

            <div class="col-md-6 mb-3">
              <img src="<?php echo $row->thumb; ?>" class="img-fluid" alt="<?php echo $row->judul; ?>" style="width: 100%;height:200px">
              <div class="card-body" style="padding:0">
                <p class="card-text" style="margin: 10px 0px;">
                  <small class="text-muted">
                    <i class="fa fa-clock-o"></i> <?php echo $tanggal; ?> &nbsp;
                    <i class="fa fa-eye"></i> Dibaca : <span class="badge badge-secondary"><?php echo $row->hits; ?></span> Kali
                  </small>
                </p>
                <h5 class="card-title" style="font-family: Roboto-Bold;font-size: 23px;"><a href="<?php echo site_url('berita/id/'.$row->id.'/'.$judul.'.html'); ?>" style="color: #000"><?php echo $row->judul; ?></a></h5>
              </div>
            </div>
            <?php if($no==2) break; endforeach; } ?>
            <div class="col-md-12 mb-3">
              <div class="selengkapnya2"><a href="<?php echo site_url('berita'); ?>" class="selengkapnya3"> >>> SELENGKAPNYA</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div style="background: #999; padding: 35px 0">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <div style="margin-bottom: 12px">
          <h5 class="header-home-title">PENGADUAN TERBARU</h5>
          <?php
            if(!$pengaduan) {
          ?>
          <li class="list-group-item">
    				<div class="panel-lowongan" style="text-align:center;color:#000">
              Pengaduan Masih Kosong
            </div>
          </li>
          <?php
            } else {
            foreach($pengaduan as $row):
            $replace = "/[^a-zA-Z0-9]/";
            $judul = preg_replace($replace, '-', strtolower($row->judul_pengaduan));
            $day = date('D', strtotime($row->tanggal));
            $dayList = array(
              'Sun' => 'Minggu',
              'Mon' => 'Senin',
              'Tue' => 'Selasa',
              'Wed' => 'Rabu',
              'Thu' => 'Kamis',
              'Fri' => 'Jumat',
              'Sat' => 'Sabtu'
            );

            $bulan = array(
              '01' => 'Jan',
              '02' => 'Feb',
              '03' => 'Mar',
              '04' => 'Apr',
              '05' => 'Mei',
              '06' => 'Jun',
              '07' => 'Jul',
              '08' => 'Agu',
              '09' => 'Sep',
              '10' => 'Okt',
              '11' => 'Nov',
              '12' => 'Des'
            );

            $tgl = explode("-", $row->tanggal);
            $bln = $tgl[1];

            $tanggal = $dayList[$day].', '.$tgl[2].' '.$bulan[$bln].' '.$tgl[0];

            $cek = $this->db->where('id_pengaduan', $row->id)->get('balas_pengaduan')->result()

          ?>

          <div class="media media-box">
            <div class="mr-3 media-left">
              <div style="font-family: Roboto-Bold;font-size: 31px;line-height: 41px;"><?php echo $tgl[2]; ?></div>
              <small style="font-size: 13px;font-family: Roboto-bold;"><?php echo strtoupper($bulan[$bln]); ?></small>
            </div>
            <div class="media-body">
              <h5 class="mt-0" style="font-family: Roboto-Bold;"><a href="<?php echo site_url('pengaduan/id/'.$row->id.'/'.$judul.'.html'); ?>" style="color: #000;"><?php echo $row->judul_pengaduan; ?></a></h5>
              <div class="tanggal-pengaduan">
                <i class="fa fa-user" aria-hidden="true"></i> <?php echo $row->nama_pengadu; ?>&nbsp;
                <i class="fa fa-commenting-o" aria-hidden="true"></i> <?php echo COUNT($cek); ?>&nbsp;
              </div>
            </div>
          </div>
          <?php endforeach; } ?>
          <div class="media-box">
            <div class="row">
              <div class="col-md-6">
                <a href="<?php echo site_url('pengaduan'); ?>" class="btn btn-secondary btn-block" style="font-size: 10px;border-radius: 0;">
                  <i class="fa fa-send" aria-hidden="true"></i> Kirim Pengaduan
                </a>
              </div>
              <div class="col-md-6">
                <a href="<?php echo site_url('pengaduan/data'); ?>" class="btn btn-secondary btn-block" style="font-size: 10px;border-radius: 0;">
                  <i class="fa fa-list" aria-hidden="true"></i> Daftar Pengaduan
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div style="margin-bottom: 12px">
          <h5 class="header-home-title">PENGUMUMAN/DOWNLOAD</h5>
          <div class="list-group">
            <?php
              if(!$download) {
            ?>
            <a href="#" class="list-group-item download-file list-group-item-action judul-event" style="font-size: 17px">
              Data Masih Kosong
            </a>
            <?php
              } else {
              foreach($download as $row):
              if($row->file=="Klik disini untuk mengupload file download" || $row->file == NULL || $row->file == '') {
                $file = $row->link_file;
              } else if($row->link_file == NULL || $row->link_file == '') {
                $file = $row->file;
              }
            ?>
            <a href="<?php echo $file; ?>" target="_blank" class="list-group-item download-file list-group-item-action judul-event">
              <i class="fa fa-file" aria-hidden="true"></i> <?php echo $row->nama; ?>
            </a>
            <?php endforeach; } ?>
            <a href="<?php echo site_url('download'); ?>" class="list-group-item download-file list-group-item-action judul-event" style="text-align: center">
              SELENGKAPNYA
            </a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div style="margin-bottom: 12px">
          <h5 class="header-home-title">JEJAK PENDAPAT</h5>
          <ul class="menu-poling">
            <li>
              Bagaimana tanggapan anda dengan tampilan website ini ?
            </li>
            <li>
              &nbsp;
            </li>
            <li>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rd" id="exampleRadios1" value="a">
                <label class="form-check-label" for="exampleRadios1">
                  Sangat Bagus
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rd" id="exampleRadios1" value="b">
                <label class="form-check-label" for="exampleRadios1">
                  Bagus
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rd" id="exampleRadios1" value="c">
                <label class="form-check-label" for="exampleRadios1">
                  Kurang Bagus
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="rd" id="exampleRadios1" value="d">
                <label class="form-check-label" for="exampleRadios1">
                  Jelek
                </label>
              </div>
              <br>
              <button type="button" id="vote" class="btn btn-primary" style="border-radius: 0;font-size: 11px;font-family: Roboto-Bold;">Kirim Poling</button>
              <a href="<?php echo site_url('poling'); ?>" class="btn btn-success" style="border-radius: 0;font-size: 11px;font-family: Roboto-Bold;">Lihat Poling</a>
            </li>
          </ul>
          <script>
          $(function() {
               $("#vote").click(function() {
               // validate and process form here
               var rd;

               if ($("input[name='rd']:checked").length > 0){
                   rd = $('input:radio[name=rd]:checked').val();
               }
               else{
                   // alert("Anda belum memilih salah satu");
                   swal(
                     'Anda belum memilih salah satu',
                     '',
                     'error'
                   )

                   return false;
               }

               $.ajax({
                  url: "<?php echo site_url('Home/insert_poling/'); ?>" + "/" + rd,
                  type: "POST",
                  data: rd,
                  success: function(data) {
                    swal(
                      'Berhasil kirim poling',
                      '',
                      'success'
                    )
                  }
               });

             });
          });
          </script>

        </div>
      </div>

    </div>
  </div>
</div>

<div style="background: #ddd; padding: 35px 0">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <div class="box-berita">
          <h5 class="header-berita-home">GALERI FOTO</h5>
          <div class="row">
            <?php
              foreach($foto as $no => $row):
              if($no == 0) {
            ?>
            <div class="col-md-12 mb-3">
              <div class="list-group">
                <a href="<?php echo site_url('galeri_foto/id/'.$row->id_kategori_foto); ?>" title="<?php echo $row->kategori; ?>" class="list-group-item download-file list-group-item-action judul-event" style="padding: 0; min-height: 100px;color:#FFF">
                  <div class="panel-thumb" style="height: auto">
                    <img src="<?php echo $row->foto; ?>" class="thumb-galley" style="height: auto">
                    <div style="position: absolute;bottom: 0px;padding: 7px;background: rgba(0,0,0,0.5);width: 100%;font-size: 19px;line-height: 20px;">
                      <?php echo $row->kategori; ?>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <?php
            } else {
            ?>
            <div class="col-md-6 mb-3">
              <div class="list-group">
                <a href="<?php echo site_url('galeri_foto/id/'.$row->id_kategori_foto); ?>" title="<?php echo $row->kategori; ?>" class="list-group-item download-file list-group-item-action judul-event" style="padding: 0; min-height: 100px;color:#FFF">
                  <div class="panel-thumb" style="height: auto">
                    <img src="<?php echo $row->foto; ?>" class="thumb-galley">
                    <div style="position: absolute;bottom: 0px;padding: 7px;background: rgba(0,0,0,0.5);width: 100%;">
                      <?php echo $row->kategori; ?>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <?php
              }
              endforeach;
            ?>

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box-berita">
          <h5 class="header-berita-home">GALERI VIDEO</h5>
          <div class="row">
            <?php
              foreach($video as $no => $row):
              if($no == 0) {
            ?>
            <div class="col-md-12 mb-3">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $row->link_video; ?>" allowfullscreen></iframe>
              </div>
            </div>
            <?php
              } else {
            ?>
            <div class="col-md-6 mb-3">
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?php echo $row->link_video; ?>" allowfullscreen></iframe>
              </div>
            </div>
            <?php
              }
              endforeach;
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div style="background: #999; padding: 35px 0">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="judul-heading" style="margin-bottom: -12px;color: #fff">LINK TERKAIT</p>
        <div class="owl-carousel owl-theme" style="padding: 45px 0px;">
          <?php foreach($link as $row): ?>
            <a href="<?php echo $row->link; ?>" target="_blank"><img class="item" src="<?php echo $row->foto; ?>" title="<?php echo $row->judul; ?>" /></a>
          <?php endforeach; ?>
        </div>
        <script>
        $(document).ready(function() {
          $('.owl-carousel').owlCarousel({
          margin: 30,
          <!-- autoWidth: true, -->
          nav: true,
          loop: true,
          items: 4,
          autoplay:true,
          autoplayTimeout:3000
          })
        })
        </script>

      </div>
    </div>
  </div>
</div>
