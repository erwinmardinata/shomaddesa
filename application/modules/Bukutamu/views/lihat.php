<section class="content-header">
  <h1>
	Buku Tamu
	<small>Lihat</small>
  </h1>
  <ol class="breadcrumb">
	<li><a href="<?php echo site_url('Dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
	<li><a href="<?php echo site_url('Bukutamu'); ?>">Buku Tamu</a></li>
	<li class="active">Lihat Buku Tamu</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
<div class="row">
  <div class="col-md-12">
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title"><?php echo $data->nama; ?></h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body no-padding">
        <div class="mailbox-read-info">
          <h3><?php echo $data->judul; ?></h3>
          <h5>From: <?php echo $data->email; ?>
            <span class="mailbox-read-time pull-right"><?php echo $data->tanggal; ?></span></h5>
        </div>
        <!-- /.mailbox-read-info -->
        <!-- /.mailbox-controls -->
        <div class="mailbox-read-message">
          <?php
            echo $data->pesan;
          ?>
        </div>
        <?php
          $cek = $this->db->where('id_bukutamu', $data->id)->get('balas_bukutamu')->result()
        ?>
        <div style="padding: 15px 12px;">
          <div style="padding-bottom: 11px;font-weight: bold;font-size: 17px;">Tanggapan : </div>
          <ul class="list-group">
            <li class="list-group-item" style="padding: 9px;">
              <?php
                if(!$cek) {
              ?>
              <div class="alert alert-warning" role="alert">
                Belum ada tanggapan dari Admin
              </div>
              <?php
                } else {
                  foreach($cek as $row):
              ?>
              <span style="font-size: 15px;font-family: Roboto-Bold;">Admin</span>
              <span style="float: right"><small><?php echo $row->waktu; ?></small></span>
                <div class="media">
                  <div class="media-left">
                      <img class="media-object" src="<?php echo base_url('assets/image/logo/logo-sumbawa.png'); ?>" style="width: 35px;height: 50px" alt="">
                  </div>
                  <div class="media-body" style="font-size: 14px">
                    <div class="alert alert-info" role="alert">
                    <?php echo $row->balasan; ?>
                    </div>
                    <a href="<?php echo site_url('Bukutamu/hapus_basalan/'.$row->id.'/'.$data->id); ?>" onclick="return confirm('Anda Yakin')" class="btn btn-xs btn-danger" style="margin-top: -14px;float: right;">hapus</a>
                  </div>
                </div>
            <?php endforeach; } ?>
            </li>
          </ul>
        </div>

        <!-- /.mailbox-read-message -->
      </div>
      <!-- /.box-body -->
      <form method="post" action="<?php echo site_url('Bukutamu/inserts'); ?>">
      <div class="box-footer">
        <div style="font-weight: bold;padding: 9px 0;">Balas :</div>
        <input type="hidden" name="id_bukutamu" value="<?php echo $data->id; ?>">
        <textarea class="form-control" name="balasan" required id="contentt" rows="5"></textarea>
        <input type="hidden" name="waktu" value="<?php echo date('Y-m-d h:i:sa'); ?>">
      </div>
      <!-- /.box-footer -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-send"></i> Balas</button>
        <a href="<?php echo site_url('Bukutamu/hapus/'.$data->id); ?>" onclick="return confirm('Anda Yakin')" class="btn btn-danger"><i class="fa fa-trash-o"></i> Hapus</a>
        <a href="<?php echo site_url('Bukutamu'); ?>" class="btn btn btn-warning">
  			  <i class="fa fa-angle-double-left"></i> Back</a>
      </div>
      </form>
      <!-- /.box-footer -->
    </div>
    <!-- /. box -->
  </div>
</div>
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
