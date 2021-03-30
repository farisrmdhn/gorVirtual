<?php
class Admins extends CI_Controller{
	public function login(){
		$data['title'] = 'Sign In';

		$this->form_validation->set_rules('username_admin', 'Username', 'required');
		$this->form_validation->set_rules('password_admin', 'Password', 'required');

		if($this->form_validation->run() === FALSE){
			$this->load->view('admins/login', $data);
		}else{
				//Get Username
			$username = $this->input->post('username_admin');
				//Get and encrypt the password
			$password = md5($this->input->post('password_admin'));
				//Login User
			$admin_id = $this->admin_model->login($username, $password);

			if($admin_id){
					//Create session
				$admin_data = array(
					'admin_id' => $admin_id,
					'username_admin' => $username,
					'logged_inadmin' => true
				);

				$this->session->set_userdata($admin_data);

					//Set Message
				$this->session->set_flashdata('admin_loggedin', 'You are now logged in');

				redirect('admins/dashboard');
			} else{
					//Set Message
				$this->session->set_flashdata('login_failed', 'Login is invalid');

				redirect('admins/login');
			}


		}
	}

	public function dashboard(){
		if(!$this->session->userdata('logged_inadmin')){
			redirect('pages/view');
		}

		$data['bookings'] = $this->booking_model->get_all_bookings();
		$admin = $this->admin_model->get_admin($this->session->userdata('admin_id'));
		$data['jadwal_venues'] = $this->venue_model->get_jadwal($admin['id_venue'], date('Y-m-d',strtotime("-1 days")));

		$this->load->view('templates/headerAdmin');
		$this->load->view('admins/dashboard', $data);
		$this->load->view('templates/footerAdmin');
	}

	public function users(){
		if(!$this->session->userdata('logged_inadmin')){
			redirect('pages/view');
		}
		$data['users'] = $this->user_model->get_all_users();
		$this->load->view('templates/headerAdmin');
		$this->load->view('admins/users', $data);
		$this->load->view('templates/footerAdmin');
	}


	public function venues(){
		if(!$this->session->userdata('logged_inadmin')){
			redirect('pages/view');
		}
		$data['venues'] = $this->venue_model->get_venues();
		$this->load->view('templates/headerAdmin');
		$this->load->view('admins/venues', $data);
		$this->load->view('templates/footerAdmin');
	}

	public function bookings(){
		if(!$this->session->userdata('logged_inadmin')){
			redirect('pages/view');
		}
		$data['bookings'] = $this->booking_model->get_all_bookings();

		$this->load->view('templates/headerAdmin');
		$this->load->view('admins/bookings', $data);
		$this->load->view('templates/footerAdmin');
	}

	public function confirmBook($id_booking){

		$booking = $this->booking_model->get_bookings($id_booking);

		if(!$this->session->userdata('logged_inadmin')){
			redirect('pages/view');
		}

		if($id_booking['bukti_pembayaran'] == NULL){
			redirect('admins/bookings');
		}

		$this->booking_model->confirm_booking($id_booking);
		redirect('admins/bookings');
	}

	public function cancelBook(){
		$booking = $this->booking_model->get_bookings($this->input->post('id_booking'));
		$admin = $this->admin_model->get_admin($this->session->userdata('admin_id'));
		if(!$this->session->userdata('logged_inadmin')){
			redirect('pages/view');
		}

		if($booking['id_venue'] != $admin['id_venue']){
			redirect('admins/bookings');
		}

		$next_book_time = $this->venue_model->get_next_jadwal($this->input->post('id_venue') , $this->input->post('id_jadwal_venue'));
		$next_book_time_id = $next_book_time['id_jadwal_venue'];
		$lobby = $this->lobby_model->get_lobby_by_booking($this->input->post('id_booking'));

		$this->booking_model->delete_booking($this->input->post('id_booking'));
		$this->booking_model->cancelJadwalBooking($next_book_time_id);
		$this->user_model->update_current_booking_admin($this->input->post('id_pengunjung'));
		$this->lobby_model->delete_lobby($lobby['id_lobby']);

		redirect('admins/bookings');
	}

	public function finishBook($id_booking){
		$booking = $this->booking_model->get_bookings($id_booking);
		$admin = $this->admin_model->get_admin($this->session->userdata('admin_id'));
		if(!$this->session->userdata('logged_inadmin')){
			redirect('pages/view');
		}

		if($booking['id_venue'] != $admin['id_venue']){
			redirect('admins/bookings');
		}

		$lobby = $this->lobby_model->get_lobby_by_booking($id_booking);

		$this->booking_model->finish_booking($id_booking);
		$this->lobby_model->delete_lobby($lobby['id_lobby']);
		redirect('admins/bookings');
	}

	public function logout(){
			// Unset user data
		$this->session->unset_userdata('logged_inadmin');
		$this->session->unset_userdata('username_admin');
		$this->session->unset_userdata('admin_id');

			//Set Message
		$this->session->set_flashdata('admin_loggedout', 'You are now logged out');

		redirect('pages/view');
	}

	public function updateJadwal(){
		if(!$this->session->userdata('logged_inadmin')){
			redirect('pages/view');
		}

		$admin = $this->admin_model->get_admin($this->session->userdata('admin_id'));
		$this->admin_model->update_jadwal_venue($admin['id_venue']);
		redirect('admins/dashboard');
	}
}