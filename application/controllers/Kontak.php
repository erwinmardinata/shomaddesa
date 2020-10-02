<?php

class Kontak extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mkontak', 'mdl');

	}

	function index() {

		$data_array = array();
    $data_array['data'] = $this->mdl->get_data();

		$title = "Kontak";
		$deskripsi = "";
		$image = "";
		$subtitle = "kontak";
		$content = $this->load->view('user/kontak.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function kirim_bukutamu() {

		$post = $this->input->post();

		$query = $this->mdl->insert_data($post);

		$query == true ? $this->alert_info('Buku Tamu anda berhasil terkirim') : $this->alert_error('Buku Tamu anda gagal terkirim');

		redirect('kontak');


	}


}
