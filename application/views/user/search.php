<div>
	<div style="background-color: rgba(0,0,0,0.1);">
		<div class="container">
			<div class="container-konten">
				<div class="row">
					<div class="col-md-12">
						<h1 class="header-content">SEARCH</h1>
						<ol class="breadcrumb">
						  <li class="breadcrumb-item">
							<a href="#">Beranda</a>
						  </li>
              <li class="breadcrumb-item active">Halaman Pencarian</li>
              <li class="breadcrumb-item active">Hasil Pencarian : <strong><?php echo $cari; ?></strong></li>

						</ol>

					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div style="background-color: #FFF; padding: 25px 0;">
	<div class="container">
		<div class="container-konten">
			<div class="row">
          <?php
            if(!$data) {
          ?>
          <div>
            <div style="text-align: center">
              Maaf, Kata yang anda masukkan tidak ditemukan.
            </div>
          </div>

        <?php } else {
            foreach($data as $no => $row):
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
          <div class="col-md-4 mb-3">
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

        <?php endforeach; } ?>

			</div>
		</div>
	</div>
</div>
<?php
	echo $this->session->flashdata('notif');
?>
