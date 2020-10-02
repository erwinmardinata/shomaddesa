<?php

class Search extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('msearch');

	}

	function index() {

		// echo $num; exit;

		$data_array = array();

		if(!$this->input->post('submit')) {
			$data_array['cari'] = $this->input->post('cari');
			$this->session->set_userdata('sess_cari', $data_array['cari']);
		} else {
			$data_array['cari'] = $this->session->userdata('sess_cari');
		}

		$data_array['data'] = $this->msearch->get_data($data_array['cari']);

		// echo json_encode($data_array['data']);exit;

		$title = "Beranda";
		$deskripsi = "";
		$image = "";
		$subtitle = "";
		$content = $this->load->view('user/search.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

}
