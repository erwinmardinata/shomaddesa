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
	  <div class="col-sm-6">
		<div class="card">
		  <div class="card-header">
			<strong>Tambah Kategori</strong>
			<small></small>
		  </div>
		  <form method="POST" action="<?php echo site_url('Kategori_foto/insert'); ?>">
		  <div class="card-body">
			<div class="row">
			  <div class="col-sm-12">
				<div class="form-group">
				  <label for="name">Kategori</label>
				  <input type="text" name="kategori" class="form-control" required>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="card-footer">
        <a href="<?php echo site_url('Foto'); ?>" class="btn btn-sm btn-warning">
  			  <i class="fa fa-angle-double-left"></i> Back</a>
			<button type="submit" class="btn btn-sm btn-primary">
			  <i class="fa fa-dot-circle-o"></i> Submit</button>
			<button type="reset" class="btn btn-sm btn-danger">
			  <i class="fa fa-ban"></i> Reset</button>
		  </div>
		  </form>
		</div>
	  </div>
	  <!--/.col-->
  </div>
</div>
</main>
<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
