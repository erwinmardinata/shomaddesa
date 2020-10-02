<?php

class Galeri_video extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mgaleri', 'mdl');

	}

	function index() {

		$data_array = array();

		$data_array['video'] = $this->mdl->get_video();

		$title = "Galeri Video";
		$deskripsi = "";
		$image = "";
		$subtitle = "galeri";
		$content = $this->load->view('user/video.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
