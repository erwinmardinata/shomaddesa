<?php

class Statistik extends Back_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mstatistik', 'mdl');
		$cek = $this->session->userdata('hak_akses');

		if(!($cek)) {
			redirect('Datacenter');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data']	= $this->mdl->get_dusun();
		$data_array['active']	= "dusun";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function jk() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_jk();
		$data_array['active']	= "Jenis Kelamin";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function ktpel() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_ktp_el();
		$data_array['active']	= "KTP-Elektronik";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function agama() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_agama();
		$data_array['active']	= "Agama";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function umur() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_umur();
		$data_array['active']	= "Umur";
		$umur04 = 0;
		$umur59 = 0;
		$umur1014 = 0;
		$umur1519 = 0;
		$umur2024 = 0;
		$umur2529 = 0;
		$umur3034 = 0;
		$umur3539 = 0;
		$umur4044 = 0;
		$umur4549 = 0;
		$umur5054 = 0;
		$umur5559 = 0;
		$umur6064 = 0;
		$umur65 = 0;
		foreach($data_array['data'] as $row) {
			$biday = new DateTime($row->tanggallahir);
			$today = new DateTime();
			$diff = $today->diff($biday);
			$umur = $diff->y;
			if($umur >= 0 && $umur < 5) {
				$umur04 = $umur04 + 1;
			}
			if($umur >= 5 && $umur < 10) {
				$umur59 = $umur59 + 1;
			}
			if($umur >= 10 && $umur < 15) {
				$umur1014 = $umur1014 + 1;
			}
			if($umur >= 15 && $umur < 20) {
				$umur1519 = $umur1519 + 1;
			}
			if($umur >= 20 && $umur < 25) {
				$umur2024 = $umur2024 + 1;
			}
			if($umur >= 25 && $umur < 30) {
				$umur2529 = $umur2529 + 1;
			}
			if($umur >= 30 && $umur < 35) {
				$umur3034 = $umur3034 + 1;
			}
			if($umur >= 35 && $umur < 40) {
				$umur3539 = $umur3539 + 1;
			}
			if($umur >= 40 && $umur < 45) {
				$umur4044 = $umur4044 + 1;
			}
			if($umur >= 45 && $umur < 50) {
				$umur4549 = $umur4549 + 1;
			}
			if($umur >= 50 && $umur < 55) {
				$umur5054 = $umur5054 + 1;
			}
			if($umur >= 55 && $umur < 60) {
				$umur5559 = $umur5559 + 1;
			}
			if($umur >= 60 && $umur < 65) {
				$umur6064 = $umur6064 + 1;
			}
			if($umur >= 65) {
				$umur65 = $umur65 + 1;
			}
		}

		$data_array['umur04'] = $umur04;
		$data_array['umur59'] = $umur59;
		$data_array['umur1014'] = $umur1014;
		$data_array['umur1519'] = $umur1519;
		$data_array['umur2024'] = $umur2024;
		$data_array['umur2529'] = $umur2529;
		$data_array['umur3034'] = $umur3034;
		$data_array['umur3539'] = $umur3539;
		$data_array['umur4044'] = $umur4044;
		$data_array['umur4549'] = $umur4549;
		$data_array['umur5054'] = $umur5054;
		$data_array['umur5559'] = $umur5559;
		$data_array['umur6064'] = $umur6064;
		$data_array['umur65'] = $umur65;

		// echo $umur59;exit;
		// echo json_encode($data_array['data']);exit;
		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list_umur.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function status_penduduk() {
		$data_array = array();

		$data_array['data']	= $this->mdl->gets_status_penduduk();
		$data_array['active']	= "Status Penduduk";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function kwn() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_kwn();
		$data_array['active']	= "Status Kewarganegaraan";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function pendidikan_kk() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_pendidikan_kk();
		$data_array['active']	= "Pendidikan dalam KK";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function pendidikan_sedang() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_pendidikan_sedang();
		$data_array['active']	= "Pendidikan Sedang di Tempuh";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function pekerjaan() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_pekerjaan();
		$data_array['active']	= "Pekerjaan";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function kawin() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_kawin();
		$data_array['active']	= "Status Perkawinan";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function gol_darah() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_goldarah();
		$data_array['active']	= "Golongan Darah";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function cacat() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_cacat();
		$data_array['active']	= "Cacat Fisik/Mental";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function sakit() {
		$data_array = array();

		$data_array['data']	= $this->mdl->get_sakit();
		$data_array['active']	= "Riwayat Sakit";

		$title = "Statistik";
		$subtitle = "statistik";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}


}
