<section class="content-header">
  <h1>
	Target Pajak
	<small>Tambah</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Target'); ?>">Target Pajak</a></li>
	<li class="active">Tambah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form method="POST" action="<?php echo site_url('Target/insert'); ?>">
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
    				  <label for="name">Pajak</label>
    				  <select name="id_pajak" class="form-control" required>
    					<option value="">-</option>
    					<?php foreach($pajak as $row): ?>
    					<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
    					<?php endforeach; ?>
    				  </select>
    				</div>
    				<div class="form-group">
    				  <label for="name">Tahun</label>
    				  <input type="text" name="tahun" class="form-control" required>
    				</div>
    				<div class="form-group">
    				  <label for="name">Target</label>
    				  <input type="text" name="target" class="form-control" required>
    				</div>
          <div class="card-footer">
            <a href="<?php echo site_url('Target'); ?>" class="btn btn-sm btn-warning">
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
