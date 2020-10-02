<?php

class Profil extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('mprofil', 'mdl');

	}

	function index($id = null) {

		if($id == null) {
			$id = 10;
		}

		$data_array = array();

		$data_array['data'] = $this->mdl->get_data();
		$data_array['detail'] = $this->mdl->cek_data($id);

		$title = $data_array['detail']->judul;;
		$deskripsi = "";
		$image = "";
		$subtitle = "profil";
		$content = $this->load->view('user/profil.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);


	}

	function pegawai($value = NULL) {

		$data_array = array();

		$data_array['data'] = $this->mdl->get_data();
		$data_array['detail'] = $this->mdl->get_data_pegawai();
		$data_array['title'] = "pegawai";

		$title = "Data Pegawai";
		$deskripsi = "";
		$image = "";
		if($value == "data") {
			$subtitle = "pegawai";
			$content = $this->load->view('user/pegawai.php', $data_array, true);
		} else if($value == "struktur") {
			$subtitle = "struktur";
			$content = $this->load->view('user/struktur.php', $data_array, true);
		}
		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function profil_pegawai($id) {

		$data_array = array();
		$data_array['data'] = $this->mdl->row_pegawai($id);

		$this->load->view('user/profil_pegawai.php', $data_array);

	}



}
