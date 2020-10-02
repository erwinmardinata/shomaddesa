<main class="main">
<!-- Breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">
	<a href="#">Admin</a>
  </li>
  <li class="breadcrumb-item active">Dashboard</li>
  <!-- Breadcrumb Menu-->
  <li class="breadcrumb-menu d-md-down-none">
	<div class="btn-group" role="group" aria-label="Button group">
	  <a class="btn" href="#">
		<i class="icon-speech"></i>
	  </a>
	  <a class="btn" href="./">
		<i class="icon-graph"></i>  Dashboard</a>
	  <a class="btn" href="#">
		<i class="icon-settings"></i>  Settings</a>
	</div>
  </li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
	<div class="row">
	  <div class="col-sm-12">
		<div class="card">
		  <div class="card-header">
			<strong>Detail Data Pegawai</strong>
			<small></small>
		  </div>
		  <div class="card-body">
			<div class="bd-example">
				<div class="row">
					<div class="col-sm-3">
						<div class="list-group">
						  <a href="<?php echo site_url('Pegawai/detail/'.$data->id); ?>" class="list-group-item list-group-item-action active">
							Detail Profil
						  </a>
						  <a href="<?php echo site_url('Pegawai/sutri/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Data Suami/Istri
						  </a>
						  <a href="<?php echo site_url('Pegawai/anak/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Data Anak
						  </a>
						  <a href="<?php echo site_url('Pegawai/pend_formal/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pendidikan Formal
						  </a>
						  <a href="<?php echo site_url('Pegawai/pend_nonformal/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pendidikan Nonformal
						  </a>
						  <a href="<?php echo site_url('Pegawai/peng_kerja/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pengalaman Kerja
						  </a>
						  <a href="<?php echo site_url('Pegawai/peng_org/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pengalaman Organisasi
						  </a>
						  <a href="<?php echo site_url('Pegawai/keahlian/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Keahlian
						  </a>
						  <a href="<?php echo site_url('Pegawai/peng_panitia/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pengalaman Kepanitiaan/Semininar/Workshop dan Lain-lain
						  </a>
						</div>
					</div>
					<div class="col-sm-9">
					  <dl class="row">
						<div class="col-md-12">
							<div style="text-align: center">
								<img src="<?php echo $data->foto ?>" />
							</div>
						<br>
						</div>
						<div class="row">

						<dt class="col-sm-4">Nama</dt>
						<dd class="col-sm-8"><?php echo $data->nama; ?></dd>

						<dt class="col-sm-4">Tempat, Tanggal Lahir</dt>
						<dd class="col-sm-8"><?php echo $data->tempat_lahir.", ".$data->tanggal_lahir; ?></dd>

						<dt class="col-sm-4">Jenis Kelamin</dt>
						<dd class="col-sm-8"><?php echo $data->jenis_kelamin; ?></dd>

						<dt class="col-sm-4">Alamat</dt>
						<dd class="col-sm-8"><?php echo $data->alamat; ?></dd>

						<dt class="col-sm-4">Status</dt>
						<dd class="col-sm-8"><?php echo $data->status_kawin; ?></dd>

						<dt class="col-sm-4">Nomor Telepon</dt>
						<dd class="col-sm-8"><?php echo $data->no_hp; ?></dd>

						<dt class="col-sm-4">Pendidikan Terakhir</dt>
						<dd class="col-sm-8"><?php echo $data->pendidikan_terakhir; ?></dd>

						<dt class="col-sm-4">Jabatan</dt>
						<dd class="col-sm-8"><?php echo $data->jabatan; ?></dd>

						<dt class="col-sm-4">Devisi</dt>
						<dd class="col-sm-8"><?php echo $data->devisi; ?></dd>

						<dt class="col-sm-4">NIP</dt>
						<dd class="col-sm-8"><?php echo $data->nip; ?></dd>
						</div>
					  </dl>
					</div>
				</div>
			</div>
      <a href="<?php echo site_url('Pegawai'); ?>" class="btn btn-sm btn-warning">
        <i class="fa fa-angle-double-left"></i> Back</a>
		  </div>
		</div>
	  </div>
	  <!--/.col-->
  </div>
</div>
</main>
<script type='text/javascript'>
var editor = CKEDITOR.replace('content');
// CKFinder.setupCKEditor(editor, 'ckfinder/');
</script>

<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
