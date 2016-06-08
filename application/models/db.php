<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_login extends CI_model {

	public function getlogin($id, $pass)
	{
		$password=md5($pass);
		$this->db->where('id', $id);
		$this->db->where('password', $password);
		$query =$this->db->get('user ');

		if($query->num_rows()>0)
		{
			foreach ($query->result() as $row) 
			{
				$sess = array('id' => $row->id,
							  'nama' => $row->nama,
							  'tipe' => $row->tipe);
				$this->session->set_userdata($sess);

				redirect('home');
				
			}
		}
		else
		{
			$this->session->set_flashdata('info', 'ID atau Password Anda Salah');
			redirect ('login');
		}
	}
	
}
