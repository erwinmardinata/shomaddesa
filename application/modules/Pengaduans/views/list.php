<section class="content-header">
  <h1>
	Pengaduan
	<small>Daftar Pengaduan</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li class="active">Pengaduan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
	<div class="col-md-12">

	  <div class="box">
		<div class="box-header">
		  <h3 class="box-title">Data Tabel Pengaduan</h3>
		</div>
		<div class="col-md-12">
			<?php echo $this->session->flashdata('message'); ?>
		</div>
		<!-- /.box-header -->
		<div class="box-body table-responsive mailbox-messages">
		  <table id="user_data" class="table table-hover table-striped">
        <thead>
          <tr>
            <th>Nama Pengadu</th>
            <th>Email</th>
            <th>Judul</th>
            <th>Isi</th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
        </thead>
		  </table>

		</div>
		<!-- /.box-body -->
	  </div>
	  <!-- /.box -->
	</div>
	<!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->
<?php
	echo $this->session->flashdata('notif');
	echo $this->session->flashdata('audio');
?>
<script>
$(document).ready(function(){
  var dataTable = $('#user_data').DataTable({
       "processing":true,
       "serverSide":true,
       "order":[],
       "ajax":{
            url:"<?php echo site_url('Pengaduans/get_data'); ?>",
            type:"POST"
       },
       "columnDefs":[
            {
                 "targets":[0, 1, 2, 3, 4],
                 "orderable":false,
            },
       ],
  });

});
</script>
