<?php

class Mpajak_ extends CI_Model {

	function get_data() {

		$this->db->select('pajak.*, kategori.kategori')
				 ->from('pajak')
				 ->join('kategori', 'kategori.id=pajak.id_kategori')
				 ->order_by('pajak.id', 'ASC');

		return $this->db->get()->result();

	}

	function get_kategori() {
		$this->db->order_by('id', 'ASC');
		return $this->db->get('kategori')->result();
	}

	function insert_data($data) {
		return $this->db->insert('pajak', $data);
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('pajak')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('pajak', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('pajak');
	}

	function make_query()
	{
		$this->db->select('pajak.*, kategori.kategori')
				 ->from('pajak')
				 ->join('kategori', 'kategori.id=pajak.id_kategori');
			 if(isset($_POST["search"]["value"]))
			 {
						$this->db->like("pajak.nama", $_POST["search"]["value"]);
						$this->db->or_like("kategori.kategori", $_POST["search"]["value"]);
			 }
			 if(isset($_POST["order"]))
			 {
						$this->db->order_by($_POST['order']['0']['column'], $_POST['order']['0']['dir']);
			 }
			 else
			 {
						$this->db->order_by('pajak.id', 'ASC');
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
			 $this->db->from("pajak");
			 return $this->db->count_all_results();
	}

}
