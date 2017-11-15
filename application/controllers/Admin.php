<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller 
{
	public $amenities;

	public $page;

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('googlemaps','session','form_validation','pagination'));

		$this->load->helper(array('menus','text','url'));

		if($this->session->has_userdata('admin_login')==FALSE) 
			redirect(site_url());

		$this->amenities = array('Wifi','AC','TV kabel','Telepon','Shower Panas & Dingin','Smooking Area');

		$this->load->model('madmin');

		$this->page = $this->input->get('page');
	}

	public function index()
	{
		$this->data = array(
			'title' => "Home Administrator"
		);	

		$this->load->view('main-admin', $this->data);
	}

	public function addhotel()
	{	
		$this->data['title'] = "Tambah Hotel";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('price', 'Harga', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->createHotel();

			redirect(current_url());
		}

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = '-2.1232247,106.1058501';
		$config['zoom'] = '12';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = '-2.125386,106.1125363';
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('add-hotel', $this->data);
	}

	public function hotel()
	{
		$config['base_url'] = site_url("admin/hotel?per_page={$this->input->get('per_page')}&query={$this->input->get('q')}");

		$config['per_page'] = 10;
		$config['total_rows'] = $this->madmin->getAllHotel(null, null, 'num');
        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = "&larr; Pertama";
        $config['first_tag_open'] = '<li class="">';
        $config['first_tag_close'] = '</li>';
        $config['last_link'] = "Terakhir &raquo";
        $config['last_tag_open'] = '<li class="">';
        $config['last_tag_close'] = '</li>';
        $config['next_link'] = "Selanjutnya &rarr;";
        $config['next_tag_open'] = '<li class="">';
        $config['next_tag_close'] = '</li>';
        $config['prev_link'] = "&larr; Sebelumnya"; 
        $config['prev_tag_open'] = '<li class="">';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li class="">';
        $config['num_tag_close'] = '</li>'; 
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
		
		$this->pagination->initialize($config);
		
		
		$this->data = array(
			'title' => "Data Hotel",
			'hotel' => $this->madmin->getAllHotel($config['per_page'], $this->input->get('page'), 'result')
		);

		$this->load->view('data-hotel', $this->data);
	}

	public function updatehotel($param = 0)
	{
		$this->data['title'] = "Update Hotel";

		$this->form_validation->set_rules('name', 'Nama', 'trim|required');
		$this->form_validation->set_rules('price', 'Harga', 'trim|required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'trim|required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'trim|required');
		$this->form_validation->set_rules('description', 'Deskripsi', 'trim|required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');

		if ($this->form_validation->run() == TRUE)
		{
			$this->madmin->updateHotel($param);

			redirect(current_url());
		}

		$this->data['hotel'] = $this->madmin->getHotel($param);

		$config['map_div_id'] = "map-add";
		$config['map_height'] = "250px";
		$config['center'] = $this->data['hotel']->latitude.','.$this->data['hotel']->longitude;
		$config['zoom'] = '14';
		$config['map_height'] = '300px;';
		$this->googlemaps->initialize($config);

		$marker = array();
		$marker['position'] = $this->data['hotel']->latitude.','.$this->data['hotel']->longitude;
		$marker['draggable'] = true;
		$marker['ondragend'] = 'setMapToForm(event.latLng.lat(), event.latLng.lng());';
		$this->googlemaps->add_marker($marker);
		$this->data['map'] = $this->googlemaps->create_map();

		$this->load->view('update-hotel', $this->data);
	}

	public function deletehotele($param = 0)
	{
		$this->madmin->deleteHotel($param);

		redirect('admin/hotel');
	}

	public function account()
	{
		$this->data = array(
			'title' => "Pengaturan Akun",
			'user' => $this->madmin->getAccount()
		);	
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('name', 'Nama Lengkap', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|valid_email|required');
		$this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|min_length[6]|max_length[12]');
		$this->form_validation->set_rules('old_pass', 'Password Lama', 'trim|required|callback_validate_password');
		if ($this->form_validation->run() == TRUE) 
		{
			$this->madmin->setAccount();
			
			redirect(current_url());
		}
		$this->load->view('account', $this->data);
	}

	/**
	 * Cek kebenaran password
	 *
	 * @return Boolean
	 **/
	public function validate_password()
	{
		$user = $this->madmin->getAccount();

		if(password_verify($this->input->post('old_pass'), $user->password))
		{
			return true;
		} else {
			$this->form_validation->set_message('validate_password', 'Password lama anda tidak cocok!');
			return false;
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */