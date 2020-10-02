<section class="content-header">
  <h1>
	Statistik
	<small>Data</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Statistik</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<!-- left column -->
	<div class="col-md-3">
	  <!-- general form elements -->
	  <div class="box box-primary">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">Kategori</h3>

					<div class="box-tools">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
				<div class="box-body no-padding">
					<ul class="nav nav-pills nav-stacked" style="padding:0">
						<li class="<?php echo $active=="dusun"?"active":""; ?>"><a href="<?php echo site_url('Statistik'); ?>">Dusun</a></li>
						<li class="<?php echo $active=="Jenis Kelamin"?"active":""; ?>"><a href="<?php echo site_url('Statistik/jk'); ?>">Jenis Kelamin</a></li>
						<li class="<?php echo $active=="KTP-Elektronik"?"active":""; ?>"><a href="<?php echo site_url('Statistik/ktpel'); ?>">KTP-El</a></li>
						<li class="<?php echo $active=="Agama"?"active":""; ?>"><a href="<?php echo site_url('Statistik/agama'); ?>">Agama</a></li>
						<li class="<?php echo $active=="umur"?"active":""; ?>"><a href="<?php echo site_url('Statistik/umur'); ?>">Umur</a></li>
						<li class="<?php echo $active=="Status Penduduk"?"active":""; ?>"><a href="<?php echo site_url('Statistik/status_penduduk'); ?>">Status Penduduk</a></li>
						<li class="<?php echo $active=="Status Kewarganegaraan"?"active":""; ?>"><a href="<?php echo site_url('Statistik/kwn'); ?>">Kewarganegaraan</a></li>
						<li class="<?php echo $active=="Pendidikan dalam KK"?"active":""; ?>"><a href="<?php echo site_url('Statistik/pendidikan_kk'); ?>">Pendidikan Dalam KK</a></li>
						<li class="<?php echo $active=="Pendidikan Sedang di Tempuh"?"active":""; ?>"><a href="<?php echo site_url('Statistik/pendidikan_sedang'); ?>">Pendidikan Sedang Di Tempuh</a></li>
						<li class="<?php echo $active=="Pekerjaan"?"active":""; ?>"><a href="<?php echo site_url('Statistik/pekerjaan'); ?>">Pekerjaan</a></li>
						<li class="<?php echo $active=="Status Perkawinan"?"active":""; ?>"><a href="<?php echo site_url('Statistik/kawin'); ?>">Status Perkawinan</a></li>
						<li class="<?php echo $active=="Golongan Darah"?"active":""; ?>"><a href="<?php echo site_url('Statistik/gol_darah'); ?>">Golongan Darah</a></li>
						<li class="<?php echo $active=="Cacat Fisik/Mental"?"active":""; ?>"><a href="<?php echo site_url('Statistik/cacat'); ?>">Cacat Fisik/Mental</a></li>
						<li class="<?php echo $active=="Riwayat Sakit"?"active":""; ?>"><a href="<?php echo site_url('Statistik/sakit'); ?>">Riwayat Sakit</a></li>
					</ul>
				</div>
				<!-- /.box-body -->
			</div>

	  </div>
	  <!-- /.box -->

	</div>

	<div class="col-md-9">
	  <!-- general form elements -->
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title">Grafik</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		  <div class="box-body">
				<div id="container" style="min-width: 300px; height: 400px; margin: 0 auto"></div>
			</div>
			<div class="box-footer">
			  <button type="reset" class="btn btn-warning">Kembali</button>
			</div>

		  </div>
		  <!-- /.box-body -->

	  </div>
	  <!-- /.box -->

	</div>

	</div>
	<!--/.col (left) -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script type='text/javascript'>
var editor = CKEDITOR.replace('content');
// CKFinder.setupCKEditor(editor, 'ckfinder/');
</script>

<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
<script>
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'JUMLAH PENDUDUK BERDASARKAN <?php echo mb_strtoupper($active); ?>'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Populasi'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Populasi: <b>{point.y:1f} Orang</b>'
    },
    series: [{
        name: 'Kelompok Umur',
        data: [
          ['0 - 4', <?php echo $umur04; ?>],
          ['5 - 9', <?php echo $umur59; ?>],
          ['10 - 14', <?php echo $umur1014; ?>],
          ['15 - 19', <?php echo $umur1519; ?>],
          ['20 - 24', <?php echo $umur2024; ?>],
          ['25 - 29', <?php echo $umur2529; ?>],
          ['30 - 34', <?php echo $umur3034; ?>],
          ['35 - 39', <?php echo $umur3539; ?>],
          ['40 - 44', <?php echo $umur4044; ?>],
          ['45 - 49', <?php echo $umur4549; ?>],
          ['50 - 54', <?php echo $umur5054; ?>],
          ['55 - 59', <?php echo $umur5559; ?>],
          ['60 - 64', <?php echo $umur6064; ?>],
          ['65+', <?php echo $umur65; ?>]
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>
