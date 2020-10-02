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
	Video
	<small>Tambah</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Video'); ?>">Video</a></li>
	<li class="active">Tambah Video</li>
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

    <form method="POST" action="<?php echo site_url('Video/insert'); ?>" enctype="multipart/form-data">
      <div class="box-body">
      <div class="row">
        <div class="col-sm-12">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" name="nama" class="form-control" required>
        </div>
        <!-- <div class="form-group">
          <label for="name">File</label>
          <input type="text" rreadonly="readonly" name="video" class="form-control" onclick="openKCFinder(this)"
            value="" style="width:100%;cursor:pointer" placeholder="Klik disini untuk mengupload file download" />
        </div> -->
        <div class="form-group">
          <label for="name">Link Youtube</label>
          <input type="text" name="link_video" class="form-control" placeholder="qoVaFg6kyXo">
        </div>
        <!-- <p>
          * Isi salah satu Form File atau Form Link Youtube, Link Youtube di isi dengan link yang di tebalkan seperti ini : https://www.youtube.com/watch?v=<strong>qoVaFg6kyXo</strong>
        </p> -->

        <div class="box-footer">
          <a href="<?php echo site_url('Video'); ?>" class="btn btn-sm btn-warning">
    			  <i class="fa fa-angle-double-left"></i> Back</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-warning">Batal</button>
        </div>

        </div>
      </div>

    </form>
    </div>
    </div>
  </div>
  </div>
  <!-- /.row -->
</section>
<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
