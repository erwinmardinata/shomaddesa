<section class="content-header">
  <h1>
	Nilai Pajak
	<small>Edit</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Nilai'); ?>">Nilai Pajak</a></li>
	<li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form method="POST" action="<?php echo site_url('Nilai/update'); ?>">
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
    				  <input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" required>
    				  <select name="id_pajak" class="form-control" required>
    					<option value="">-</option>
    					<?php foreach($pajak as $row): ?>
    					<option <?php echo $data->id_pajak==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
    					<?php endforeach; ?>
    				  </select>
    				</div>
            <div class="form-group">
    				  <label for="name">Bulan</label>
    				  <input type="text" name="bulan" value="<?php echo $data->bulan; ?>" class="form-control" required>
    				</div>
    				<div class="form-group">
    				  <label for="name">Tahun</label>
    				  <input type="text" name="tahun" value="<?php echo $data->tahun; ?>" class="form-control" required>
    				</div>
    				<div class="form-group">
    				  <label for="name">Nilai</label>
    				  <input type="text" name="nilai" value="<?php echo $data->nilai; ?>" class="form-control" required>
    				</div>
          <div class="card-footer">
            <a href="<?php echo site_url('Nilai'); ?>" class="btn btn-sm btn-warning">
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
