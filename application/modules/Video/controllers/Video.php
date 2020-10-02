<?php

class Video extends Back_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mvideo', 'mdl');
		$cek = $this->session->userdata('hak_akses');
		if(!($cek)) {
			redirect('AdminpanelVideo');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data'] = $this->mdl->get_data();

		$title = "Video";
		$subtitle = "video";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function add() {

		$data_array = array();

		$title = "Tambah Video";
		$subtitle = "video";
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Video";
		$subtitle = "video";
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert() {

		$post = $this->input->post();

		// echo json_encode($post);exit;

		$query = $this->mdl->insert_data($post);

		$query == true ? $this->alert_info('Berhasil Tambah Data ') : $this->alert_error('Gagal Tambah Data');

		redirect('Video/add');

	}

	function update() {

		$post = $this->input->post();
		// echo json_encode($post);exit;

		$query = $this->mdl->update_data($post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data') : $this->alert_error('Gagal Ubah Data');

		redirect('Video');

	}

	function delete($id) {

		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Video');

	}

}
