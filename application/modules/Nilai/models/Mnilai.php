<?php

class Mnilai extends CI_Model {

	function get_data() {

		$this->db->select('nilai.*, pajak.nama')
				 ->from('nilai')
				 ->join('pajak', 'pajak.id=nilai.id_pajak')
				 ->order_by('nilai.id', 'DESC');

		return $this->db->get()->result();

	}

	function get_pajak() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('pajak')->result();
	}

	function insert_data($data) {
		return $this->db->insert('nilai', $data);
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('nilai')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('nilai', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('nilai');
	}

	function make_query()
	{
		$this->db->select('nilai.*, pajak.nama')
				 ->from('nilai')
				 ->join('pajak', 'pajak.id=nilai.id_pajak');
			 if(isset($_POST["search"]["value"]))
			 {
						$this->db->like("nilai.nilai", $_POST["search"]["value"]);
						$this->db->or_like("pajak.nama", $_POST["search"]["value"]);
			 }
			 if(isset($_POST["order"]))
			 {
						$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
			 }
			 else
			 {
						$this->db->order_by('nilai.id', 'ASC');
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
			 $this->db->from("nilai");
			 return $this->db->count_all_results();
	}

}
