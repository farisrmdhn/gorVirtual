<?php
	class Users extends CI_Controller{
		public function register(){
			$data['title'] = 'Sign Up';

			$this->form_validation->set_rules('nama_pengunjung', 'Name', 'required');
			$this->form_validation->set_rules('email_pengunjung', 'Email', 'required|callback_check_email_exist');
			$this->form_validation->set_rules('username_pengunjung', 'Username', 'required|callback_check_username_exist');
			$this->form_validation->set_rules('notelp_pengunjung', 'Nomor Telefon', 'required');
			$this->form_validation->set_rules('password_pengunjung', 'Password', 'required');
			$this->form_validation->set_rules('password2_pengunjung', 'Confirm Password', 'matches[password_pengunjung]');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			}else{

				// //upload image
				// $config['upload_path'] = 'C:\xampp\htdocs\smartup\assets\founders';
				// $config['allowed_types'] = 'jpg|png|jpeg';
				// $config['max_size'] = '10000';

				// $this->load->library('upload', $config);

				// //If the image falied to upload, replace with noimage.jpg
				// if(!$this->upload->do_upload('avatar')){
				// 	$error = array('error' => $this->upload->display_errors());
				// 	$avatar = 'noimage.jpg';
				// } else {
				// 	$data = array('upload_data' => $this->upload->data());
				// 	$avatar = $_FILES['avatar']['name'];
				// }

				//Get Uname
				$username = $this->input->post('username_pengunjung');
				// Encrypt password
				$enc_password = md5($this->input->post('password_pengunjung'));

				$this->user_model->register($enc_password);

				//Set Message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('pages/view');
			}
		}

		public function login(){
			$data['title'] = 'Sign In';

			$this->form_validation->set_rules('username_pengunjung', 'Username', 'required');
			$this->form_validation->set_rules('password_pengunjung', 'Password', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			}else{
					//Get Username
				$username = $this->input->post('username_pengunjung');
					//Get and encrypt the password
				$password = md5($this->input->post('password_pengunjung'));
					//Login User
				$user_id = $this->user_model->login($username, $password);

				if($user_id){
					//Create session
					$user_data = array(
						'user_id' => $user_id,
						'username_pengunjung' => $username,
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);

						//Set Message
					$this->session->set_flashdata('user_loggedin', 'You are now logged in');

					//if abis booking dan baru lewat kasih rating
					//id_venue yang mau dikasih rating
					$id_venue = $this->booking_model->get_bookings_by_user_id($user_id);
					if($id_venue != false){
						redirect('venues/rating');
					}

					redirect('pages/view');
				} else{
					//Set Message
					$this->session->set_flashdata('login_failed', 'Login is invalid');

					redirect('users/login');
				}


			}
		}

		public function edit($id_pengunjung){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			$data['user'] = $this->user_model->get_user($id_pengunjung);

			$this->form_validation->set_rules('nama_pengunjung', 'Name', 'required');
			$this->form_validation->set_rules('email_pengunjung', 'Email', 'required|callback_check_email_exist');
			$this->form_validation->set_rules('username_pengunjung', 'Username', 'required|callback_check_username_exist');
			$this->form_validation->set_rules('notelp_pengunjung', 'Nomor Telefon', 'required');
			$this->form_validation->set_rules('password2_pengunjung', 'Confirm Password', 'matches[password_pengunjung]');

			// Check User
			if($this->session->userdata('user_id') != $this->user_model->get_user($id_pengunjung)['id_pengunjung']){
				redirect('users/profile');
			}

			if(empty($data['user'])){
				show_404();
			}

			$data['title'] = 'Edit Profile';

			$this->load->view('templates/header');
			$this->load->view('users/edit',$data);
			$this->load->view('templates/footer');
		}

		public function update(){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$enc_password = $this->input->post('default_password');

			if($this->input->post('password_pengunjung') != NULL){
				$enc_password = md5($this->input->post('password_pengunjung'));
			}

			$this->user_model->update_user($enc_password);

			//Set Message
			$this->session->set_flashdata('post_updated', 'Your post has been updated');

			redirect('users/profile');
		}

		public function profile(){

			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			$data['pengunjung'] = $this->user_model->get_users($this->session->userdata('user_id'));
			
			$this->load->view('templates/header');
			$this->load->view('users/profile', $data);
			$this->load->view('templates/footer');
		}

		public function forget($user_id = NULL){

			$this->form_validation->set_rules('email_pengunjung', 'Email', 'required');
			$this->form_validation->set_rules('notelp_pengunjung', 'Telephone Number', 'required');

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('users/forget');
				$this->load->view('templates/footer');
			}else{

				$user = $this->user_model->get_user($this->session->userdata('user_id'));

				if(!$this->user_model->check_email_telephone()){
					redirect('users/forget');
				}

				$unenc_password = mt_rand(100000, 999999);

				$new_password = md5($unenc_password);

				$id_pengunjung = $this->user_model->check_email_telephone();

				$this->user_model->forget($new_password, $id_pengunjung);

				$config = Array(
				    'protocol' => 'smtp',
				    'smtp_host' => 'ssl://smtp.googlemail.com',
				    'smtp_port' => 465,
				    'smtp_user' => 'gorvirtualsemarang@gmail.com',
				    'smtp_pass' => 'HaekalGanteng100',
				    'mailtype'  => 'html', 
				    'charset'   => 'iso-8859-1'
				);
				$this->load->library('email', $config);
				$this->email->from('gorvirtualsemarang@gmail.com', 'gorVirtual');
				$this->email->to($this->input->post('email_pengunjung'));

				$this->email->subject('Reset Password');
				$this->email->message("Hi, we've reset your password! Your new password is".$unenc_password);

				$this->email->send();

					//Set Message
				$this->session->set_flashdata('user_registered', 'You are now registered and can log in');

				redirect('pages/view');
			}
		}

		public function logout(){
				// Unset user data
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('username');
			$this->session->unset_userdata('user_id');

				//Set Message
			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');
		}
		
		//check if username exist
		public function check_username_exist($username){
			$this->form_validation->set_message('check_username_exist', 'That username is already taken. Please choose a diffrent one');

			if($this->user_model->check_username_exist($username)){
				return true;
			} else{
				return false;
			}
		}

		//check if email exist
		public function check_email_exist($email){
			$this->form_validation->set_message('check_email_exist', 'That email is already taken. Please choose a diffrent one');

			if($this->user_model->check_email_exist($email)){
				return true;
			} else{
				return false;
			}
		}
	}