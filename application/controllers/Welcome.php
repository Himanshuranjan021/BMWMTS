<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{


	public function index()
	{
		$this->load->view('header.php');
		$this->load->view('index');
	}
	public function checkmechine()
	{
		$this->db->select('demo_weight_data.*');
		$this->db->from('demo_weight_data');
		$this->db->join('weight_machine_master', 'demo_weight_data.mac_id = weight_machine_master.machine_no', 'left');
		$this->db->where('weight_machine_master.machine_no IS NULL');
		$query = $this->db->get();
		$result = $query->result_array();
		$data['get_table_data'] = $result;
		$this->load->view('demo.php', $data);
	}
}
