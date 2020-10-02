<?php

class Bukutamu extends Back_controller {

	function __construct() {

		parent::__construct();
		$this->load->model('Mbukutamu', 'mdl');
		$cek = $this->session->userdata('hak_akses');

		if(!($cek)) {
			redirect('Datacenter');
		}

	}

	function index() {

		$data_array = array();

		$data_array['data']	= $this->mdl->get_data();

		$title = "Buku Tamu";
		$subtitle = "bukutamu";
		$content = $this->load->view('list.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function lihat($id) {
		$data = array(
			'status' => 1
		);
		$this->db->where('id', $id);
		$this->db->update('bukutamu', $data);
		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Lihat Buku Tamu";
		$subtitle = "bukutamu";
		$content = $this->load->view('lihat.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);
	}

	function add() {

		$data_array = array();

		$title = "Tambah Berita";
		$subtitle = "berita";
		$content = $this->load->view('add.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function edit($id) {

		$data_array = array();

		$data_array['data']	= $this->mdl->cek_data($id);

		$title = "Edit Berita";
		$subtitle = "berita";
		$content = $this->load->view('edit.php', $data_array, true);

		$this->load_content($title, $subtitle, $content);

	}

	function inserts() {
		$post = $this->input->post();
		// echo $this->input->post('balasan'); exit;
		// echo json_encode($post);exit;
		// $data = array(
		// 	'id_bukutamu' => $this->input->post('id_pengaduan'),
		// 	'balasan'			 => $this->input->post('balasan')
		// );
		// $query = $this->db->insert('balas_bukutamu', $post);
		$query = $this->mdl->insert_data_($post);

		$query == true ? $this->alert_info('Berhasil Balas') : $this->alert_error('Gagal Balas');

		redirect('Bukutamu/lihat/'.$post['id_bukutamu']);

	}

	function insert() {

		$post = $this->input->post();

		$query = $this->mdl->insert_data($post);

		$query == true ? $this->alert_info('Berhasil Tambah Berita Baru') : $this->alert_error('Gagal Tambah Berita Baru');

		redirect('News/add');

	}

	function update() {

		$post = $this->input->post();

		$query = $this->mdl->update_data($post, $post['id']);

		$query == true ? $this->alert_info('Berhasil Ubah Berita') : $this->alert_error('Gagal Ubah Berita');

		redirect('News');

	}

	function hapus_basalan($id, $id2) {

		$query = $this->mdl->delete_data($id);
		$query == true ? $this->alert_info('Berhasil Hapus ') : $this->alert_error('Gagal Hapus ');
		redirect('Bukutamu/lihat/'.$id2);

	}
	function hapus($id) {

		$this->db->where('id_bukutamu', $id)->delete('balas_bukutamu');
		$query = $this->mdl->delete_data_($id);
		$query == true ? $this->alert_info('Berhasil Hapus') : $this->alert_error('Gagal Hapus');
		redirect('Bukutamu');

	}

	function get_data() {
		$fetch_data = $this->mdl->make_datatables();
		$data = array();
		$no=1;
		foreach($fetch_data as $row)
		{
				 $sub_array = array();
				 $sub_array[] = '<a href="'.site_url('Bukutamu/lihat/'.$row->id).'">'.$row->nama.'</a>';
				 $sub_array[] = $row->email;
				 $sub_array[] = '<strong>'.$row->judul.'</strong>';
				 $sub_array[] = substr($row->pesan, 0, 50).'...';
				 $sub_array[] = $row->tanggal;
				 $sub_array[] = $row->status==0?'<span class="badge badge-primary">Belum dibaca</span>':'<span class="badge badge-secondary">Sudah dibaca</span>';
				 $sub_array[] = '<a href="'.site_url('Bukutamu/hapus/'.$row->id).'" onclick="return confirm(\'Apakah anda yakin?\')" class="btn btn-danger btn-xs delete" title=Hapus><i class="fa fa-trash" aria-hidden="true"></i></a>';
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
