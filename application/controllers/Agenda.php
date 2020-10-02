<?php

class Agenda extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Magenda', 'mdl');

	}

	function index() {

		redirect('home');

	}

	function id($id) {

		$data_array = array();

		$data_array['agenda'] = $this->mdl->cek_data($id);
		$data_array['agenda_lain'] = $this->mdl->get_agenda($id);
		$data_array['berita_lain'] = $this->mdl->cek_data2($id);

		$title = $data_array['agenda']->agenda;
		$deskripsi = "";
		$image = $data_array['agenda']->gambar;
		// $deskripsi = $data_array['agenda']->deskripsi;
		$subtitle = "agenda";
		$content = $this->load->view('user/agenda_detail.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);



	}

}
