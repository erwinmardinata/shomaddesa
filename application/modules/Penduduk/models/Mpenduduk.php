<?php

class Mpenduduk extends CI_Model {

	function get_data() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('penduduk')->result();
	}

	function get_status_rekam() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_status_ktp')->result();
	}
	function get_hubungan() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_hubungan')->result();
	}
	function get_jk() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_sex')->result();
	}
	function get_agama() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_agama')->result();
	}
	function get_status_penduduk() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_status')->result();
	}
	function get_pendidikan_kk() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_pendidikan_kk')->result();
	}
	function get_pendidikan() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_pendidikan')->result();
	}
	function get_pekerjaan() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_pekerjaan')->result();

	}
	function get_status_warganegara() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_warganegara')->result();

	}
	function get_status_kawin() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_penduduk_kawin')->result();

	}
	function get_golongan_darah() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_golongan_darah')->result();

	}
	function get_cacat() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_cacat')->result();

	}
	function get_sakit() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_sakit_menahun')->result();

	}
	function get_kb() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('tweb_cara_kb')->result();
	}
	function get_dusun() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('dusun')->result();
	}
	function cek_data($id) {
		$this->db->select('p.*')
				 ->from('tweb_penduduk p')
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
		$this->db->select('tweb_penduduk.*')
				 ->from("tweb_penduduk");
			 if(isset($_POST["search"]["value"]))
			 {
						$this->db->like("nama", $_POST["search"]["value"]);
						$this->db->or_like("nik", $_POST["search"]["value"]);
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
			 $this->db->from("tweb_penduduk");
			 return $this->db->count_all_results();
	}

	// function get_rwrt($id) {
	//
	// }

}
