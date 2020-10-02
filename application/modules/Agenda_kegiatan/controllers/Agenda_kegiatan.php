Agenda<?php

class Agenda_kegiatan extends Back_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Magenda_kegiatan', 'mdl');
		$cek = $this->session->userdata('hak_akses');

		if(!($cek)) {
			redirect('Datacenter');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data']	= $this->mdl->get_data();

		$title = "Agenda";
		$subtitle = "agenda";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function add() {

		$data_array = array();

		$title = "Tambah Agenda";
		$subtitle = "agenda";
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Agenda";
		$subtitle = "agenda";
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert() {

		$post = $this->input->post();

		$query = $this->mdl->insert_data($post);

		$query == true ? $this->alert_info('Berhasil Tambah Agenda Baru') : $this->alert_error('Gagal Tambah Agenda Baru');

		redirect('Agenda_kegiatan/add');

	}

	function update() {

		$post = $this->input->post();

		$query = $this->mdl->update_data($post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Agenda') : $this->alert_error('Gagal Ubah Agenda');

		redirect('Agenda_kegiatan');

	}

	function delete($id) {

		$query = $this->mdl->delete_data($id);
		$query == true ? $this->alert_info('Berhasil Hapus Berita') : $this->alert_error('Gagal Hapus Berita');
		redirect('Agenda_kegiatan');

	}

	function get_data() {
		$fetch_data = $this->mdl->make_datatables();
		$data = array();
		$no=1;
		foreach($fetch_data as $row)
		{
				 $sub_array = array();
				 $sub_array[] = $no++;
				 $sub_array[] = $row->agenda;
				 $sub_array[] = $row->tempat;
				 $sub_array[] = $row->tanggal;
				 $sub_array[] = $row->jam_mulai;
				 $sub_array[] = $row->jam_selesai;
				 $sub_array[] = '<a href="'.site_url('Agenda_kegiatan/edit/'.$row->id).'" class="btn btn-info btn-xs update">Edit</a>
				 <a href="'.site_url('Agenda_kegiatan/delete/'.$row->id).'" onclick="return confirm(\'erwin\')" class="btn btn-danger btn-xs delete">Delete</a>';
				 $data[] = $sub_array;
		}
		$output = array(
				 "draw"                    =>     intval($_POST["draw"]),
				 "recordsTotal"          =>      $this->mdl->get_all_data(),
				 "recordsFiltered"     =>     $this->mdl->get_filtered_data(),
				 "data"                    =>     $data
		);
		echo json_encode($output);

	}


}
