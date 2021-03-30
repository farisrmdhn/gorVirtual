<?php
	class User_model extends CI_Model{
		public function __construct(){
			$this->load->database();
		}
		public function register($enc_password){
			// User data array
			$data = array(
				'nama_pengunjung' => $this->input->post('nama_pengunjung'),
				'email_pengunjung' => $this->input->post('email_pengunjung'),
				'username_pengunjung' => $this->input->post('username_pengunjung'),
				'password_pengunjung' => $enc_password,
				'notelp_pengunjung' => $this->input->post('notelp_pengunjung')
			);

			//Insert user
			return $this->db->insert('pengunjung', $data);
		}

		public function forget($new_password, $id_pengunjung){
				// User data array
			$data = array(
				'password_pengunjung' => $new_password
			);
				//Edit Password
			if ($this->db->where('id_pengunjung', $id_pengunjung)){
				return $this->db->update('pengunjung', $data);
			}
		}

		public function login($username, $password){
				//Validate
			$this->db->where('username_pengunjung', $username);
			$this->db->where('password_pengunjung', $password);

			$result = $this->db->get('pengunjung');

			if($result->num_rows() == 1){
				return $result->row(0)->id_pengunjung;
			} else{
				return false;
			}
		}

		public function get_user($id){
			$query = $this->db->get_where('pengunjung', array('id_pengunjung' => $id));
			return $query->row_array();
		}

		public function get_all_users(){
			$this->db->select('*');
			$this->db->from('pengunjung');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function update_current_booking(){
			$this->db->where('id_pengunjung', $this->session->userdata('user_id'));
			$query = $this->db->get('pengunjung');
			$result = $query->row_array();
			if($result['current_booking'] == 0){
				$this->db->set('current_booking', 1);
				$this->db->where('id_pengunjung', $this->session->userdata('user_id'));
				$this->db->update('pengunjung');
			}else{
				$this->db->set('current_booking', 0);
				$this->db->where('id_pengunjung', $this->session->userdata('user_id'));
				$this->db->update('pengunjung');
			}
			return true;
		}

		public function update_current_booking_admin($id_pengunjung){
			$this->db->where('id_pengunjung', $id_pengunjung);
			$query = $this->db->get('pengunjung');
			$result = $query->row_array();
			if($result['current_booking'] == 0){
				$this->db->set('current_booking', 1);
				$this->db->where('id_pengunjung', $id_pengunjung);
				$this->db->update('pengunjung');
			}else{
				$this->db->set('current_booking', 0);
				$this->db->where('id_pengunjung', $id_pengunjung);
				$this->db->update('pengunjung');
			}
			return true;
		}

		public function get_users($user_id = FALSE){
			if ($user_id === FALSE) {
				$this->db->order_by('nama_pengunjung');
				$query = $this->db->get('pengunjung');
				return $query->result_array();
			}
			$query = $this->db->get_where('pengunjung', array('id_pengunjung' => $user_id));
			return $query->row_array();
		}

		//Check username exist

		public function check_username_exist($username){
			$query = $this->db->get_where('pengunjung', array('username_pengunjung' => $username));
			if(empty($query->row_array())){
				return true;
			} else{
				return false;
			}
		}

		//Check email exist

		public function check_email_exist($email){
			$query = $this->db->get_where('pengunjung', array('email_pengunjung' => $email));
			if(empty($query->row_array())){
				return true;
			} else{
				return false;
			}
		}

		public function check_email_telephone(){
			$this->db->where('email_pengunjung', $this->input->post('email_pengunjung'));
			$this->db->where('notelp_pengunjung', $this->input->post('notelp_pengunjung'));
			$result = $this->db->get('pengunjung');

			if($result->num_rows() == 1){
				$pengunjung = $result->row_array();
				return $pengunjung['id_pengunjung'];
			} else{
				return false;
			}
		}

		public function update_user($enc_password){

			$data = array(
				'nama_pengunjung' => $this->input->post('nama_pengunjung'),
				'email_pengunjung' => $this->input->post('email_pengunjung'),
				'username_pengunjung' => $this->input->post('username_pengunjung'),
				'password_pengunjung' => $enc_password,
				'notelp_pengunjung' => $this->input->post('notelp_pengunjung')
			);

			$this->db->where('id_pengunjung', $this->input->post('id_pengunjung'));

			return $this->db->update('pengunjung', $data);
		}
	}