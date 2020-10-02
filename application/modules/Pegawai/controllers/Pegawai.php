<?php

class Pegawai extends Back_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mpegawai', 'mdl');
		$cek = $this->session->userdata('hak_akses');
		if(!($cek)) {
			redirect('Datacenter');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data'] = $this->mdl->get_data();

		$title = "Pegawai";
		$subtitle = "pegawai";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function add() {

		$data_array = array();
		$data_array['pegawai'] = $this->mdl->get_data();
		// $data_array['devisi'] = $this->mdl->get_devisi();

		$title = "Tambah Pegawai";
		$subtitle = "pegawai";
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();
		$data_array['pegawai'] = $this->mdl->get_data();
		// $data_array['jabatan'] = $this->mdl->get_jabatan();
		// $data_array['devisi'] = $this->mdl->get_devisi();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Pegawai";
		$subtitle = "pegawai";
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert() {

		$post = $this->input->post();
		// echo json_encode($post);exit;
		$query = $this->mdl->insert_data('pegawai', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data Pegawai') : $this->alert_error('Gagal Tambah Data Pegawai');

		redirect('Pegawai/add');

	}

	function update() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('pegawai', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai');

	}

	function hapus($id) {

		$query = $this->mdl->delete_data('pegawai', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai');

	}

	function detail($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('detail.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function sutri($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['sutri'] = $this->mdl->get_sutri($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('sutri.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert_sutri() {
		$post = $this->input->post();

		$query = $this->mdl->insert_data('data_sutri', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Pegawai/sutri/'.$post['id_pegawai']);
	}

	function update_sutri() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('data_sutri', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai/sutri/'.$post['id_pegawai']);

	}

	function hapus_sutri($id, $id_pegawai) {

		$query = $this->mdl->delete_data('data_sutri', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai/sutri/'.$id_pegawai);

	}

	function anak($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['anak'] = $this->mdl->get_anak($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('anak.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert_anak() {
		$post = $this->input->post();

		$query = $this->mdl->insert_data('data_anak', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Pegawai/anak/'.$post['id_pegawai']);
	}

	function update_anak() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('data_anak', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai/anak/'.$post['id_pegawai']);

	}

	function hapus_anak($id, $id_pegawai) {

		$query = $this->mdl->delete_data('data_anak', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai/anak/'.$id_pegawai);

	}

	function pend_formal($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['pend_formal'] = $this->mdl->get_pend_formal($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('pend_formal.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert_pend_formal() {
		$post = $this->input->post();

		$query = $this->mdl->insert_data('data_pendidikan_formal', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Pegawai/pend_formal/'.$post['id_pegawai']);
	}

	function update_pend_formal() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('data_pendidikan_formal', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai/pend_formal/'.$post['id_pegawai']);

	}

	function hapus_pend_formal($id, $id_pegawai) {

		$query = $this->mdl->delete_data('data_pendidikan_formal', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai/pend_formal/'.$id_pegawai);

	}

	function pend_nonformal($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['pend_nonformal'] = $this->mdl->get_pend_nonformal($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('pend_nonformal.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert_pend_nonformal() {
		$post = $this->input->post();

		$query = $this->mdl->insert_data('data_pendidikan_nonformal', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Pegawai/pend_nonformal/'.$post['id_pegawai']);
	}

	function update_pend_nonformal() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('data_pendidikan_nonformal', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai/pend_nonformal/'.$post['id_pegawai']);

	}

	function hapus_pend_nonformal($id, $id_pegawai) {

		$query = $this->mdl->delete_data('data_pendidikan_nonformal', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai/pend_nonformal/'.$id_pegawai);

	}

	function peng_kerja($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['peng_kerja'] = $this->mdl->get_peng_kerja($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('peng_kerja.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert_peng_kerja() {
		$post = $this->input->post();

		$query = $this->mdl->insert_data('data_pengalaman_kerja', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Pegawai/peng_kerja/'.$post['id_pegawai']);
	}

	function update_peng_kerja() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('data_pengalaman_kerja', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai/peng_kerja/'.$post['id_pegawai']);

	}

	function hapus_peng_kerja($id, $id_pegawai) {

		$query = $this->mdl->delete_data('data_pengalaman_kerja', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai/peng_kerja/'.$id_pegawai);

	}

	function peng_org($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['peng_org'] = $this->mdl->get_peng_org($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('peng_org.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert_peng_org() {
		$post = $this->input->post();

		$query = $this->mdl->insert_data('data_pengalaman_organisasi', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Pegawai/peng_org/'.$post['id_pegawai']);
	}

	function update_peng_org() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('data_pengalaman_organisasi', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai/peng_org/'.$post['id_pegawai']);

	}

	function hapus_peng_org($id, $id_pegawai) {

		$query = $this->mdl->delete_data('data_pengalaman_organisasi', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai/peng_org/'.$id_pegawai);

	}

	function keahlian($id) {

		$data_array = array();
		$data_array['keahlian'] = $this->mdl->get_keahlian($id);
		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('keahlian.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert_keahlian() {
		$post = $this->input->post();

		$query = $this->mdl->insert_data('data_keahlian', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Pegawai/keahlian/'.$post['id_pegawai']);
	}

	function update_keahlian() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('data_keahlian', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai/keahlian/'.$post['id_pegawai']);

	}

	function hapus_keahlian($id, $id_pegawai) {

		$query = $this->mdl->delete_data('data_keahlian', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai/keahlian/'.$id_pegawai);

	}

	function peng_panitia($id) {

		$data_array = array();
		$data_array['data']	= $this->mdl->cek_data($id);
		$data_array['peng_panitia'] = $this->mdl->get_peng_panitia($id);

		$title = "Edit Struktur Organisasi";
		$subtitle = "Struktur Organisasi";
		$content = $this->load->view('peng_panitia.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert_peng_panitia() {
		$post = $this->input->post();

		$query = $this->mdl->insert_data('data_pengalaman_kepanitiaan_dan_lain', $post);

		$query == true ? $this->alert_info('Berhasil Tambah Data') : $this->alert_error('Gagal Tambah Data');

		redirect('Pegawai/peng_panitia/'.$post['id_pegawai']);
	}

	function update_peng_panitia() {

		$post = $this->input->post();

		$query = $this->mdl->update_data('data_pengalaman_kepanitiaan_dan_lain', $post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data Pegawai') : $this->alert_error('Gagal Ubah Data Pegawai');

		redirect('Pegawai/peng_panitia/'.$post['id_pegawai']);

	}

	function hapus_peng_panitia($id, $id_pegawai) {

		$query = $this->mdl->delete_data('data_pengalaman_kepanitiaan_dan_lain', $id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Pegawai/peng_panitia/'.$id_pegawai);

	}

	function get_data() {
		$fetch_data = $this->mdl->make_datatables();
		$data = array();
		$no=1;
		foreach($fetch_data as $row)
		{
				 $sub_array = array();
				 $sub_array[] = $no++;
				 $sub_array[] = $row->nama;
				 $sub_array[] = $row->jabatan;
				 $sub_array[] = $row->jenis_kelamin;
				 $sub_array[] = '<a href="'.site_url('Pegawai/edit/'.$row->id).'" class="btn btn-info btn-xs update">Edit</a>
				 <a href="'.site_url('Pegawai/hapus/'.$row->id).'" onclick="return confirm(\'Anda Yakin?\')" class="btn btn-danger btn-xs delete">Delete</a>';
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



}
