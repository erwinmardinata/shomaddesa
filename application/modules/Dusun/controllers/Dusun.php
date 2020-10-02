<?php

class Dusun extends Back_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mdusun', 'mdl');
		$cek = $this->session->userdata('hak_akses');
		if(!($cek)) {
			redirect('Datacenter');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data'] = $this->mdl->get_data();

		$title = "Data Dusun";
		$subtitle = "dusun";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function add() {

		$data_array = array();
		$data_array['penduduk'] = $this->mdl->get_data_penduduk();

		$title = "Tambah Data Dusun";
		$subtitle = "dusun";
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();
		$data_array['penduduk'] = $this->mdl->get_data_penduduk();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Data Dusun";
		$subtitle = "dusun";
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function insert() {

		$post = $this->input->post();

		// echo json_encode($post);exit;

		$query = $this->mdl->insert_data($post);

		$query == true ? $this->alert_info('Berhasil Tambah Data ') : $this->alert_error('Gagal Tambah Data');

		redirect('Dusun/add');

	}

	function update() {

		$post = $this->input->post();
		// echo json_encode($post);exit;

		$query = $this->mdl->update_data($post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Data') : $this->alert_error('Gagal Ubah Data');

		redirect('Dusun');

	}

	function delete($id) {

		$query = $this->mdl->delete_data($id);

		$query == true ? $this->alert_info('Berhasil Hapus Data') : $this->alert_error('Gagal Hapus Data');

		redirect('Dusun');

	}

	function get_data() {
		$fetch_data = $this->mdl->make_datatables();
		$data = array();
		$no=1;
		foreach($fetch_data as $row)
		{
				 $cek = $this->db->where('id', $row->kadus)->get('tweb_penduduk')->row();
				 if(!$cek) {
					 $kadus = "-";
				 } else {
					 $kadus = $cek->nama;
				 }
				 $sub_array = array();
				 $sub_array[] = $no++;
				 $sub_array[] = $row->nama;
				 $sub_array[] = $kadus;
				 // $sub_array[] = $row->rw;
				 // $sub_array[] = $row->rt;
				 $sub_array[] = '
				 <a href="'.site_url('Dusun/edit/'.$row->id).'" class="btn btn-info btn-xs update">Edit</a>
				 <a href="'.site_url('Dusun/delete/'.$row->id).'" onclick="return confirm(\'Anda yakin?\')" class="btn btn-danger btn-xs delete">Delete</a>';
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
