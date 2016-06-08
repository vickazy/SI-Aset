<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_persetujuan extends CI_Model {

	
	public function berdasarkanId($key)
	{
		
		$this->db->select('*');
		$this->db->from('pengusulan');
		$this->db->where('id_usul', $key);
		return $this->db->get();
	}
	public function ambilsemua()
	{
		$this->db->where('status', 1);
		return $this->db->get('pengusulan');
		
	}
	public function setujui($key)
	{ 
		
		$this->db->where('id_usul',$key);
		return $this->db->update('pengusulan', ['status'=>1]);
		return $this->db->update('pengusulan', ['waktu_proses_usul'=>DATE_ADD(NOW())]);
		
		

	}
	public function tolak($key)
	{ 
		
		$this->db->where('id_usul',$key);
		return $this->db->update('pengusulan', ['status'=>2]);
		return $this->db->update('pengusulan', ['waktu_proses_usul'=>DATE_ADD(NOW())]);
		
		

	}
	public function belumDisetujui()
	{
		
		$this->db->select('*');
		$this->db->from('pengusulan');
		if ($this->session->userdata('tipe') == 'admin')
		{
		$this->db->where ('status', 0 );
		}
		else 
		{
			$this->db->where ('status', 1 );
			$this->db->where ('ceknotif', 1 );
			$this->db->where('id_user',  $this->session->userdata('id'));	
		
		
		}
		return $this->db->get();
	}
	public function sudahDisetujui($key)
	{
		$this->db->select('*');
		$this->db->from('pengusulan');
		$this->db->where('id_usul',$key);
		return $this->db->update('pengusulan', ['ceknotif'=>2]);

	}
	public function lihatpersetujuan()
	{
		$this->db->select('*');
		$this->db->from('pengusulan');
		$this->db->where('id_user',  $this->session->userdata('id'));	
		
		return $this->db->get();

	}
	
}
