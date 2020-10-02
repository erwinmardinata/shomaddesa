<section class="content-header">
  <h1>
	Jenis Komoditas
	<small>Daftar Data</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Foto</li>
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
		<a href="<?php echo site_url('Foto/add'); ?>" class="btn btn-success" style="float: right;margin-right: 12px;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a><br><br>
		<!-- /.box-header -->
		<div class="box-body">
		<?php echo $this->session->flashdata('message'); ?>
    <table class="table table-responsive-sm table-bordered table-striped table-sm" id="myTable">
      <thead>
      <tr>
        <th style="width: 5%">No</th>
        <th>Judul</th>
        <th>Kategori</th>
        <th>Foto</th>
        <th style="width: 10%; text-align: center">Aksi</th>
      </tr>
      </thead>
      <tbody>
      <?php foreach($data as $no => $row): ?>
      <tr>
        <td><?php echo $no+1; ?></td>
        <td><?php echo $row->judul; ?></td>
        <td><?php echo $row->kategori; ?></td>
        <td><img src="<?php echo $row->foto; ?>" style="width: 200px"></td>
        <td style="text-align: center">
          <a href="<?php echo site_url('Foto/edit/'.$row->id); ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
          <a href="<?php echo site_url('Foto/hapus/'.$row->id); ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td>
      </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
		</div>
		<!-- /.box-body -->
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
    $("#myTable").DataTable();
  });

 </script>
 <?php
 	echo $this->session->flashdata('notif');
 	echo $this->session->flashdata('audio');
 ?>
