<?php
	class Booking_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function get_bookings($id = FALSE){
			if($id === FALSE){
				$this->db->select('*');
				$this->db->from('booking');
				$this->db->join('venue', 'venue.id_venue = booking.id_venue');
				$this->db->where('id_pengunjung', $this->session->userdata('user_id'));
				$query = $this->db->get();
				return $query->row_array();
			}

			$this->db->select('*');
			$this->db->from('booking');
			$this->db->join('venue', 'venue.id_venue = booking.id_venue');
			$this->db->where('id_booking', $id);
			$query = $this->db->get();
			return $query->row_array();
		}

		public function get_all_bookings(){
			$this->db->select('*');
			$this->db->from('booking');
			$this->db->join('venue', 'venue.id_venue = booking.id_venue');
			$this->db->join('pengunjung', 'pengunjung.id_pengunjung = booking.id_pengunjung');
			$query = $this->db->get();
			return $query->result_array();

		}

		public function get_bookings_by_user_id($id_pengunjung){
			$this->db->select('*');
			$this->db->from('booking');
			$this->db->where('id_pengunjung', $id_pengunjung);
			$this->db->where('konfirmasi', 2);
			$query = $this->db->get();

			if($query->num_rows() == 0){
				return false;
			} else{
				return $query->row_array();
			}
		}

		public function updateJadwalBooking(){

			if($this->input->post('durasi_booking') != 1){
				$this->db->set('status', 1);
				$this->db->where('id_jadwal_venue', $this->input->post('next_id_jadwal_venue'));
				$this->db->update('jadwal_venue');
			}

			$this->db->set('status', 1);
			$this->db->where('id_jadwal_venue', $this->input->post('id_jadwal_venue'));
			return $this->db->update('jadwal_venue');
		}

		public function cancelJadwalBooking($next_book_time_id){

			if($this->input->post('durasi_booking') != 1){
				$this->db->set('status', 0);
				$this->db->where('id_jadwal_venue', $next_book_time_id);
				$this->db->update('jadwal_venue');
			}

			$this->db->set('status', 0);
			$this->db->where('id_jadwal_venue', $this->input->post('id_jadwal_venue'));
			return $this->db->update('jadwal_venue');
		}

		public function book(){

			$harga_booking = $this->input->post('durasi_booking') * $this->input->post('harga_sewa_venue');

			$data = array(
				'id_pengunjung' => $this->session->userdata('user_id'),
				'id_venue' => $this->input->post('id_venue'),
				'id_jadwal_venue' => $this->input->post('id_jadwal_venue'),
				'harga_booking' => $harga_booking,
				'tanggal_booking' => $this->input->post('tanggal_booking'),
				'jam_booking' => $this->input->post('jam_booking'),
				'durasi_booking' => $this->input->post('durasi_booking')
				);
			//Insert the data to db
			return $this->db->insert('booking', $data);
		}

		public function upload_bukti_pembayaran($bukti_pembayaran){
			$this->db->set('bukti_pembayaran', $bukti_pembayaran);
			$this->db->where('id_booking', $this->input->post('id_booking'));
			return $this->db->update('booking');
		}

		public function delete_booking($id_booking){
			//Get the id, and deletes it
			$this->db->where('id_booking', $id_booking);
			$this->db->delete('booking');
			return true;
		}

		public function update_status_lobby($id_booking){
			$this->db->set('status_lobby',1);
			$this->db->where('id_booking', $id_booking);
			return $this->db->update('booking');
		}

		public function cancel_status_lobby($id_booking){
			$this->db->set('status_lobby',0);
			$this->db->where('id_booking', $id_booking);
			return $this->db->update('booking');
		}

		public function confirm_booking($id_booking){
			$this->db->set('konfirmasi', 1);
			$this->db->where('id_booking', $id_booking);
			return $this->db->update('booking');
		}

		public function finish_booking($id_booking){
			$this->db->set('konfirmasi', 2);
			$this->db->where('id_booking', $id_booking);
			return $this->db->update('booking');
		}

		

	}