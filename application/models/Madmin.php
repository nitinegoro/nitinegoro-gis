<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Madmin extends CI_Model 
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->library(array('upload','session'));
	}
	
	public function createHotel()
	{
		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = ""; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}

		$object = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('alamat'),
			'photo' => $photo,
			'amenities' => @implode(", ", @$this->input->post('amenities')),
			'description' => $this->input->post('description')
		);

		$this->db->insert('hotel', $object);

		$IDHotel = $this->db->insert_id();

		if( is_array($this->input->post('categories')) )
		{
			$this->db->where('hotel_id', $IDHotel)
					 ->where_not_in('category_id', $this->input->post('categories'))
					 ->delete('hotelcategories');
			foreach ($this->input->post('categories') as $key => $value) 
			{
				$this->db->insert('hotelcategories', array(
					'hotel_id' => $IDHotel,
					'category_id' => $value
				));
			}
		}

		$this->session->set_flashdata('message', "Data Hotel berhasil ditambahkan");
	}

	public function getHotel($param = 0)
	{
		return $this->db->get_where('hotel', array('ID' => $param) )->row();
	}

	public function categoryHotel($hotel = 0, $category = 0)
	{
		return $this->db->get_where('hotelcategories', array('hotel_id' => $hotel, 'category_id' => $category) )->row();
	}

	public function updateHotel($param = 0)
	{
		$hotel = $this->getHotel($param);

		$config['upload_path'] = './public/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_width']  = 1024*3;
		$config['max_height']  = 768*3;
		
		$this->upload->initialize($config);

		if ( ! $this->upload->do_upload('photo'))
		{
			$photo = $hotel->photo; 
			$this->session->set_flashdata('message', $this->upload->display_errors());
		} else{
			$photo = $this->upload->file_name;
		}

		$object = array(
			'name' => $this->input->post('name'),
			'price' => $this->input->post('price'),
			'latitude' => $this->input->post('latitude'),
			'longitude' => $this->input->post('longitude'),
			'address' => $this->input->post('alamat'),
			'photo' => $photo,
			'amenities' => @implode(", ", @$this->input->post('amenities')),
			'description' => $this->input->post('description')
		);

		$this->db->update('hotel', $object, array('ID' => $param));

		if( is_array($this->input->post('categories')) )
		{
			$this->db->where('hotel_id', $param)
					 ->where_not_in('category_id', $this->input->post('categories'))
					 ->delete('hotelcategories');
			foreach ($this->input->post('categories') as $key => $value) 
			{
				$this->db->insert('hotelcategories', array(
					'hotel_id' => $param,
					'category_id' => $value
				));
			}
		} else {
			$this->db->where('hotel_id', $param)
					 ->where_not_in('category_id', $this->input->post('categories'))
					 ->delete('hotelcategories');
		}

		$this->session->set_flashdata('message', "Perubahan berhasil disimpan");
	}

	public function getAllHotel($limit = 10, $offset = 0, $type = 'result')
	{
		if( $this->input->get('q') != '')
			$this->db->like('name', $this->input->get('q'));

		$this->db->order_by('ID', 'desc');

		if($type == 'num')
		{
			return $this->db->get('hotel')->num_rows();
		} else {
			return $this->db->get('hotel', $limit, $offset)->result();
		}
	}

	public function deleteHotel($param = 0)
	{
		$hotel = $this->getHotel($param);

		if( $hotel->photo != '')
			@unlink(".pulbic/image/{$hotel->photo}");

		$this->db->delete('hotel', array('ID' => $param));
		$this->db->delete('hotelcategories', array('hotel_id' => $param));

		$this->session->set_flashdata('message', "Data Hotel berhasil dihapus");
	}

	public function setAccount()
	{
		$user = $this->getAccount();

		$object = array(
			'fullname' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email')
		);

		if( $this->input->post('new_pass') != '')
			$object['password'] = password_hash($this->input->post('new_pass'), PASSWORD_DEFAULT);
		
		$this->db->update('users', $object, array('ID' => $user->ID));

		$this->session->set_flashdata('message', "Perubahan berhasil disimpan.");
	}

	public function getAccount()
	{
		return $this->db->get_where('users', array('ID' => $this->session->userdata('user')->ID) )->row();
	}
}

/* End of file Madmin.php */
/* Location: ./application/models/Madmin.php */