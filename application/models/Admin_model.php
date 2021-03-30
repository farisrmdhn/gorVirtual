<?php
class Admin_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}

	public function login($username, $password){
			//Validate
		$this->db->where('username_admin', $username);
		$this->db->where('password_admin', $password);

		$result = $this->db->get('admin');

		if($result->num_rows() == 1){
			return $result->row(0)->id_admin;
		} else{
			return false;
		}
	}

	public function get_admin($id_admin){
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('id_admin', $this->session->userdata('admin_id'));
		$query = $this->db->get();
		return $query->row_array();
	}

	public function update_jadwal_venue($id_venue){
		$this->db->where('id_venue', $id_venue);
		$this->db->where('tanggal', date('Y-m-d',strtotime("-1 days")));
		$this->db->delete('jadwal_venue');

		$data = array();

		for($jam = 10; $jam < 23; $jam++){
			$data[] = array(
				'id_venue' => $id_venue,
				'tanggal' => date('Y-m-d'),
				'jam' => $jam.':00:00',
				'status' => 0
			);
		};

		// Insert jadwal
		return $this->db->insert_batch('jadwal_venue', $data);
	}
	

}