<style type="text/css">
#image {
	width: 100%;
    height: 200px;
    overflow: hidden;
    cursor: pointer;
    background: #fff;
    color: #ddd;
    text-align: center;
    border: 2px dashed #ddd;
}
#image img {
	visibility: hidden;
}
</style>

<script type="text/javascript">
function openKCFinder(div) {
	window.KCFinder = {
		callBack: function(url) {
			window.KCFinder = null;
			div.innerHTML = '<div style="margin:5px">Loading...</div>';
			var img = new Image();
			img.src = url;
			img.onload = function() {
				div.innerHTML = '<img id="img" src="' + url + '" /><input type="hidden" name="foto" value="'+url+'">';
				var img = document.getElementById('img');
				var o_w = img.offsetWidth;
				var o_h = img.offsetHeight;
				var f_w = div.offsetWidth;
				var f_h = div.offsetHeight;
				if ((o_w > f_w) || (o_h > f_h)) {
					if ((f_w / f_h) > (o_w / o_h))
						f_w = parseInt((o_w * f_h) / o_h);
					else if ((f_w / f_h) < (o_w / o_h))
						f_h = parseInt((o_h * f_w) / o_w);
					img.style.width = f_w + "px";
					img.style.height = f_h + "px";
				} else {
					f_w = o_w;
					f_h = o_h;
				}
				// img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
				img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
				img.style.visibility = "visible";
			}
		}
	};
	window.open('<?php echo base_url('assets'); ?>/kcfinder/browse.php?type=files&dir=images/public',
		'kcfinder_image', 'status=0, toolbar=0, location=0, menubar=0, ' +
		'directories=0, resizable=1, scrollbars=0, width=800, height=600'
	);
}
</script>


<section class="content-header">
  <h1>
	Foto
	<small>Tambah</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Jenis_komoditas'); ?>">Foto</a></li>
	<li class="active">Tambah Foto</li>
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
		<form role="form" method="post" action="<?php echo site_url('Foto/insert'); ?>" enctype="multipart/form-data">
		  <div class="box-body">
			<?php echo $this->session->flashdata('message'); ?>
			<div class="row">
			  <div class="col-sm-12">
					<div class="form-group">
					  <label for="name">Kategori</label>
					  <div class="row">
						  <div class="col-sm-9">
							  <select name="id_kategori_foto" class="form-control" required>
								<option value="">-</option>
								<?php foreach($ketegori_foto as $row): ?>
								<option value="<?php echo $row->id; ?>"><?php echo $row->kategori; ?></option>
								<?php endforeach; ?>
							  </select>
						  </div>
						  <div class="col-sm-3">
							<a href="<?php echo site_url('Kategori_foto'); ?>" class="btn btn-primary">+ Uraian</a>
						  </div>
					  </div>
					</div>
					<div class="form-group">
					  <label for="name">Judul</label>
					  <input type="text" name="judul" class="form-control" required>
					</div>
					<div class="form-group">
					  <label for="name">Foto</label>
						<div id="image" onclick="openKCFinder(this)"><div style="margin:90px;"><input type="hidden" name="foto" value="">Click here to choose an image</div></div>
					</div>
			  </div>
			</div>
		  </div>
		  <!-- /.box-body -->
		  <div class="box-footer">
				<a href="<?php echo site_url('Foto'); ?>" class="btn btn-sm btn-warning">
  			  <i class="fa fa-angle-double-left"></i> Back</a>
			<button type="submit" class="btn btn-sm btn-primary">
			  <i class="fa fa-dot-circle-o"></i> Submit</button>
			<button type="reset" class="btn btn-sm btn-danger">
			  <i class="fa fa-ban"></i> Reset</button>
		  </div>

		</form>
	  </div>
	  <!-- /.box -->

	</div>
	<!--/.col (left) -->
	<!-- right column -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
