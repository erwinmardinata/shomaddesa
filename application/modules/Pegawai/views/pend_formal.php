<main class="main">
<!-- Breadcrumb-->
<ol class="breadcrumb">
  <li class="breadcrumb-item">Home</li>
  <li class="breadcrumb-item">
	<a href="#">Admin</a>
  </li>
  <li class="breadcrumb-item active">Dashboard</li>
  <!-- Breadcrumb Menu-->
  <li class="breadcrumb-menu d-md-down-none">
	<div class="btn-group" role="group" aria-label="Button group">
	  <a class="btn" href="#">
		<i class="icon-speech"></i>
	  </a>
	  <a class="btn" href="./">
		<i class="icon-graph"></i>  Dashboard</a>
	  <a class="btn" href="#">
		<i class="icon-settings"></i>  Settings</a>
	</div>
  </li>
</ol>
<div class="container-fluid">
  <div class="animated fadeIn">
	<div class="row">
	  <div class="col-sm-12">
		<div class="card">
		  <div class="card-header">
			<strong>Detail Data Pegawai</strong>
			<small></small>
		  </div>
		  <div class="card-body">
			<div class="bd-example">
				<div class="row">
					<div class="col-sm-3">
						<div class="list-group">
						  <a href="<?php echo site_url('Pegawai/detail/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Detail Profil 
						  </a>
						  <a href="<?php echo site_url('Pegawai/sutri/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Data Suami/Istri
						  </a>
						  <a href="<?php echo site_url('Pegawai/anak/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Data Anak
						  </a>
						  <a href="<?php echo site_url('Pegawai/pend_formal/'.$data->id); ?>" class="list-group-item list-group-item-action active">
							Pendidikan Formal
						  </a>
						  <a href="<?php echo site_url('Pegawai/pend_nonformal/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pendidikan Nonformal
						  </a>
						  <a href="<?php echo site_url('Pegawai/peng_kerja/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pengalaman Kerja
						  </a>
						  <a href="<?php echo site_url('Pegawai/peng_org/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pengalaman Organisasi
						  </a>
						  <a href="<?php echo site_url('Pegawai/keahlian/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Keahlian
						  </a>
						  <a href="<?php echo site_url('Pegawai/peng_panitia/'.$data->id); ?>" class="list-group-item list-group-item-action">
							Pengalaman Kepanitiaan/Semininar/Workshop dan Lain-lain
						  </a>
						</div>					
					</div>
					<div class="col-sm-9">
					  <dl class="row">
						<div class="col-md-12">
							<div style="text-align: center">
								<img src="<?php echo $data->foto ?>" />						
							</div>
						<br>
						</div>
						<div class="row">
							<!-- Button trigger modal -->
							<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
							  + Data
							</button>
							<!-- Modal -->
							<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
							  <div class="modal-dialog" role="document">
								<div class="modal-content">
								  <div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Tambah data Pendidikan Formal</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									  <span aria-hidden="true">&times;</span>
									</button>
								  </div>
								  <div class="modal-body">
									<form method="post" action="<?php echo site_url('Pegawai/insert_pend_formal'); ?>">
									  <div class="form-group row">
									    <div class="col-sm-12">
									      <input type="hidden" name="id_pegawai" value="<?php echo $data->id; ?>" class="form-control" id="inputPassword" placeholder="Nama">
									    	<select name="tingkat_pendidikan" class="form-control">
									    		<option value="">Pendidikan Terakhir</option>
									    		<option value="TK/PAUD">TK/PAUD</option>
									    		<option value="SD/MI">SD/MI</option>
									    		<option value="SMP/MTs">SMP/MTs</option>
									    		<option value="SMA/MA">SMA/MA</option>
									    		<option value="D1">D1</option>
									    		<option value="D2">D2</option>
									    		<option value="D3">D3</option>
									    		<option value="D4">D4</option>
									    		<option value="S1">S1</option>
									    		<option value="S2">S2</option>
									    		<option value="S3">S3</option>
									    	</select>
									    </div>
									  </div>
									  <div class="form-group row">
									    <div class="col-sm-12">
									      <input type="text" name="tempat_pendidikan" class="form-control" id="inputPassword" placeholder="Tempat Pendidikan" required="">
									    </div>
									  </div>
									  <div class="form-group row">
									    <div class="col-sm-12">
									      <input type="text" name="jurusan" class="form-control" id="inputPassword" placeholder="jurusan">
									    </div>
									  </div>
									  <div class="form-group row">
									    <div class="col-sm-12">
									      <input type="text" name="tgl_ijazah" class="form-control" id="inputPassword" placeholder="Tanggal Ijazah" >
									    </div>
									  </div>
									  <div class="form-group row">
									    <div class="col-sm-12">
									      <input type="text" name="tahun_masuk" class="form-control" id="inputPassword" placeholder="Tahun Masuk">
									    </div>
									  </div>
									  <div class="form-group row">
									    <div class="col-sm-12">
									      <input type="text" name="tahun_lulus" class="form-control" id="inputPassword" placeholder="Tahun Lulus">
									    </div>
									  </div>
								  </div>
								  <div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" class="btn btn-primary">Simpan Data</button>
								  </div>
									</form>
								</div>
							  </div>
							</div>					  
							<br>
							<table class="table" style="margin-top: 20px">
								<tr>
									<td>No</td>
									<td>Tingkat Pendidikan</td>
									<td>Tempat Pendidikan</td>
									<td>Jurusan</td>
									<td>Tanggal Ijazah</td>
									<td>Tahun Masuk</td>
									<td>Tahun Keluar</td>
									<td></td>
								</tr>
								<?php $no=1; foreach($pend_formal as $row): ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $row->tingkat_pendidikan; ?></td>
									<td><?php echo $row->tempat_pendidikan; ?></td>
									<td><?php echo $row->jurusan; ?></td>
									<td><?php echo $row->tgl_ijazah; ?></td>
									<td><?php echo $row->tahun_masuk; ?></td>
									<td><?php echo $row->tahun_lulus; ?></td>
									<td width="15%">
										<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal<?php echo $row->id; ?>">
										  <i class="fa fa-edit"></i>
										</button>
										<a href="<?php echo site_url('Pegawai/hapus_pend_formal/'.$row->id.'/'.$row->id_pegawai); ?>" onclick="return confirm('Anda yakin?')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>										
									</td>
								</tr>
								<!-- Modal -->
								<div class="modal fade" id="exampleModal<?php echo $row->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								  <div class="modal-dialog" role="document">
									<div class="modal-content">
									  <div class="modal-header">
										<h5 class="modal-title" id="exampleModalLabel">Edit data Pendidikan Formal</h5>
										<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										  <span aria-hidden="true">&times;</span>
										</button>
									  </div>
									  <div class="modal-body">
										<form method="post" action="<?php echo site_url('Pegawai/update_pend_formal'); ?>">
										  <div class="form-group row">
										    <div class="col-sm-12">
										      <input type="hidden" name="id" value="<?php echo $row->id; ?>" class="form-control" id="inputPassword" placeholder="Nama">
										      <input type="hidden" name="id_pegawai" value="<?php echo $row->id_pegawai; ?>" class="form-control" id="inputPassword" placeholder="Nama">
										    	<select name="tingkat_pendidikan" class="form-control">
										    		<option value="">Pendidikan Terakhir</option>
										    		<option <?php echo $row->tingkat_pendidikan=="TK/PAUD"?"selected":""; ?> value="TK/PAUD">TK/PAUD</option>
										    		<option <?php echo $row->tingkat_pendidikan=="SD/MI"?"selected":""; ?> value="SD/MI">SD/MI</option>
										    		<option <?php echo $row->tingkat_pendidikan=="SMP/MTs"?"selected":""; ?> value="SMP/MTs">SMP/MTs</option>
										    		<option <?php echo $row->tingkat_pendidikan=="SMA/MA"?"selected":""; ?> value="SMA/MA">SMA/MA</option>
										    		<option <?php echo $row->tingkat_pendidikan=="D1"?"selected":""; ?> value="D1">D1</option>
										    		<option <?php echo $row->tingkat_pendidikan=="D2"?"selected":""; ?> value="D2">D2</option>
										    		<option <?php echo $row->tingkat_pendidikan=="D3"?"selected":""; ?> value="D3">D3</option>
										    		<option <?php echo $row->tingkat_pendidikan=="D4"?"selected":""; ?> value="D4">D4</option>
										    		<option <?php echo $row->tingkat_pendidikan=="S1"?"selected":""; ?> value="S1">S1</option>
										    		<option <?php echo $row->tingkat_pendidikan=="S2"?"selected":""; ?> value="S2">S2</option>
										    		<option <?php echo $row->tingkat_pendidikan=="S3"?"selected":""; ?> value="S3">S3</option>
										    	</select>
										    </div>
										  </div>
										  <div class="form-group row">
										    <div class="col-sm-12">
										      <input type="text" name="tempat_pendidikan" value="<?php echo $row->tempat_pendidikan; ?>" class="form-control" id="inputPassword" placeholder="Tempat Lahir" required="">
										    </div>
										  </div>
										  <div class="form-group row">
										    <div class="col-sm-12">
										      <input type="text" name="jurusan" value="<?php echo $row->jurusan; ?>" class="form-control" id="inputPassword" placeholder="jurusan">
										    </div>
										  </div>
										  <div class="form-group row">
										    <div class="col-sm-12">
										      <input type="text" name="tgl_ijazah" value="<?php echo $row->tgl_ijazah; ?>" class="form-control" id="inputPassword" placeholder="Tanggal Ijazah">
										    </div>
										  </div>
										  <div class="form-group row">
										    <div class="col-sm-12">
										      <input type="text" name="tahun_masuk" value="<?php echo $row->tahun_masuk; ?>" class="form-control" id="inputPassword" placeholder="Tahun Lululs">
										    </div>
										  </div>
										  <div class="form-group row">
										    <div class="col-sm-12">
										      <input type="text" name="tahun_lulus" value="<?php echo $row->tahun_lulus; ?>" class="form-control" id="inputPassword" placeholder="Tahun Lulus">
										    </div>
										  </div>
									  </div>
									  <div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Simpan Data</button>
									  </div>
										</form>
									</div>
								  </div>
								</div>					  

								<?php endforeach; ?>
							</table>						
						</div>
					  </dl>					
					</div>
				</div>
			</div>
		  </div>
		</div>
	  </div>
	  <!--/.col-->
  </div>
</div>
</main>
<script type='text/javascript'>
var editor = CKEDITOR.replace('content');
// CKFinder.setupCKEditor(editor, 'ckfinder/');
</script>

<?php 
	echo $this->session->flashdata('notif'); 
	echo $this->session->flashdata('audio'); 
?>
