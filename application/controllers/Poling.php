<?php

class Poling extends Front_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mpoling', 'mdl');

	}

	function index() {

		$data_array = array();

		$data_array['berita_lain'] = $this->mdl->cek_data2();
		$data_array['a'] = $this->db->query("select count(value) as a from poling where value='a'")->row();
		$data_array['b'] = $this->db->query("select count(value) as b from poling where value='b'")->row();
		$data_array['c'] = $this->db->query("select count(value) as c from poling where value='c'")->row();
		$data_array['d'] = $this->db->query("select count(value) as d from poling where value='d'")->row();

		$title = "Poling";
		$deskripsi = "";
		$image = "";
		$subtitle = "poling";
		$content = $this->load->view('user/poling.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);		


	}

}
