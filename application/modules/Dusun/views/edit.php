<script type="text/javascript">
function openKCFinder(field) {
    window.KCFinder = {
        callBack: function(url) {
            field.value = url;
            window.KCFinder = null;
        }
    };
    window.open('<?php echo base_url('assets'); ?>/kcfinder/browse.php?type=files&dir=files/public', 'kcfinder_textbox',
        'status=0, toolbar=0, location=0, menubar=0, directories=0, ' +
        'resizable=1, scrollbars=0, width=800, height=600'
    );
}
</script>
<section class="content-header">
  <h1>
	Dusun
	<small>Tambah</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Dusun'); ?>">Dusun</a></li>
	<li class="active">Edit</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form method="POST" action="<?php echo site_url('Dusun/update'); ?>">
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
    				  <label for="name">Nama Dusun</label>
              <input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" required>
    				  <input type="text" name="nama" value="<?php echo $data->nama; ?>" class="form-control" required>
    				</div>
            <div class="form-group">
  						<div class="row" style="margin-bottom: 15px;">
  							<div class="col-md-6" style="margin-bottom: 15px;">
  									<label for="first_name">Kadus</label>
  									<select class="js-example-basic-single form-control" name="kadus" id="penduduk">
  										<option value="">Pilih Penduduk</option>
  										<?php foreach($penduduk as $row): ?>
  											<option <?php echo $data->kadus==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nik." - ".$row->nama; ?></option>
  										<?php endforeach; ?>
  									</select>
  								</div>
  							</div>
  					</div>
            <!-- <div class="form-group">
    				  <label for="name">Jumlah RW</label> <code>isi dengan angka</code>
    				  <input type="number" value="<?php echo $data->rw; ?>" min="0" max="100" name="rw" class="form-control" placeholder="Jumlah RW" required>
    				</div>
            <div class="form-group">
    				  <label for="name">Jumlah RT</label> <code>isi dengan angka</code>
    				  <input type="number" value="<?php echo $data->rt; ?>" min="0" max="100" name="rt" class="form-control" placeholder="Jumlah RT" required>
    				</div> -->
          <div class="card-footer">
            <a href="<?php echo site_url('Dusun'); ?>" class="btn btn-sm btn-warning">
              <i class="fa fa-angle-double-left"></i> Back</a>
              <button type="submit" class="btn btn-sm btn-primary">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
              <button type="reset" class="btn btn-sm btn-danger">
                <i class="fa fa-ban"></i> Reset</button>
          </div>
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
<script>
$(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>
