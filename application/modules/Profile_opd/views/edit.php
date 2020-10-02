<section class="content-header">
  <h1>
	Slider
	<small>Edit</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Profile_opd'); ?>">Profil</a></li>
	<li class="active">Edit Profil</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form method="POST" action="<?php echo site_url('Profile_opd/update'); ?>">
  <div class="row">
	<!-- left column -->
	<div class="col-md-12">
	  <!-- general form elements -->
	  <div class="box box-primary">
		<div class="box-header with-border">
		  <h3 class="box-title"></h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
          <?php echo $this->session->flashdata('message'); ?>
		  <div class="box-body">
				<div class="form-group">
				  <label for="exampleInputEmail1">Judul</label>
					<input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" placeholder="Agenda" required>
				  <input type="text" name="judul" value="<?php echo $data->judul; ?>" class="form-control" placeholder="Agenda" required>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Isi</label>
					<textarea class="form-control" id="content" name="isi"><?php echo $data->isi; ?></textarea>
				</div>
				<div class="form-group">
				  <label for="exampleInputEmail1">Status</label>
				  <select name="status" class="form-control" required>
					<option value="">-</option>
					<option <?php echo $data->status==1?'selected':''; ?> value="1">Aktif</option>
					<option <?php echo $data->status==0?'selected':''; ?> value="0">Tidak Aktif</option>
				  </select>
				</div>
			<div class="box-footer">
				<a href="<?php echo site_url('Profile_opd'); ?>" class="btn btn btn-danger">
  			  <i class="fa fa-angle-double-left"></i> Back</a>
			  <button type="submit" class="btn btn-primary">Simpan</button>
			  <button type="reset" class="btn btn-warning">Batal</button>
			</div>

		  </div>
		  <!-- /.box-body -->

	  </div>
	  <!-- /.box -->

	</div>

	</div>
	<!--/.col (left) -->
  </div>
</form>
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
