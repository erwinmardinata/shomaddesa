<?php

class Informasi extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Minformasi', 'mdl');

	}

	function index() {
		redirect('Home');
	}

	function id($id) {

		$data_array = array();

		$data_array['informasi'] = $this->mdl->cek_data($id);
		$data_array['berita_lain'] = $this->mdl->cek_data2();

		$title = $data_array['informasi']->judul;
		$deskripsi = $data_array['informasi']->judul." - tentang komisi pemilihan umum daerah kabupaten sumbawa";
		$image = "";
		$subtitle = "informasi";
		$content = $this->load->view('user/informasi_detail.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);		

	}

}
