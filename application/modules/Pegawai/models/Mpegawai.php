<?php

class Mpegawai extends CI_Model {

	function get_data() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('pegawai')->result();
	}

	function get_jabatan() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('data_jabatan')->result();
	}

	function get_devisi() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('data_devisi')->result();
	}

	function get_sutri($id) {
		$this->db->where('id_pegawai', $id);
		return $this->db->get('data_sutri')->result();
	}

	function get_anak($id) {
		$this->db->where('id_pegawai', $id);
		return $this->db->get('data_anak')->result();
	}

	function get_pend_formal($id) {
		$this->db->where('id_pegawai', $id);
		return $this->db->get('data_pendidikan_formal')->result();
	}

	function get_pend_nonformal($id) {
		$this->db->where('id_pegawai', $id);
		return $this->db->get('data_pendidikan_nonformal')->result();
	}

	function get_peng_kerja($id) {
		$this->db->where('id_pegawai', $id);
		return $this->db->get('data_pengalaman_kerja')->result();
	}

	function get_peng_org($id) {
		$this->db->where('id_pegawai', $id);
		return $this->db->get('data_pengalaman_organisasi')->result();
	}

	function get_keahlian($id) {
		$this->db->where('id_pegawai', $id);
		return $this->db->get('data_keahlian')->result();
	}

	function get_peng_panitia($id) {
		$this->db->where('id_pegawai', $id);
		return $this->db->get('data_pengalaman_kepanitiaan_dan_lain	')->result();
	}

	function cek_data($id) {
		$this->db->select('p.*')
				 ->from('pegawai p')
				 ->where('p.id', $id);
		return $this->db->get()->row();
	}

	function insert_data($tabel, $data) {
		return $this->db->insert($tabel, $data);
	}

	function update_data($tabel, $data, $id) {
		$this->db->where('id', $id);
		return $this->db->update($tabel, $data);
	}

	function delete_data($tabel, $id) {
		$this->db->where('id', $id);
		return $this->db->delete($tabel);
	}

	function make_query()
	{
		$this->db->select('pegawai.*')
				 ->from("pegawai");
			 if(isset($_POST["search"]["value"]))
			 {
						$this->db->like("nama", $_POST["search"]["value"]);
						$this->db->or_like("jabatan", $_POST["search"]["value"]);
			 }
			 if(isset($_POST["order"]))
			 {
						$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
			 }
			 else
			 {
						$this->db->order_by('id', 'ASC');
			 }
	}

	function make_datatables(){
			 $this->make_query();
			 if($_POST["length"] != -1)
			 {
						$this->db->limit($_POST['length'], $_POST['start']);
			 }
			 $query = $this->db->get();
			 return $query->result();
	}

	function get_filtered_data(){
			 $this->make_query();
			 $query = $this->db->get();
			 return $query->num_rows();
	}

	function get_all_data()
	{
			 $this->db->select("*");
			 $this->db->from("pegawai");
			 return $this->db->count_all_results();
	}

}
