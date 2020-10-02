
<?php

class Mkategori_foto extends CI_Model {

	function get_data() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('kategori_foto')->result();
	}

	function insert_data($data) {
		return $this->db->insert('kategori_foto', $data);
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('kategori_foto')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('kategori_foto', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('kategori_foto');
	}

}
