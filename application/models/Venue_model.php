<?php
	class Venue_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_venues($id = FALSE){
			if($id === FALSE){
				$this->db->order_by('nama_venue');
				$query = $this->db->get('venue');
				return $query->result_array();
			}

			$query = $this->db->get_where('venue', array('id_venue' => $id));
			return $query->row_array();
		}

		public function get_jadwal($id_venue , $tanggal){
			$this->db->order_by('jam');
			$query = $this->db->get_where('jadwal_venue', array('id_venue' => $id_venue, 'tanggal' => $tanggal));

			if(!$query->result_array()){
				return false;
			}

			return $query->result_array();
		}

		public function get_next_jadwal($id_venue, $id_jadwal_venue){
			$sql = 'select * from jadwal_venue where id_jadwal_venue = (select min(id_jadwal_venue) from jadwal_venue where id_jadwal_venue > '.$id_jadwal_venue.') and id_venue = '.$id_venue;
			$query = $this->db->query($sql);
			return $query->row_array();

		}

		public function update_rating($id_venue){
			$this->db->select('sum_rating_venue');
			$this->db->from('venue');
			$this->db->where('id_venue', $id_venue);
			$query =  $this->db->get();
    		$result = $query->row();
    		$sum_rating = $result->sum_rating_venue + 1;

			$this->db->set('sum_rating_venue', $sum_rating);
			$this->db->where('id_venue', $id_venue);
			$this->db->update('venue');

			$this->db->select('rating_venue');
			$this->db->from('venue');
			$this->db->where('id_venue', $id_venue);
			$query =  $this->db->get();
    		$result = $query->row();
    		$rating = $result->rating_venue + $this->input->post('rating_venue');

    		$this->db->set('rating_venue', $rating);
			$this->db->where('id_venue', $id_venue);
			$this->db->update('venue');


    		return true;
		}
	}