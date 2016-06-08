<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_file extends CI_model {

	function __construct()
	{
		parent :: __construct();
	}
	public function insert_file($filename)
	{
		$data = array (
			'gambar' => $filename);
		$this->db->insert('pengusulan', $data);
		return $this->db

	}
	}	

	}
	
}
