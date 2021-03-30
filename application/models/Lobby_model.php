<?php
	class Lobby_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_lobbies($id = FALSE){
			if($id === FALSE){
				$this->db->order_by('id_lobby');
				$this->db->select('*');
				$this->db->from('lobby');
				$this->db->join('pengunjung', 'pengunjung.id_pengunjung = lobby.id_pengunjung_home');
				$this->db->join('booking', 'booking.id_booking = lobby.id_booking');
				$this->db->join('venue', 'venue.id_venue = booking.id_venue');
				$query = $this->db->get();
				return $query->result_array();
			}

			$this->db->select('*');
			$this->db->from('lobby');
			$this->db->join('pengunjung', 'pengunjung.id_pengunjung = lobby.id_pengunjung_home');
			$this->db->join('booking', 'booking.id_booking = lobby.id_booking');
			$this->db->join('venue', 'venue.id_venue = booking.id_venue');
			$this->db->where('id_lobby', $id);
			$query = $this->db->get();
			return $query->row_array();
		}

		public function get_lobby_by_booking($id_booking){
			$this->db->select('*');
			$this->db->from('lobby');
			$this->db->where('id_booking', $id_booking);
			$query = $this->db->get();
			return $query->row_array();
		}

		public function create_lobby($id_booking){
			$data = array(
				'nama_lobby' => $this->input->post('nama_lobby'),
				'deskripsi_lobby' => $this->input->post('deskripsi_lobby'),
				'id_booking' => $id_booking,
				'id_pengunjung_home' => $this->session->userdata('user_id')
			);

			//Insert the data to db
			return $this->db->insert('lobby', $data);
		}

		public function join_lobby($id_lobby){
			$this->db->set('id_pengunjung_away', $this->session->userdata('user_id'));
			$this->db->where('id_lobby', $id_lobby);

			return $this->db->update('lobby');
		}

		public function cancel($id_lobby){
			$this->db->set('id_pengunjung_away', NULL);
			$this->db->where('id_lobby', $id_lobby);
			return $this->db->update('lobby');
		}

		public function delete_lobby($id_lobby){
			$this->db->where('id_lobby', $id_lobby);
			$this->db->delete('lobby');
			return true;
		}

		public function update_lobby(){

			$data = array(
				'nama_lobby' => $this->input->post('nama_lobby'),
				'deskripsi_lobby' => $this->input->post('deskripsi_lobby'),
				'id_booking' => $this->input->post('id_booking'),
				'id_pengunjung_home' => $this->session->userdata('user_id')
			);

			$this->db->where('id_lobby', $this->input->post('id_lobby'));

			return $this->db->update('lobby', $data);
		}
	}