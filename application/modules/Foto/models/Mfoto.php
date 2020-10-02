<?php

class Mfoto extends CI_Model {

	function get_data() {
		$this->db->select('foto.*, kategori_foto.kategori')
				 ->from('foto')
				 ->join('kategori_foto', 'kategori_foto.id=foto.id_kategori_foto')
				 ->order_by('foto.id', 'ASC');
		return $this->db->get()->result();
	}
	// function get_data() {
	// 	$this->db->order_by('id', 'ASC');
	// 	return $this->db->get('foto')->result();
	// }

	function get_kategori_foto() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('kategori_foto')->result();
	}

	function insert_data($data) {
		return $this->db->insert('foto', $data);
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('foto')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('foto', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('foto');
	}

}
