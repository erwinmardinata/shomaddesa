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
	Penduduk
	<small>Tambah</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Penduduk'); ?>">Penduduk</a></li>
	<li class="active">Tambah</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form method="POST" action="<?php echo site_url('Penduduk/insert'); ?>">
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
				<div class="rows">
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="first_name">NIK*</label>
									<input type="text" class="form-control" name="nik" required id="first_name" placeholder="NIK" title="enter your first name if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
								<label for="last_name">Nama Lengkap*</label>
									<input type="text" class="form-control" name="nama" required id="last_name" placeholder="Nama Lengkap" title="enter your last name if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">KTP Elektronik</label>
									<select class="form-control" name="ktp_el">
										<option value="">Pilih KTP-El</option>
										<option value="1">Belum ada</option>
										<option value="2">KTP-El</option>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Status Rekam</label>
									<select class="form-control" name="status_rekam">
										<option value="">Pilih Status Rekam</option>
										<?php foreach($status_rekam as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor KK Sebelumnya</label>
									<input type="text" class="form-control" name="no_kk_sebelumnya" id="phone" placeholder="Nomor KK Sebelumnya" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor KK Sekarang</label> <code>diisi sesuai dengan KK sekarang</code>
									<input type="text" class="form-control" name="no_kk_sekarang" id="phone" placeholder="Nomor KK Sebelumnya" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-3" style="margin-bottom: 15px;">
									<label for="phone">Hubungan Dalam Keluarga*</label>
									<select class="form-control" name="kk_level" required>
										<option value="">Pilih</option>
										<?php foreach($hubungan as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-3" style="margin-bottom: 15px;">
									<label for="phone">Jenis Kelamin*</label>
									<select class="form-control" name="sex" required>
										<option value="">Pilih</option>
										<?php foreach($jk as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-3" style="margin-bottom: 15px;">
									<label for="phone">Agama*</label>
									<select class="form-control" name="agama_id" required>
										<option value="">Pilih</option>
										<?php foreach($agama as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-3" style="margin-bottom: 15px;">
									<label for="phone">Status Penduduk*</label>
									<select class="form-control" name="status" required>
										<option value="">Pilih</option>
										<?php foreach($status_penduduk as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Nomor Akta Kelahiran</label>
									<input type="text" class="form-control" name="akta_lahir"  id="phone" placeholder="Nomor Akta Kelahiran" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-8" style="margin-bottom: 15px;">
									<label for="phone">Tempat Lahir*</label>
									<input type="text" class="form-control" name="tempatlahir" id="phone" required placeholder="Tempat Lahir" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Tanggal Lahir*</label>
									<input type="date" class="form-control" name="tanggallahir" id="phone" required placeholder="Tanggal Lahir" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Waktu Kelahiran</label>
									<input type="time" class="form-control" name="waktu_lahir" id="phone" placeholder="Waktu Kelahiran" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Tempat dilahirkan</label>
									<select class="form-control" name="tempat_dilahirkan">
										<option value="">Pilih</option>
										<option value="1">RS/RB</option>
										<option value="2">Puskesmas</option>
										<option value="3">Polindes</option>
										<option value="4">Rumah</option>
										<option value="5">Lainnya</option>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Jenis Kelahiran</label>
									<select class="form-control" name="jenis_kelahiran">
										<option value="">Pilih</option>
										<option value="1">Tunggal</option>
										<option value="2">Kembar 2</option>
										<option value="3">Kembar 3</option>
										<option value="4">Kembar 4</option>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Anak Ke</label> &nbsp;<code>isi dengan angka</code>
									<input type="text" class="form-control" name="kelahiran_anak_ke" id="phone" placeholder="Anak Ke" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Penolong lahir</label>
									<select class="form-control" name="penolong_kelahiran">
										<option value="">Pilih</option>
										<option value="1">Dokter</option>
										<option value="2">Bidan Perawat</option>
										<option value="3">Dukun</option>
										<option value="4">Lainnya</option>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Berat Lahir</label> &nbsp;<code>kg</code>
									<input type="text" class="form-control" name="berat_lahir" id="phone" placeholder="Berat Lahir" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Panjang Lahir</label> &nbsp;<code>cm</code>
									<input type="text" class="form-control" name="panjang_lahir" id="phone" placeholder="Panjang Lahir" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Pendidikan dalam KK*</label>
									<select class="form-control" name="pendidikan_kk_id" required>
										<option value="">Pilih</option>
										<?php foreach($pendidikankk as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Pendidikan Sedang ditempuh</label>
									<select class="form-control" name="pendidikan_sedang_id">
										<option value="">Pilih</option>
										<?php foreach($pendidikan as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Pekerjaan*</label>
									<select class="form-control" name="pekerjaan_id" required>
										<option value="">Pilih</option>
										<?php foreach($pekerjaan as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Status Warga Negara*</label>
									<select class="form-control" name="warganegara_id" required>
										<option value="">Pilih</option>
										<?php foreach($status_warganegara as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor Paspor</label>
									<input type="text" class="form-control" name="dokumen_pasport" id="phone" placeholder="Nomor Paspor" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Tanggal Berakhir Paspor</label>
									<input type="date" class="form-control" name="tanggal_akhir_paspor" id="phone" placeholder="Email" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor KITAS/KITAP</label>
									<input type="text" class="form-control" name="dokumen_kitas" id="phone" placeholder="Nomor KITAS/KITAP" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">NIK Ayah</label>
									<input type="text" class="form-control" name="ayah_nik" id="phone" placeholder="NIK Ayah" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nama Ayah</label>
									<input type="text" class="form-control" name="nama_ayah" id="phone" placeholder="Nama Ayah" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">NIK Ibu</label>
									<input type="text" class="form-control" name="ibu_nik" id="phone" placeholder="Nama Ibu" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nama Ibu</label>
									<input type="text" class="form-control" name="nama_ibu" id="phone" placeholder="Nama Ibu" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Dusun*</label>
									<select class="form-control" name="dusun_id" id="dusun" required>
										<option value="">Pilih</option>
										<?php foreach($dusun as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<!-- <div id="value"> -->
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
								<label for="phone">RW* <small>Format 001</small></label>
								<input required type="text" class="form-control" name="rw_id" id="phone" placeholder="RW" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">RT* <small>Format 001</small></label>
									<input required type="text" class="form-control" name="rt_id" id="phone" placeholder="RT" title="enter your phone number if any.">
							</div>
					</div>
					<!-- </div> -->
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
									<label for="phone">Nomor Telepon/Hp</label>
									<input type="text" class="form-control" name="telepon" id="phone" placeholder="Telepon" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
									<label for="phone">Alamat Sebelumnya</label>
									<input type="text" class="form-control" name="alamat_sebelumnya" id="phone" placeholder="Alamat Sebelumnya" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
									<label for="phone">Alamat Sekarang</label>
									<input type="text" class="form-control" name="alamat_sekarang" id="phone" placeholder="Alamat Sekarang" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
									<label for="phone">Status Perkawinan</label>
									<select class="form-control" name="status_kawin">
										<option value="">Pilih</option>
										<?php foreach($status_kawin as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor Akta Nikah (Buku Nikah)/Perkawinan</label>
									<input type="text" class="form-control" name="akta_perkawinan" id="phone" placeholder="Nomor Akta Nikah (Buku Nikah)/Perkawinan" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Tanggal Perkawinan</label> &nbsp;<code>(Wajib diisi apabila status KAWIN)</code>
									<input type="date" class="form-control" name="tanggalperkawinan" id="phone" placeholder="Tanggal Perkawinan" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Akta Perceraian</label>
									<input type="text" class="form-control" name="akta_perceraian" id="phone" placeholder="Akta Perceraian" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Tanggal Perceraian</label> &nbsp;<code>(Wajib diisi apabila status CERAI)</code>
									<input type="text" class="form-control" name="tanggalperceraian" id="phone" placeholder="Tanggal Perceraian" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Golongan Darah</label>
									<select class="form-control" name="golongan_darah_id">
										<option value="">Pilih</option>
										<?php foreach($golongan_darah as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Cacat</label>
									<select class="form-control" name="cacat_id">
										<option value="">Pilih</option>
										<?php foreach($cacat as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Sakit Menahun</label>
									<select class="form-control" name="sakit_menahun_id">
										<option value="">Pilih</option>
										<?php foreach($sakit as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Akseptor KB</label>
									<select class="form-control" name="cara_kb_id">
										<option value="">Pilih</option>
										<?php foreach($kb as $row): ?>
											<option value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
						<div class="col-md-12" style="margin-bottom: 15px;">
						  <label for="name">Photo</label>
							<div id="image" onclick="openKCFinder(this)"><div style="margin:60px;"><input type="hidden" name="foto" value="">Click here to choose an image</div></div>
						</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
						<div class="col-md-12" style="margin-bottom: 15px;">
							<div class="card-footer">
								<a href="<?php echo site_url('Penduduk'); ?>" class="btn btn-sm btn-warning">
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
<script>
  $(function () {
    $("#dusun").change(function() {
		var id = $("#dusun").val();
		// return alert(id);

		$.ajax({

			url : '<?php echo site_url("Penduduk/get_rw"); ?>',
            data : 'id=' + id,
            type : 'get',
            success : function(result) {
                $("#rw").html(result);

            }

		});

	});
  });
	$(function () {
    $("#rw").change(function() {
		var id = $("#rw").val();
		// return alert(id);

		$.ajax({

			url : '<?php echo site_url("Penduduk/get_rt"); ?>',
            data : 'id=' + id,
            type : 'get',
            success : function(result) {
                $("#rt").html(result);

            }

		});

	});
  });
</script>
