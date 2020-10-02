<?php

class Galeri_foto extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mgaleri', 'mdl');

	}

	function index() {

		$data_array = array();

		$data_array['foto'] = $this->mdl->get_ketegori_foto();

		$title = "Galeri Foto";
		$deskripsi = "";
		$image = "";
		$subtitle = "galeri";
		$content = $this->load->view('user/foto.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function id($id) {

		$data_array = array();

		$data_array['foto'] = $this->mdl->get_foto($id);

		$title = "Galeri Foto";
		$deskripsi = "";
		$image = "";
		$subtitle = "galeri";
		$content = $this->load->view('user/foto_.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
