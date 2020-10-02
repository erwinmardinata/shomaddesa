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
	Penduduk
	<small>Detail</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Penduduk'); ?>">Penduduk</a></li>
	<li class="active">Detail</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<form method="POST" action="<?php echo site_url('Penduduk/update'); ?>">
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
									<input type="hidden" class="form-control" name="id" required value="<?php echo $data->id; ?>" id="first_name" placeholder="NIK" title="enter your first name if any.">
									<input type="text" class="form-control" disabled name="nik" required value="<?php echo $data->nik; ?>" id="first_name" placeholder="NIK" title="enter your first name if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
								<label for="last_name">Nama Lengkap*</label>
										<input type="text" class="form-control" name="nama" disabled required value="<?php echo $data->nama; ?>" id="last_name" placeholder="Nama Lengkap" title="enter your last name if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">KTP Elektronik</label>
									<select class="form-control" disabled name="ktp_el">
										<option value="">Pilih KTP-El</option>
										<option <?php echo $data->ktp_el==1?"selected":""; ?> value="1">Belum ada</option>
										<option <?php echo $data->ktp_el==2?"selected":""; ?> value="2">KTP-El</option>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Status Rekam</label>
									<select class="form-control" disabled name="status_rekam">
										<option value="">Pilih Status Rekam</option>
										<?php foreach($status_rekam as $row): ?>
											<option <?php echo $data->status_rekam==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor KK Sebelumnya</label>
									<input type="text" class="form-control" disabled name="no_kk_sebelumnya" value="<?php echo $data->no_kk_sebelumnya; ?>" id="phone" placeholder="Nomor KK Sebelumnya" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor KK Sekarang</label> <code>diisi sesuai dengan KK sekarang</code>
									<input type="text" class="form-control" disabled name="no_kk_sekarang" value="<?php echo $data->no_kk_sekarang; ?>" id="phone" placeholder="Nomor KK Sebelumnya" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-3" style="margin-bottom: 15px;">
									<label for="phone">Hubungan Dalam Keluarga</label>
									<select class="form-control" disabled name="kk_level">
										<option value="">Pilih</option>
										<?php foreach($hubungan as $row): ?>
											<option <?php echo $data->kk_level==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-3" style="margin-bottom: 15px;">
									<label for="phone">Jenis Kelamin</label>
									<select class="form-control" disabled name="sex">
										<option value="">Pilih</option>
										<?php foreach($jk as $row): ?>
											<option <?php echo $data->sex==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-3" style="margin-bottom: 15px;">
									<label for="phone">Agama</label>
									<select class="form-control" disabled name="agama_id">
										<option value="">Pilih</option>
										<?php foreach($agama as $row): ?>
											<option <?php echo $data->agama_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-3" style="margin-bottom: 15px;">
									<label for="phone">Status Penduduk</label>
									<select class="form-control" disabled name="status">
										<option value="">Pilih</option>
										<?php foreach($status_penduduk as $row): ?>
											<option <?php echo $data->status==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
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
									<input type="text" class="form-control" disabled name="akta_lahir" value="<?php echo $data->akta_lahir; ?>" id="phone" placeholder="Nomor Akta Kelahiran" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-8" style="margin-bottom: 15px;">
									<label for="phone">Tempat Lahir</label>
									<input type="text" class="form-control" disabled name="tempatlahir" value="<?php echo $data->tempatlahir; ?>" id="phone" placeholder="Tempat Lahir" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Tanggal Lahir</label>
									<input type="date" class="form-control" disabled name="tanggallahir" value="<?php echo $data->tanggallahir; ?>" id="phone" placeholder="Tanggal Lahir" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Waktu Kelahiran</label>
									<input type="time" class="form-control" disabled name="waktu_lahir" value="<?php echo $data->waktu_lahir; ?>" id="phone" placeholder="Waktu Kelahiran" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Tempat dilahirkan</label>
									<select class="form-control" disabled name="tempat_dilahirkan">
										<option value="">Pilih</option>
										<option <?php echo $data->tempat_dilahirkan==1?"selected":""; ?> value="1">RS/RB</option>
										<option <?php echo $data->tempat_dilahirkan==2?"selected":""; ?> value="2">Puskesmas</option>
										<option <?php echo $data->tempat_dilahirkan==3?"selected":""; ?> value="3">Polindes</option>
										<option <?php echo $data->tempat_dilahirkan==4?"selected":""; ?> value="4">Rumah</option>
										<option <?php echo $data->tempat_dilahirkan==5?"selected":""; ?> value="5">Lainnya</option>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Jenis Kelahiran</label>
									<select class="form-control" disabled name="jenis_kelahiran">
										<option value="">Pilih</option>
										<option <?php echo $data->jenis_kelahiran==1?"selected":""; ?> value="1">Tunggal</option>
										<option <?php echo $data->jenis_kelahiran==2?"selected":""; ?> value="2">Kembar 2</option>
										<option <?php echo $data->jenis_kelahiran==3?"selected":""; ?> value="3">Kembar 3</option>
										<option <?php echo $data->jenis_kelahiran==4?"selected":""; ?> value="4">Kembar 4</option>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Anak Ke</label> &nbsp;<code>isi dengan angka</code>
									<input type="text" class="form-control" disabled name="kelahiran_anak_ke" value="<?php echo $data->kelahiran_anak_ke; ?>" id="phone" placeholder="Anak Ke" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Penolong lahir</label>
									<select class="form-control" disabled name="penolong_kelahiran">
										<option value="">Pilih</option>
										<option <?php echo $data->penolong_kelahiran==1?"selected":""; ?> value="1">Dokter</option>
										<option <?php echo $data->penolong_kelahiran==2?"selected":""; ?> value="2">Bidan Perawat</option>
										<option <?php echo $data->penolong_kelahiran==3?"selected":""; ?> value="3">Dukun</option>
										<option <?php echo $data->penolong_kelahiran==4?"selected":""; ?> value="4">Lainnya</option>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Berat Lahir</label> &nbsp;<code>kg</code>
									<input type="text" class="form-control" disabled name="berat_lahir" value="<?php echo $data->berat_lahir; ?>" id="phone" placeholder="Berat Lahir" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Panjang Lahir</label> &nbsp;<code>cm</code>
									<input type="text" class="form-control" disabled name="panjang_lahir" value="<?php echo $data->panjang_lahir; ?>" id="phone" placeholder="Panjang Lahir" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Pendidikan dalam KK</label>
									<select class="form-control" disabled name="pendidikan_kk_id">
										<option value="">Pilih</option>
										<?php foreach($pendidikankk as $row): ?>
											<option <?php echo $data->pendidikan_kk_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Pendidikan Sedang ditempuh</label>
									<select class="form-control" disabled name="pendidikan_sedang_id">
										<option value="">Pilih</option>
										<?php foreach($pendidikan as $row): ?>
											<option <?php echo $data->pendidikan_sedang_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Pekerjaan</label>
									<select class="form-control" disabled name="pekerjaan_id">
										<option value="">Pilih</option>
										<?php foreach($pekerjaan as $row): ?>
											<option <?php echo $data->pekerjaan_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
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
									<label for="phone">Status Warga Negara</label>
									<select class="form-control" disabled name="warganegara_id">
										<option value="">Pilih</option>
										<?php foreach($status_warganegara as $row): ?>
											<option <?php echo $data->warganegara_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor Paspor</label>
									<input type="text" class="form-control" disabled name="dokumen_pasport" value="<?php echo $data->dokumen_pasport; ?>" id="phone" placeholder="Nomor Paspor" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Tanggal Berakhir Paspor</label>
									<input type="date" class="form-control" disabled name="tanggal_akhir_paspor" value="<?php echo $data->tanggal_akhir_paspor; ?>" id="phone" placeholder="Email" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor KITAS/KITAP</label>
									<input type="text" class="form-control" disabled name="dokumen_kitas" value="<?php echo $data->dokumen_kitas; ?>" id="phone" placeholder="Nomor KITAS/KITAP" title="enter your phone number if any.">
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
									<input type="text" class="form-control" disabled name="ayah_nik" value="<?php echo $data->ayah_nik; ?>" id="phone" placeholder="NIK Ayah" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nama Ayah</label>
									<input type="text" class="form-control" disabled name="nama_ayah" id="phone" value="<?php echo $data->nama_ayah; ?>" placeholder="Nama Ayah" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">NIK Ibu</label>
									<input type="text" class="form-control" disabled name="ibu_nik" id="phone" value="<?php echo $data->ibu_nik; ?>" placeholder="Nama Ibu" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nama Ibu</label>
									<input type="text" class="form-control" disabled name="nama_ibu" id="phone" value="<?php echo $data->nama_ibu; ?>" placeholder="Nama Ibu" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
								<hr>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">Dusun</label>
									<input type="text" class="form-control" disabled name="dusun_id" id="phone" placeholder="Dusun" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
								<label for="phone">RW*</label>
								<input required type="text" disabled class="form-control" value="<?php echo $data->rw_id; ?>" name="rw_id" id="phone" placeholder="RW" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">RT*</label>
									<input required type="text" disabled class="form-control" value="<?php echo $data->rt_id; ?>" name="rt_id" id="phone" placeholder="RT" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
									<label for="phone">Nomor Telepon/Hp</label>
									<input type="text" class="form-control" disabled name="telepon" value="<?php echo $data->telepon; ?>" id="phone" placeholder="Telepon" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
									<label for="phone">Alamat Sebelumnya</label>
									<input type="text" class="form-control" disabled name="alamat_sebelumnya" value="<?php echo $data->alamat_sebelumnya; ?>" id="phone" placeholder="Alamat Sebelumnya" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-12" style="margin-bottom: 15px;">
									<label for="phone">Alamat Sekarang</label>
									<input type="text" class="form-control" disabled name="alamat_sekarang" value="<?php echo $data->alamat_sekarang; ?>" id="phone" placeholder="Alamat Sekarang" title="enter your phone number if any.">
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
									<select class="form-control" disabled name="status_kawin">
										<option value="">Pilih</option>
										<?php foreach($status_kawin as $row): ?>
											<option <?php echo $data->status_kawin==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Nomor Akta Nikah (Buku Nikah)/Perkawinan</label>
									<input type="text" class="form-control" disabled name="akta_perkawinan" value="<?php echo $data->akta_perkawinan; ?>" id="phone" placeholder="Nomor Akta Nikah (Buku Nikah)/Perkawinan" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Tanggal Perkawinan</label> &nbsp;<code>(Wajib diisi apabila status KAWIN)</code>
									<input type="date" class="form-control" disabled name="tanggalperkawinan" value="<?php echo $data->tanggalperkawinan; ?>" id="phone" placeholder="Tanggal Perkawinan" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Akta Perceraian</label>
									<input type="text" class="form-control" disabled name="akta_perceraian" value="<?php echo $data->akta_perceraian; ?>" id="phone" placeholder="Akta Perceraian" title="enter your phone number if any.">
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Tanggal Perceraian</label> &nbsp;<code>(Wajib diisi apabila status CERAI)</code>
									<input type="date" class="form-control" disabled name="tanggalperceraian" value="<?php echo $data->tanggalperceraian; ?>" id="phone" placeholder="Tanggal Perceraian" title="enter your phone number if any.">
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
									<select class="form-control" disabled name="golongan_darah_id">
										<option value="">Pilih</option>
										<?php foreach($golongan_darah as $row): ?>
											<option <?php echo $data->golongan_darah_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Cacat</label>
									<select class="form-control" disabled name="cacat_id">
										<option value="">Pilih</option>
										<?php foreach($cacat as $row): ?>
											<option <?php echo $data->cacat_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Sakit Menahun</label>
									<select class="form-control" disabled name="sakit_menahun_id">
										<option value="">Pilih</option>
										<?php foreach($sakit as $row): ?>
											<option <?php echo $data->sakit_menahun_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-6" style="margin-bottom: 15px;">
									<label for="phone">Akseptor KB</label>
									<select class="form-control" disabled name="cara_kb_id">
										<option value="">Pilih</option>
										<?php foreach($kb as $row): ?>
											<option <?php echo $data->cara_kb_id==$row->id?"selected":""; ?> value="<?php echo $row->id; ?>"><?php echo $row->nama; ?></option>
										<?php endforeach; ?>
									</select>
							</div>
					</div>
					<div class="form-group">
					  <label for="name">Photo</label>
						<div id="image" onclick="dopenKCFinder(this)">
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
									<!-- <button type="submit" class="btn btn-sm btn-primary">
										<i class="fa fa-dot-circle-o"></i> Submit</button>
										<button type="reset" class="btn btn-sm btn-danger">
											<i class="fa fa-ban"></i> Reset</button> -->
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
