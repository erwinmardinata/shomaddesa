<?php

class Sambutan extends Back_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Msambutan', 'mdl');
		$cek = $this->session->userdata('hak_akses');

		if(!($cek)) {
			redirect('Datacenter');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data']	= $this->mdl->get_data();

		$title = "Sambutan";
		$subtitle = "sambutan";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function add() {

		$data_array = array();

		$title = "Tambah Sambutan";
		$subtitle = "sambutan";
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Sambutan";
		$subtitle = "sambutan";
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert() {

		$post = $this->input->post();

		$data = array(
			'nama' => $post['nama'],
			'jabatan' => $post['jabatan'],
			'isi' => nl2br($post['isi']),
			'foto' => $post['foto']
		);

		$query = $this->mdl->insert_data($post);

		$query == true ? $this->alert_info('Berhasil Tambah Sambutan Baru') : $this->alert_error('Gagal Tambah Sambutan Baru');

		redirect('Sambutan');

	}

	function update() {

		$post = $this->input->post();
		$data = array(
			'nama' => $post['nama'],
			'jabatan' => $post['jabatan'],
			'isi' => nl2br($post['isi']),
			'foto' => $post['foto']
		);

		$query = $this->mdl->update_data($post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Sambutan') : $this->alert_error('Gagal Ubah Sambutan');

		redirect('Sambutan');

	}

	function delete($id) {

		$query = $this->mdl->delete_data($id);
		$query == true ? $this->alert_info('Berhasil Hapus Sambutan') : $this->alert_error('Gagal Hapus Sambutan');
		redirect('Slider');

	}

	function get_data() {
		$fetch_data = $this->mdl->make_datatables();
		$data = array();
		$no=1;
		foreach($fetch_data as $row)
		{
				 $sub_array = array();
				 $sub_array[] = $no++;
				 $sub_array[] = $row->nama;
				 $sub_array[] = $row->jabatan;
				 $sub_array[] = $row->isi;
				 $sub_array[] = '<img src='."$row->foto".' style="width: 200px">';
				 $sub_array[] = '<a href="'.site_url('Sambutan/edit/'.$row->id).'" class="btn btn-info btn-xs update">Edit</a>
				 <a href="'.site_url('Sambutan/delete/'.$row->id).'" onclick="return confirm(\'Apakah anda yakin?\')" class="btn btn-danger btn-xs delete">Delete</a>';
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
