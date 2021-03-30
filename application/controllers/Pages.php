<?php
	class Pages extends CI_Controller{
		public function view($page = 'homepage'){
			if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
				show_404();
			}

			$data['title'] = "Home";
			$data['venues'] = $this->venue_model->get_venues();
			$data['user'] = $this->user_model->get_users($this->session->userdata('user_id'));

			$this->load->view('templates/header');
			$this->load->view('pages/'.$page, $data);
			$this->load->view('templates/footer');
		}
	}