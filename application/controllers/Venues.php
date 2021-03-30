<?php
	class Venues extends CI_Controller{
		public function index(){
			$data['title'] = 'Daftar Venue Futsal';

			$data['venues'] = $this->venue_model->get_venues();

			$this->load->view('templates/header');
			$this->load->view('venues/index', $data);
			$this->load->view('templates/footer');
		}

		public function view($id = NULL){
			$data['venue'] = $this->venue_model->get_venues($id);

			if(empty($data['venue'])){
				show_404();
			}

			$data['title'] = $data['venue']['nama_venue'];

			$this->load->view('templates/header');
			$this->load->view('venues/view',$data);
			$this->load->view('templates/footer');

		}

		public function jadwal($id = NULL){
			$data['venue'] = $this->venue_model->get_venues($id);

			$tanggal = $this->input->post('date');

			$data['tanggal'] = $this->input->post('date');

			$data['jadwals'] = $this->venue_model->get_jadwal($id, $tanggal);

			$data['title'] = $data['venue']['nama_venue'];

			$this->load->view('templates/header');
			$this->load->view('venues/jadwal',$data);
			$this->load->view('templates/footer');
		}

		//Nanti parameter ditambah id user yg sedang log in
		public function confirmBook($id_venue){

			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			$data['user'] = $this->user_model->get_user($this->session->userdata('user_id'));

			$data['venue'] = $this->venue_model->get_venues($id_venue);
			$data['book_time'] = $this->input->post();

			$data['next_book_time'] = $this->venue_model->get_next_jadwal($id_venue, $this->input->post('id_jadwal_venue'));

			$this->load->view('templates/header');
			$this->load->view('venues/confirmBook',$data);
			$this->load->view('templates/footer');
		}

		public function rating(){
			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			$data['title'] = 'Give your rating!';
			$data['booking'] = $this->booking_model->get_bookings_by_user_id($this->session->userdata('user_id'));
			$booking = $this->booking_model->get_bookings_by_user_id($this->session->userdata('user_id'));
			$data['venue'] = $this->venue_model->get_venues($booking['id_venue']);

			$this->load->view('templates/header');
			$this->load->view('venues/rating',$data);
			$this->load->view('templates/footer');
		}

		public function updateRating(){
			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			$booking = $this->booking_model->get_bookings($this->input->post('id_booking'));

			if($this->session->userdata('user_id') != $booking['id_pengunjung']){
				redirect('venues/index');
			}

			
			$this->venue_model->update_rating($booking['id_venue']);
			$this->booking_model->delete_booking($booking['id_booking']);
			$this->user_model->update_current_booking();


			redirect('pages/view');
		}
	}