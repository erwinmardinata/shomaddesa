<?php

class Pajak extends Front_controller {

	//[gdoc key="https://docs.google.com/spreadsheets/d/1V-oFGpXh66h4ttyLQmBqhFkS2TATnNZzpbnIh8qyGW8/edit"]

	function __construct() {

		parent::__construct();
		$this->load->model('Mpajak', 'mdl');

	}

	function index() {

		// $bln = date('m');
		// $thn = date('Y');
		$bln = '12';
		$thn = '2018';

		$data_array = array();
		$data_array['bulan_ini'] = $this->mdl->get_pajak($bln, $thn);
		$data_array['sampai_bulan_ini'] = $this->mdl->get_pajak_lalu($bln, $thn);
		$data_array['bulan'] = $bln;
		$data_array['tahun'] = $thn;

		$title = "Beranda";
		$deskripsi = "";
		$image = "";
		$subtitle = "beranda";
		$content = $this->load->view('user/data_pajak.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function get_tabel_js() {

		$data_array = array();

		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');

		$data_array['bulan_ini'] = $this->mdl->get_pajak($bulan, $tahun);
		$data_array['sampai_bulan_ini'] = $this->mdl->get_pajak_lalu($bulan, $tahun);


		$data_array['bulan'] = $bulan;
		$data_array['tahun'] = $tahun;

		$this->load->view('user/data_tabel_pajak_js.php', $data_array);

	}

	function get_grafik() {
		$bln = date('m');
		$thn = date('Y');

		$data_array = array();
		if(isset($_GET['bulan']) && isset($_GET['tahun'])) {
			$bulan = $this->input->get('bulan');
			$tahun = $this->input->get('tahun');
		} else {
			$bulan = $bln;
			$tahun = $thn;
		}

		$data_array['grafik'] = $this->mdl->get_total_per_kategori($bulan, $tahun);
		$data_array['bulans'] = $bulan;
		$data_array['tahuns'] = $tahun;

		$title = "Beranda";
		$deskripsi = "";
		$image = "";
		$subtitle = "beranda";
		$content = $this->load->view('user/data_grafik_pajak.php', $data_array, true);

		$this->load_content($title, $deskripsi, $image, $subtitle, $content);

	}

	function get_grafik_js() {

		$data_array = array();

		$bulan = $this->input->get('bulan');
		$tahun = $this->input->get('tahun');


		$data_array['grafik'] = $this->mdl->get_total_per_kategori($bulan, $tahun);
		$data_array['bulan'] = $bulan;
		$data_array['tahun'] = $tahun;

		$this->load->view('user/data_grafik_pajak_js.php', $data_array);
	}

}
