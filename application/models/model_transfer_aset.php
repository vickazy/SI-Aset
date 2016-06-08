<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_transfer_aset extends CI_Model {

	public function alldata()
	{
		$query = $this->db->get('perpindahan');
		$query_result = $query->result();
		return $query_result;
	}

	public function getdata()
	{
		$this->db->select('*');
		$this->db->from('perpindahan');
		$this->db->where('id_pengirim',$this->session->userdata('id'));
		$query = $this->db->get();
		$result = $query ->result();
		return $result;
		
	}
	public function getupdate($key,$data)
	{
		$this->db->where('i', $key);
		$this->db->update('data_aset',$data);
		
	}
	public function delete($key)
	{
		$this->db->where('id_perpindahan', $key);
		$this->db->delete('perpindahan');

	}
	public function terima($key)
	{
		$this->db->where('id_perpindahan', $key);
		return $this->db->update('perpindahan', ['status_transfer'=>1]);

	}
	/*public function ubahpencatatan($key)
	{	
		$this->db->select('*');
		$this->db->from('perpindahan')
		$this->db->where('id_perpindahan', $key);
		return $this->db->update('data_aset',['id_users' => $this->session->userdata('id')]);

	}*/
	public function tolak($key)
	{
		$this->db->where('id_perpindahan', $key);
		return $this->db->update('perpindahan', ['status_transfer'=>2]);
		

	}
	
	public function inputdata($data)
	{
		$this->db->insert('perpindahan',$data);
	}
	
		
	public function belumDisetujui()
	{
		
		$this->db->select('*');
		$this->db->from('perpindahan');
		$this->db->join('data_aset','data_aset.i=perpindahan.i');
		$this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
		$this->db->join('pengusulan', 'pengusulan.id_usul = data_aset.id_usul');
                      ;
                      
		
		$this->db->where ('status_transfer', 0 );
		$this->db->where('id_penerima',$this->session->userdata('id'));

		return $this->db->get();
	}
	/*public function berdasarkanId($key)
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
