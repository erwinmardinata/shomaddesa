<?php

class Home extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mhome', 'mdl');

	}

	function index($num = null) {

		$data_array = array();

		$data_array['slider'] = $this->mdl->get_slider();
		$data_array['pengumuman'] = $this->mdl->get_pengumuman();
		$data_array['berita'] = $this->mdl->get_berita();
		$data_array['sambutan'] = $this->mdl->get_sambutan();
		$data_array['agenda'] = $this->mdl->get_agenda();
		$data_array['pengaduan'] = $this->mdl->get_pengaduan();
		$data_array['profil_web'] = $this->mdl->get_profil_web();
		$data_array['download'] = $this->mdl->get_download();
		$data_array['link'] = $this->mdl->get_link();
		$data_array['foto'] = $this->mdl->get_ketegori_foto();
		$data_array['video'] = $this->mdl->get_video();

		$title = "Beranda";
		$deskripsi = "";
		$image = "";
		$subtitle = "home";
		$content = $this->load->view('user/home.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function insert_poling($id){
		// echo "rwrwer";exit;
		$data = array(
			'value' => $id
			// 'value' => $this->input->post('rd')
			);
		$this->db->insert('poling', $data);
	}

}
