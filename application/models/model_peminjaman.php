<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peminjaman extends CI_Model {

	public function data_pinjam()
	{
		$this->db->select('*');
		$this->db->from('data_aset');
		$this->db->join('pengusulan', 'pengusulan.id_usul = data_aset.id_usul');
		return $this->db->get();	
	}
	public function insertdata($data)
	{
		$this->db->insert('pinjam_aset',$data);

		
	}
	public function lihatpeminjaman()
	{
		$this->db->select('*');
		$this->db->from('pinjam_aset');

		$this->db->join('data_aset', 'data_aset.i = pinjam_aset.i');
                       
		$this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
		$this->db->join('pengusulan', 'pengusulan.id_usul = data_aset.id_usul');
       
                       
		$this->db->where('id_peminjam',  $this->session->userdata('id'));	
		
		return $this->db->get();

	}
	public function prosespeminjaman()
	{
		$this->db->select('*');
		$this->db->from('pinjam_aset');
		$this->db->join('data_aset', 'data_aset.i = pinjam_aset.i');
        $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
		$this->db->join('pengusulan', 'pengusulan.id_usul = data_aset.id_usul');
		//$this->db->join('pengembalian_aset', 'pengembalian_aset.id_pinjam = pinjam_aset.id_pinjam');
		return $this->db->get();

       
	}
	
	public function updatecek($key)
	{
		
		$this->db->where('i', $key);
		return $this->db->update('data_aset', ['cek'=>1]);
			
	}
	public function berdasarkanId($key)
	{
		$this->db->select('*');
		$this->db->from('pinjam_aset');
		     $this->db->join('data_aset', 'data_aset.i = pinjam_aset.i');
             $this->db->join('jenis_aset', 'jenis_aset.id_jenis = data_aset.id_jenis');
            // $this->db->join('pengembalian_aset', 'pengembalian_aset.id_pinjam = pinjam_aset.id_pinjam');
                   
                     
		$this->db->where('pinjam_aset.id_pinjam', $key);
		return $this->db->get();
	}
	public function ubah_status($key)
	{
		$this->db->where('i', $key);
		return $this->db->update('data_aset', ['cek'=>0]);
		}
	public function sanksi($data)
	{
		$this->db->insert('pengembalian_aset',$data);

	}
	public function denda($data, $key)
	{
		$this->db->where('id_pinjam',$key);
		return $this->db->update('pinjam_aset', $data);
	}
	
	public function belumDisetujui($key)
	{
				
		$this->db->where('i',$key);
		return $this->db->update('data_aset', ['status'=>1]);
	
	}
	public function sudahDisetujui($key)
	{
		$this->db->select('*');
		$this->db->from('pinjam_aset');
		$this->db->where('id_pinjam',$key);
		return $this->db->update('pinjam_aset', ['status'=>1]);

	}
	public function konfirm($key)
	{
		$this->db->where('id_pinjam',$key);
		return $this->db->update('pinjam_aset', ['status'=>0]);
		return $this->db->update('pinjam_aset', ['waktu_pinjam'=>DATE_ADD(NOW())]);
		return $this->db->update('pinjam_aset',['id_user' => $this->session->userdata('id')]);

	}
	public function setujui($key)
	{ 
		
		$this->db->where('id_pinjam',$key);
		return $this->db->update('pinjam_aset', ['status'=>0]);
		return $this->db->update('pinjam_aset', ['waktu_pengembalian'=>DATE_ADD(NOW())]);
		

	}
	
	
}
