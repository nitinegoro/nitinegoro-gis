<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}

	public function index()
	{
		
	}
	public function auth()
	{
		$userLogin = $this->getUserLogin($this->input->post('identity'));

		if( $userLogin ) 
		{
			if ( password_verify($this->input->post('password'), $userLogin->password) ) 
			{
				$user_session = array(
				 	'admin_login' => TRUE,
				 	'ID' => $userLogin->ID,
				 	'user' => $userLogin
				);	

				$this->session->set_userdata( $user_session );

				redirect(base_url('admin'));
			} else {
				$this->session->set_flashdata('message', 'Kombinasi Username/E-Mail dan Password tidak cocok.');
				redirect(base_url());
			}
		} else {
			$this->session->set_flashdata('message', 'Mohon Masukkan Username/E-Mail dan Password.');
			redirect(base_url());
		}
	}

	public function getUserLogin($identity = '')
	{
		if (filter_var($identity, FILTER_VALIDATE_EMAIL)) 
		{
			return $this->db->get_where('users', array('email' => $identity))->row();
		} else {
			return $this->db->get_where('users', array('username' => $identity))->row();
		}
	}

	public function signout()
	{
		$this->session->set_flashdata('message', 'Anda berhasil keluar.');
		$this->session->sess_destroy();

		redirect(base_url());
	}
}

/* End of file User.php */
/* Location: ./application/controllers/User.php */