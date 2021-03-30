<?php
	class Bookings extends CI_Controller{

		public function index(){
			$data['title'] = 'My Bookings';
			$data['booking'] = $this->booking_model->get_bookings();
			$data['user'] = $this->user_model->get_user($this->session->userdata('user_id'));

			$this->load->view('templates/header');
			$this->load->view('bookings/index', $data);
			$this->load->view('templates/footer');
		}

		public function book(){

			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			$user = $this->user_model->get_user($this->session->userdata('user_id'));

			if($user['current_booking'] == 1){
				redirect('venues');
			}

			$data['next_book_time'] = $this->venue_model->get_next_jadwal($this->input->post('id_venue') , $this->input->post('id_jadwal_venue'));
			//to booking_model -> book(idvenue, idpengunjung)
			$this->booking_model->book();
			$this->booking_model->updateJadwalBooking();
			$this->user_model->update_current_booking();

			redirect('bookings/checkout/');
		}

		public function checkout(){
			$data['booking'] = $this->booking_model->get_bookings();

			$this->load->view('templates/header');
			$this->load->view('bookings/checkout', $data);
			$this->load->view('templates/footer');
		}

		public function uploadBuktiPembayaran($id_booking){

			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			$data['title'] = 'Upload Bukti Pembayaran';
			$data['booking'] = $this->booking_model->get_bookings();

			$this->load->view('templates/header');
			$this->load->view('bookings/uploadBuktiPembayaran', $data);
			$this->load->view('templates/footer');
		}

		public function upload(){

			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			//upload file 
			$config['upload_path'] = './assets/buktiPembayaran';
			$config['allowed_types'] = 'jpg|png|jpeg|';
			$config['max_size'] = '10000';
			$config['file_name'] = url_title($_FILES['bukti_pembayaran']['name'],'-', TRUE);

			$this->load->library('upload', $config);

			//If the image falied to upload, replace with noimage.jpg
			if(!$this->upload->do_upload('bukti_pembayaran')){
				$error = array('error' => $this->upload->display_errors());
				$bukti_pembayaran = 'noimage.jpg';
			} else {
				$data = array('upload_data' => $this->upload->data());
				$bukti_pembayaran = $this->upload->data('file_name');
			}

			//Upload the startup's data from form to db via model
			$this->booking_model->upload_bukti_pembayaran($bukti_pembayaran);

			redirect('bookings/index');
		}

		public function delete(){

			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			$data['booking'] = $this->booking_model->get_bookings($this->input->post('id_booking'));
			$next_book_time = $this->venue_model->get_next_jadwal($this->input->post('id_venue') , $this->input->post('id_jadwal_venue'));
			$next_book_time_id = $next_book_time['id_jadwal_venue'];
			$lobby = $this->lobby_model->get_lobby_by_booking($this->input->post('id_booking'));

			$this->booking_model->delete_booking($this->input->post('id_booking'));
			$this->booking_model->cancelJadwalBooking($next_book_time_id);
			$this->user_model->update_current_booking();
			$this->lobby_model->delete_lobby($lobby['id_lobby']);
			redirect('bookings');
		}
	}