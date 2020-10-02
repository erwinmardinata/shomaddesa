<section class="content-header">
  <h1>
	Informasi
	<small>Tambah</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Info'); ?>">Informasi</a></li>
	<li class="active">Tambah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
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
		  <div class="box-body">
        <div class="row">
      	  <div class="col-sm-12">
      		<div class="card">
      		  <div class="card-header">
      			<strong>Edit Data Info</strong>
      			<small></small>
      		  </div>
      		  <form method="POST" action="<?php echo site_url('Info/update'); ?>">
      		  <div class="card-body">
      			<div class="row">
      			  <div class="col-sm-12">
                <input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" required>
      				<!-- <div class="form-group">
      				  <label for="name">Kategori</label>
      				  <select name="id_kategori" class="form-control" required>
      					<option value="">-</option>
      					<?php foreach($kategori as $row): ?>
      					<option <?php echo $data->id_kategori==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->kategori; ?></option>
      					<?php endforeach; ?>
      				  </select>
      				</div> -->
      				<div class="form-group">
      				  <label for="name">Judul</label>
      				  <input type="text" name="judul" value="<?php echo $data->judul; ?>" class="form-control" required>
      				</div>
      				<div class="form-group">
      				  <label for="name">Isi</label>
      				  <textarea name="isi" id="content" class="form-control" rows="5" required><?php echo $data->isi; ?></textarea>
      				</div>
      				<div class="form-group">
      				  <label for="name">Status</label>
      				  <select class="form-control" name="status" required="">
      					<option value="">-</option>
      					<option <?php echo $data->status==1?"selected":""; ?> value="1">Aktif</option>
      					<option <?php echo $data->status==0?"selected":""; ?> value="0">Tidak Aktif</option>
      				  </select>
      				</div>
          <div class="card-footer">
            <a href="<?php echo site_url('Info'); ?>" class="btn btn-sm btn-warning">
      			  <i class="fa fa-angle-double-left"></i> Back</a>
    			<button type="submit" class="btn btn-sm btn-primary">
    			  <i class="fa fa-dot-circle-o"></i> Submit</button>
    			<button type="reset" class="btn btn-sm btn-danger">
    			  <i class="fa fa-ban"></i> Reset</button>
    		  </div>
  			  </div>
  			</div>
		  </div>
		  <!-- /.box-body -->

	  </div>
	  <!-- /.box -->

	</div>
	<!--/.col (left) -->
  </div>
</form>
  <!-- /.row -->
</section>
<!-- /.content -->
<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
<script type='text/javascript'>
var editor = CKEDITOR.replace('content');
// CKFinder.setupCKEditor(editor, 'ckfinder/');
</script>
