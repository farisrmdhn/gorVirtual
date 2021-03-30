<?php
	class Lobbies extends CI_Controller{

		public function index(){
			$data['title'] = 'Daftar Lobby';
			$data['lobbies'] = $this->lobby_model->get_lobbies();

			$this->load->view('templates/header');
			$this->load->view('lobbies/index',$data);
			$this->load->view('templates/footer');
		}

		public function view($id_lobby){
			$data['lobby'] = $this->lobby_model->get_lobbies($id_lobby);

			$this->load->view('templates/header');
			$this->load->view('lobbies/view',$data);
			$this->load->view('templates/footer');
		}

		public function create($id_booking){

			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			$data['title'] = 'Create Lobby';
			$data['id_booking'] = $id_booking;

			$this->form_validation->set_rules('nama_lobby', 'Lobby Name', 'required');
			$this->form_validation->set_rules('deskripsi_lobby', 'Lobby Description', 'required');

			//If the rules didn't met
			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header');
				$this->load->view('lobbies/create',$data);
				$this->load->view('templates/footer');
			} else{
				//Upload the startup's data from form to db via model
				//Nanti ditambah id user
				$this->lobby_model->create_lobby($id_booking);
				$this->booking_model->update_status_lobby($id_booking);

				redirect('lobbies/index');
			}

		}

		public function join($id_lobby){

			$lobby = $this->lobby_model->get_lobbies($id_lobby);
			$user = $this->user_model->get_user($this->session->userdata('user_id'));

			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			if($this->session->userdata('user_id') == $lobby['id_pengunjung_home']){
				//set flashdata
				redirect('lobbies/index');
			}

			// tambah kirim email ke lobby master
			$this->lobby_model->join_lobby($id_lobby);

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
			$this->email->to($lobby['email_pengunjung']);

			$this->email->subject('Someone has joined your lobby');
			$this->email->message('Hi, '.$user['nama_user'].'has joined your lobby! Contact email = '.$user['email_pengunjung'].'telephone = '.$user['notelp_pengunjung'].' Thank you!');

			$this->email->send();


			redirect('lobbies');
		}

		public function cancelJoinLobby($id_lobby){
			$lobby = $this->lobby_model->get_lobbies($id_lobby);
			if($this->session->userdata('logged_in') != true){
				redirect('users/login');
			}

			if($this->session->userdata('user_id') != $lobby['id_pengunjung_away']){
				//set flashdata
				redirect('lobbies/index');
			}
			// tambah kirim email ke lobby master
			$this->lobby_model->cancel($id_lobby);
			redirect('lobbies/index');
		}

		public function edit($id_lobby){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}
			$data['lobby'] = $this->lobby_model->get_lobbies($id_lobby);

			$this->form_validation->set_rules('nama_lobby', 'Lobby Name', 'required');
			$this->form_validation->set_rules('deskripsi_lobby', 'Lobby Description', 'required');

			// Check User
			if($this->session->userdata('user_id') != $this->lobby_model->get_lobbies($id_lobby)['id_pengunjung_home']){
				redirect('lobbies/index');
			}

			$data['title'] = 'Edit Lobby';

			$this->load->view('templates/header');
			$this->load->view('lobbies/edit',$data);
			$this->load->view('templates/footer');
		}

		public function update(){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->lobby_model->update_lobby();

			//Set Message
			$this->session->set_flashdata('post_updated', 'Your post has been updated');

			redirect('lobbies/view/'.$this->input->post('id_lobby'));
		}

		public function delete($id_lobby, $id_booking){
			//Check login
			if(!$this->session->userdata('logged_in')){
				redirect('users/login');
			}

			$this->lobby_model->delete_lobby($id_lobby);
			$this->booking_model->cancel_status_lobby($id_booking);

			//Set Message
			//$this->session->set_flashdata('post_deleted', 'Your post has been deleted');

			redirect('lobbies');
		}
	}