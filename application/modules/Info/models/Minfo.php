<?php

class Minfo extends CI_Model {

	function get_data() {
		$this->db->select('i.*, ki.kategori')
				 ->from('info i')
				 ->join('kategori_info ki', 'ki.id=i.id_kategori')
				 ->order_by('i.id', 'DESC');
		return $this->db->get()->result();
	}

	function insert_data($data) {
		return $this->db->insert('info', $data);
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('info')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('info', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('info');
	}

	function get_kategori() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('kategori_info')->result();
	}


		function make_query()
		{
			$this->db->select('i.*')
					 ->from('info i');
					 // ->join('kategori_info ki', 'ki.id=i.id_kategori');
				 if(isset($_POST["search"]["value"]))
				 {
							$this->db->like("i.judul", $_POST["search"]["value"]);
							// $this->db->or_like("ki.kategori", $_POST["search"]["value"]);
				 }
				 if(isset($_POST["order"]))
				 {
							$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
				 }
				 else
				 {
							$this->db->order_by('id', 'DESC');
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
				 $this->db->from("info");
				 return $this->db->count_all_results();
		}



}
