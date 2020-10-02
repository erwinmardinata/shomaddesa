<?php

	if(isset($_GET['aksi'])) {
		$cek = $this->db->where('id', $_GET['id'])->get('kategori_foto')->row();
	}

?>

<section class="content-header">
  <h1>
	Kategori
	<small>Daftar data</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Kategori</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-xs-12">

	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Table With Full Features</h3>
		</div>
		<div class="row">
			<div class="container">
		<div class="col-md-6">
			<div class="card-header">
			<strong>Tambah Kategori</strong>
			<small></small>
			</div>
			<?php
				if(isset($_GET['aksi'])) {
			?>
			<form method="POST" action="<?php echo site_url('Kategori_foto/update'); ?>">
			<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
			<?php
				} else {
			?>
			<form method="POST" action="<?php echo site_url('Kategori_foto/insert'); ?>">
			<?php
				}
			?>
			<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
				<div class="form-group">
					<label for="name">Kategori</label>
					<input type="text" name="kategori" value="<?php if(isset($_GET['aksi'])) { echo $cek->kategori; } ; ?>" class="form-control" required>
				</div>
				</div>
			</div>
			</div>
			<div class="card-footer">
			<button type="submit" class="btn btn-sm btn-primary">
				<i class="fa fa-dot-circle-o"></i> Submit</button>
			<a href="<?php echo site_url('Foto'); ?>" class="btn btn-sm btn-danger">
				<i class="fa fa-ban"></i> Kembali</a>
			</div>
			</form>
		</div>
		</div>
		<br>
		<div class="container">
		<div class="col-md-6">
		<table class="table table-responsive-sm table-bordered table-striped table-sm" id="myTable">
			<thead>
			<tr>
				<th style="width: 5%">No</th>
				<th>Kategori</th>
				<th style="width: 20%; text-align: center">Aksi</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($data as $no => $row): ?>
			<tr>
				<td><?php echo $no+1; ?></td>
				<td><?php echo $row->kategori; ?></td>
				<td style="text-align: center">
					<a href="<?php echo site_url('Kategori_foto?aksi=edit&id='.$row->id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
					<a href="<?php echo site_url('Kategori_foto/hapus/'.$row->id); ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
		</div>
		</div>
	  </div>
	  <!-- /.box -->
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<script>
$(document).ready(function(){
    $("#example1").DataTable();
  });

 </script>
 <?php
 	echo $this->session->flashdata('notif');
 	echo $this->session->flashdata('audio');
 ?>
