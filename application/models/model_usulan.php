<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_usulan extends CI_Model {

	
	public function getdata($key)
	{
		$this->db->where('id_usul', $key);
		$hasil = $this->db->get('pengusulan');
		return $hasil;

	}
	
	public function getinsert($data)
	{
		
		$this->db->insert('pengusulan',$data);
	}
	
	
}
