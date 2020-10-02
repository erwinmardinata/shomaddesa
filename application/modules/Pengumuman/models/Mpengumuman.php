<?php

class Mpengumuman extends CI_Model {

	function get_data() {
		$this->db->order_by('id', 'DESC');
		return $this->db->get('pengumuman')->result();
	}

	function insert_data($data) {
		return $this->db->insert('pengumuman', $data);
	}

	function cek_data($id) {
		$this->db->where('id', $id);
		return $this->db->get('pengumuman')->row();
	}

	function update_data($data, $id) {
		$this->db->where('id', $id);
		return $this->db->update('pengumuman', $data);
	}

	function delete_data($id) {
		$this->db->where('id', $id);
		return $this->db->delete('pengumuman');
	}

	function make_query()
	{
		$this->db->select('pengumuman.*')
				 ->from("pengumuman");
			 if(isset($_POST["search"]["value"]))
			 {
						$this->db->like("nama", $_POST["search"]["value"]);
						// $this->db->or_like("date", $_POST["search"]["value"]);
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
			 $this->db->from("pengumuman");
			 return $this->db->count_all_results();
	}


}
