<?php
defined('BASEPATH') or exit('No direct script access allowed');

class weight extends CI_Controller
{



	public function index()
	{

		$id = $this->input->get('id', TRUE);
		$weight = $this->input->get('weight', TRUE);
		$mac_id = $this->input->get('mac_id', TRUE);
		date_default_timezone_set("Asia/Calcutta");
		$data = [
			'id'         => $id,
			'weight'       => $weight,
			'mac_id'       => $mac_id,

		];

		$this->db->insert('demo_weight_data', $data);

		echo "<h4>Data Inserted Successfully. Thank You</h4>";
	}

}
?>


