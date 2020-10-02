<?php

class Download extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mdownload', 'mdl');

	}

	function index() {

		$data_array = array();

		$data_array['download'] = $this->mdl->get_data();
		$data_array['berita_lain'] = $this->mdl->cek_data2();

		$title = "Download File";
		$deskripsi = "";
		$image = "";
		$subtitle = "download";
		$content = $this->load->view('user/download.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
