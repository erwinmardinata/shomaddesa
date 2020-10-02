<?php

class Mvideo extends CI_Model {

	function get_data() {
		$this->db->order_by('id', 'DESC');
		return $this->db->get('video')->result();
	}

	function insert_data($data) {
		return $this->db->insert('video', $data);
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('video')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('video', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('video');
	}

}
