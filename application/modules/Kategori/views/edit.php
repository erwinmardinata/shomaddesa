<section class="content-header">
  <h1>
	Kategori Pajak
	<small>Edit</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Kategori'); ?>">Kategori Pajak</a></li>
	<li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form method="POST" action="<?php echo site_url('Kategori/update'); ?>">
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
            <div class="form-group">
    				  <label for="name">Kategori</label>
              <input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control">
    				  <input type="text" name="kategori" value="<?php echo $data->kategori; ?>" class="form-control" required>
    				</div>
          <div class="card-footer">
            <a href="<?php echo site_url('Kategori'); ?>" class="btn btn-sm btn-warning">
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
