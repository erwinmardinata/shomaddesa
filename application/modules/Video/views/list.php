<section class="content-header">
  <h1>
	Video
	<small>Daftar Data</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Video</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-md-12">

	  <div class="box">
		<div class="box-header">
		</div>
		<div class="col-md-12">
			<a href="<?php echo site_url('Video/add'); ?>" class="btn btn-success" style="float: right;margin-right: 12px;"><i class="fa fa-plus-circle" aria-hidden="true"></i> Tambah Data</a><br><br>
		</div>
		<div class="col-md-12">
			<?php echo $this->session->flashdata('message'); ?>
		</div>
		<!-- /.box-header -->
		<div class="box-body">
		  <table id="example1" class="table table-bordered table-striped">
			<thead>
			<tr>
			  <th>No</th>
			  <th>Judul</th>
			  <th>#</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($data as $no => $row): ?>
				<tr>
				  <td width="5%"><?php echo $no+1; ?></td>
				  <td><?php echo $row->nama; ?></td>
				  <td width="15%">
					  <a href="<?php echo site_url('Video/edit/'.$row->id); ?>" class="btn btn-primary btn-sm">
						<i class="fa fa-edit"></i> Edit
					  </a>
					  <a href="<?php echo site_url('Video/delete/'.$row->id); ?>" onclick="return confirm('anda yakin ?')" class="btn btn-danger btn-sm">
						<i class="fa fa-trash"></i> Hapus
					  </a>
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
  $(function () {
    $("#example1").DataTable();
  });

</script>
<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
