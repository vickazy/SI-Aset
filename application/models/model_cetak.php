<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_cetak extends CI_Model {

	public function cetak()
	{
		$this->db->select('*');
		$this->db->from('data_aset');
		return $this->db->get();
	}

	/*public function getdata($key)
	{
		$this->db->where('kode_aset',$key);
		$hasil = $this->db->get('data_aset');
		return $hasil;
	}
	public function getupdate($key,$data)
	{
		$this->db->where('kode_aset', $key);
		$this->db->update('data_aset',$data);
	}
	
	public function inputdata($data)
	{
		//$this->db->where('id_jenis', $jenis);
		
		$this->db->insert('data_aset',$data);
	}
	public function delete($key)
	{
		$this->db->where('kode_aset', $key);
		$this->db->delete('data_aset');

	}
	
	public function berdasarkanId($key)
	{
		
		$this->db->select('*');
		$this->db->from('pengusulan');
		$this->db->where('id_usul', $key);
		return $this->db->get();
	}
	public function ambilsemua()
	{
		return $this->db->get('pengusulan');
	}
	public function setujui($key)
	{ 
		
		$this->db->where('id_usul',$key);
		return $this->db->update('pengusulan', ['status'=>1]);
		return $this->db->update('pengusulan', ['waktu_proses_usul'=> current_time()]);

	}
	p
	ublic function tolak($key)
	{ 
		
		$this->db->where('id_usul',$key);
		return $this->db->update('pengusulan', ['status'=>2]);
		//return $this->db->update('pengusulan', ['waktu_proses_usul'=> ]);

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
			$this->db->where ('ceknotif', 0 );
			$this->db->where('id_user',  $this->session->userdata('id'));	
		
		
		}
		return $this->db->get();
	}
	public function sudahDisetujui($key)
	{
		$this->db->select('*');
		$this->db->from('pengusulan');
		$this->db->where('id_usul',$key);
		return $this->db->update('pengusulan', ['ceknotif'=>1]);

	}
	public function lihatpersetujuan()
	{
		$this->db->select('*');
		$this->db->from('pengusulan');
		$this->db->where('id_user',  $this->session->userdata('id'));	
		
		return $this->db->get();

	}*/
	
}
