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
	visibility: hiddenn;
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
	Pegawi
	<small>Tambah</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Pegawai'); ?>">Pegawai</a></li>
	<li class="active">Tambah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form method="POST" action="<?php echo site_url('Pegawai/update'); ?>">
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
				<div class="row">
				  <div class="col-sm-6">
					<div class="form-group">
					  <label for="name">Nama</label>
					  <input type="hidden" name="id" value="<?php echo $data->id; ?>" class="form-control" required>
					  <input type="text" name="nama" value="<?php echo $data->nama; ?>" class="form-control" required>
					</div>
					<div class="form-group">
					  <label for="name">Tempat Lahir</label>
					  <input type="text" name="tempat_lahir" value="<?php echo $data->tempat_lahir; ?>" class="form-control" required>
					</div>
					<div class="form-group">
					  <label for="name">Tanggal Lahir</label>
					  <input type="date" name="tanggal_lahir" value="<?php echo $data->tanggal_lahir; ?>" class="form-control" required>
					</div>
					<div class="form-group">
					  <label for="name">Agama</label>
						<select name="agama" class="form-control" required>
							<option value="">-</option>
							<option <?php echo $data->agama=="Islam"?"selected":""; ?> value="Islam">Islam</option>
							<option <?php echo $data->agama=="Katolik"?"selected":""; ?> value="Katolik">Katolik</option>
							<option <?php echo $data->agama=="Protestan"?"selected":""; ?> value="Protestan">Protestan</option>
							<option <?php echo $data->agama=="Hindu"?"selected":""; ?> value="Hindu">Hindu</option>
							<option <?php echo $data->agama=="Buddha"?"selected":""; ?> value="Buddha">Buddha</option>
							<option <?php echo $data->agama=="Konghucu"?"selected":""; ?> value="Konghucu">Konghucu</option>
					  </select>
					</div>
					<div class="form-group">
					  <label for="name">Jenis Kelamin</label>
					  <select class="form-control" name="jenis_kelamin" required>
						<option value="">-</option>
						<option <?php echo $data->jenis_kelamin=="Laki-laki"?"selected":""; ?> value="Laki-laki">Laki-laki</option>
						<option <?php echo $data->jenis_kelamin=="Perempuan"?"selected":""; ?> value="Perempuan">Perempuan</option>
					  </select>
					</div>
					<div class="form-group">
					  <label for="name">Alamat</label>
					  <textarea name="alamat" idd="content" class="form-control" rows="5" required><?php echo $data->alamat; ?></textarea>
					</div>
					<div class="form-group">
					  <label for="name">Status</label>
					  <select class="form-control" name="status_kawin" required>
						<option value="">-</option>
						<option <?php echo $data->status_kawin=="Menikah"?"selected":""; ?> value="Menikah">Menikah</option>
						<option <?php echo $data->status_kawin=="Belum Menikah"?"selected":""; ?> value="Belum Menikah">Belum Menikah</option>
					  </select>
					</div>
					<div class="form-group">
					  <label for="name">Nomor HP</label>
					  <input type="text" name="no_hp" value="<?php echo $data->no_hp; ?>" class="form-control" required>
					</div>
					<div class="form-group">
					  <label for="name">Pendidikan Terakhir</label>
					  <select class="form-control" name="pendidikan_terakhir" required>
						<option value="">-</option>
						<option <?php echo $data->pendidikan_terakhir=="SD/MI"?"selected":""; ?> value="SD/MI">SD/MI</option>
						<option <?php echo $data->pendidikan_terakhir=="SMP/MTS"?"selected":""; ?> value="SMP/MTS">SMP/MTS</option>
						<option <?php echo $data->pendidikan_terakhir=="SMA/SMK/MA"?"selected":""; ?> value="SMA/SMK/MA">SMA/SMK/MA</option>
						<option <?php echo $data->pendidikan_terakhir=="D1"?"selected":""; ?> value="D1">D1</option>
						<option <?php echo $data->pendidikan_terakhir=="D2"?"selected":""; ?> value="D2">D2</option>
						<option <?php echo $data->pendidikan_terakhir=="D3"?"selected":""; ?> value="D3">D3</option>
						<option <?php echo $data->pendidikan_terakhir=="D4"?"selected":""; ?> value="D4">D4</option>
						<option <?php echo $data->pendidikan_terakhir=="S1"?"selected":""; ?> value="S1">S1</option>
						<option <?php echo $data->pendidikan_terakhir=="S2"?"selected":""; ?> value="S2">S2</option>
						<option <?php echo $data->pendidikan_terakhir=="S3"?"selected":""; ?> value="S3">S3</option>
					  </select>
					</div>
				  </div>
				  <div class="col-sm-6">
					<!-- <div class="form-group">
					  <label for="name">Tipe Pegawai</label>
						<select name="type_pegawai" class="form-control" required>
							<option value="">-</option>
							<option <?php echo $data->type_pegawai=="Komisioner"?"selected":""; ?> value="Komisioner">Komisioner</option>
							<option <?php echo $data->type_pegawai=="Sekretariat"?"selected":""; ?> value="Sekretariat">Sekretariat</option>
							<option <?php echo $data->type_pegawai=="Staf"?"selected":""; ?> value="Staf">Staf</option>
					  </select>
					</div> -->
					<div class="form-group">
					  <label for="name">Jabatan</label>
						<input type="text" name="jabatan" value="<?php echo $data->jabatan; ?>" class="form-control" required>
					</div>
					<div class="form-group">
					  <label for="name">Parent</label>
						<select name="parent" class="form-control">
							<option value="">-</option>
							<?php foreach($pegawai as $row): ?>
							<option <?php echo $row->id==$data->parent?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->jabatan; ?></option>
						<?php endforeach; ?>
					  </select>
					</div>
					<!-- <div class="form-group">
					  <label for="name">Devisi</label>
						<input type="text" name="devisi" value="<?php echo $data->devisi; ?>" class="form-control">
					</div> -->
					<div class="form-group">
					  <label for="name">NIP</label>
					  <input type="text" name="nip" value="<?php echo $data->nip; ?>" class="form-control">
					</div>
					<div class="form-group">
					  <label for="name">Pangkat/Golongan</label>
					  <input type="text" name="pangkat_golongan" value="<?php echo $data->pangkat_golongan; ?>" class="form-control">
					</div>
					<div class="form-group">
					  <label for="name">Facebook</label>
					  <input type="text" name="facebook" value="<?php echo $data->facebook; ?>" class="form-control">
					</div>
					<div class="form-group">
					  <label for="name">Twitter</label>
					  <input type="text" name="twitter" value="<?php echo $data->twitter; ?>" class="form-control">
					</div>
					<div class="form-group">
					  <label for="name">Instagram</label>
					  <input type="text" name="instagram" value="<?php echo $data->instagram; ?>" class="form-control">
					</div>
					<div class="form-group">
					  <label for="name">Photo</label>
						<div id="image" onclick="openKCFinder(this)">
							<?php
								if($data->foto == null) {
							?>
							<div style="margin:90px;">
								<input type="hidden" name="foto" value="">Click here to choose an image
							</div>
							<?php
								} else {
							?>
							<img src="<?php echo $data->foto; ?>" style="height: 200px;">
							<div style="margin:90px;">
									<input type="hidden" name="foto" value="<?php echo $data->foto; ?>">
								</div>
							<?php
								}
							?>
						</div>

					</div>
					<div class="card-footer">
						<a href="<?php echo site_url('Pegawai'); ?>" class="btn btn-sm btn-warning">
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
