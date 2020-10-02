<?php

class Penduduk extends Back_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mpenduduk', 'mdl');
		$cek = $this->session->userdata('hak_akses');
		if(!($cek)) {
			redirect('Datacenter');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data'] = $this->mdl->get_data();

		$title = "Data Penduduk";
		$subtitle = "penduduk";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function add() {

		$data_array = array();
		// $data_array['penduduk'] = $this->mdl->get_data();
		$data_array['status_rekam'] = $this->mdl->get_status_rekam();
		$data_array['hubungan'] = $this->mdl->get_hubungan();
		$data_array['jk'] = $this->mdl->get_jk();
		$data_array['agama'] = $this->mdl->get_agama();
		$data_array['status_penduduk'] = $this->mdl->get_status_penduduk();
		$data_array['pendidikankk'] = $this->mdl->get_pendidikan_kk();
		$data_array['pendidikan'] = $this->mdl->get_pendidikan();
		$data_array['pekerjaan'] = $this->mdl->get_pekerjaan();
		$data_array['status_warganegara'] = $this->mdl->get_status_warganegara();
		$data_array['status_kawin'] = $this->mdl->get_status_kawin();
		$data_array['golongan_darah'] = $this->mdl->get_golongan_darah();
		$data_array['cacat'] = $this->mdl->get_cacat();
		$data_array['sakit'] = $this->mdl->get_sakit();
		$data_array['kb'] = $this->mdl->get_kb();
		$data_array['dusun'] = $this->mdl->get_dusun();

		$title = "Tambah Data Penduduk";
		$subtitle = "penduduk";
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();
		// $data_array['penduduk'] = $this->mdl->get_data();
		$data_array['status_rekam'] = $this->mdl->get_status_rekam();
		$data_array['hubungan'] = $this->mdl->get_hubungan();
		$data_array['jk'] = $this->mdl->get_jk();
		$data_array['agama'] = $this->mdl->get_agama();
		$data_array['status_penduduk'] = $this->mdl->get_status_penduduk();
		$data_array['pendidikankk'] = $this->mdl->get_pendidikan_kk();
		$data_array['pendidikan'] = $this->mdl->get_pendidikan();
		$data_array['pekerjaan'] = $this->mdl->get_pekerjaan();
		$data_array['status_warganegara'] = $this->mdl->get_status_warganegara();
		$data_array['status_kawin'] = $this->mdl->get_status_kawin();
		$data_array['golongan_darah'] = $this->mdl->get_golongan_darah();
		$data_array['cacat'] = $this->mdl->get_cacat();
		$data_array['sakit'] = $this->mdl->get_sakit();
		$data_array['kb'] = $this->mdl->get_kb();
		$data_array['dusun'] = $this->mdl->get_dusun();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Data Penduduk";
		$subtitle = "penduduk";
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function lihat($id) {

		$data_array = array();
		// $data_array['penduduk'] = $this->mdl->get_data();
		$data_array['status_rekam'] = $this->mdl->get_status_rekam();
		$data_array['hubungan'] = $this->mdl->get_hubungan();
		$data_array['jk'] = $this->mdl->get_jk();
		$data_array['agama'] = $this->mdl->get_agama();
		$data_array['status_penduduk'] = $this->mdl->get_status_penduduk();
		$data_array['pendidikankk'] = $this->mdl->get_pendidikan_kk();
		$data_array['pendidikan'] = $this->mdl->get_pendidikan();
		$data_array['pekerjaan'] = $this->mdl->get_pekerjaan();
		$data_array['status_warganegara'] = $this->mdl->get_status_warganegara();
		$data_array['status_kawin'] = $this->mdl->get_status_kawin();
		$data_array['golongan_darah'] = $this->mdl->get_golongan_darah();
		$data_array['cacat'] = $this->mdl->get_cacat();
		$data_array['sakit'] = $this->mdl->get_sakit();
		$data_array['kb'] = $this->mdl->get_kb();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Data Penduduk";
		$subtitle = "penduduk";
		$content = $this->load->view('lihat.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert() {

		$post = $this->input->post();
		// echo json_encode($post);exit;
		$query = $this->mdl->insert_data('tweb_penduduk', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Penduduk/add');

	}

	function update() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('tweb_penduduk', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data') : $this->alert_error('Gagal Ubah Data');

		redirect('Penduduk');

	}

	function hapus($id) {

		$query = $this->mdl->delete_data('tweb_penduduk', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Penduduk');

	}

	function detail($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('detail.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function get_data() {
		$fetch_data = $this->mdl->make_datatables();
		$data = array();
		$no=1;
		foreach($fetch_data as $row)
		{
				 $cek_dusun = $this->db->where('id', $row->dusun_id)->get('dusun')->row();
				 $cek_sex   = $this->db->where('id', $row->sex)->get('tweb_penduduk_sex')->row();
				 if($cek_sex) {
					 $jk = $cek_sex->nama;
				 } else {
					 $jk = "-";
				 }
				 $biday = new DateTime($row->tanggallahir);
				 $today = new DateTime();
				 $diff = $today->diff($biday);
				 if($diff->y == '2019') {
					 $umur = "-";
				 } else {
					 $umur = $diff->y.' Tahun';
				 }
				 $sub_array = array();
				 $sub_array[] = $no++;
				 $sub_array[] = $row->nama;
				 $sub_array[] = $row->nik;
				 $sub_array[] = $jk;
				 $sub_array[] = $umur;
				 $sub_array[] = $cek_dusun->nama;
				 $sub_array[] = '0'.$row->rw_id;
				 $sub_array[] = '0'.$row->rt_id;
				 $sub_array[] = '<a href="'.site_url('Penduduk/lihat/'.$row->id).'" class="btn btn-success btn-xs update">lihat</a>
				 <a href="'.site_url('Penduduk/edit/'.$row->id).'" class="btn btn-info btn-xs update">Edit</a>
				 <a href="'.site_url('Penduduk/hapus/'.$row->id).'" onclick="return confirm(\'Anda Yakin?\')" class="btn btn-danger btn-xs delete">Delete</a>';
				 $data[] = $sub_array;
		}
		$output = array(
				 "draw"                    =>     intval($_POST["draw"]),
				 "recordsTotal"          =>      $this->mdl->get_all_data(),
				 "recordsFiltered"     =>     $this->mdl->get_filtered_data(),
				 "data"                    =>     $data
		);
		echo json_encode($output);

	}

	function get_rw() {

		$id = $this->input->get('id');

		$data = $this->db->where('id_dusun', $id)->get('rw')->result();

		echo "<option value=''>- Pilih RW -</option>";
		foreach($data as $row){
			echo "<option value='".$row->id."'>".$row->nama."</option>";
		}

	}

	function get_rt() {

		$id = $this->input->get('id');

		$data = $this->db->where('id_rw', $id)->get('rt')->result();

		echo "<option value=''>- Pilih RT -</option>";
		foreach($data as $row){
			echo "<option value='".$row->id."'>".$row->nama."</option>";
		}

	}

	function get_rw_rt() {

		$id = $this->input->get('id');

		$data = $this->db->where('id', $id)->get('dusun')->row();

		$rw = $data->rw;
		$rt = $data->rt;
		// echo $rt;

		echo '
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">RW</label>
									<select class="form-control" name="rw_id">
										<option value="">- Pilih RW -</option>';
						for($x=1;$x<=$rw;$x++) {
							echo '<option value="'.$x.'">'.$x.'</option>';
						}
		echo '
									</select>
							</div>
					</div>
					<div class="form-group">
							<div class="col-md-4" style="margin-bottom: 15px;">
									<label for="phone">RT</label>
									<select class="form-control" name="rt_id">
									<option value="">- Pilih RT -</option>';
					for($x=1;$x<=$rt;$x++) {
						echo '<option value="'.$x.'">'.$x.'</option>';
					}
		echo '
									</select>
							</div>
					</div>
					';

	}


}
