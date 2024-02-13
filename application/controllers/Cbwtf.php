<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cbwtf extends CI_Controller
{

	public function __construct()
	{

		Parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model("Cbwtf_model");
	}

	public function index()
	{
		if ($this->input->post()) {

			$password = $this->input->post('emp_pass');
			$user_name = $this->input->post('emp_name');
			$result = $this->db->select('*')->where('user_name', $user_name)->where('remove', NULL)->get('treatment_plant_access')->row_array();
			if ($result) {
				$hash = $result['password'];
				//echo $hash = password_hash($password, PASSWORD_DEFAULT);exit;
				if (password_verify($password, $hash)) {
					$plant_id = $result['plant_master_id'];
					$user_name = $result['user_name'];
					$cbwtf_name = $result['Plant_name'];
					$role = $result['role'];
					$cbwtf_session	= $result['session_id'];

					$this->session->set_userdata('bmw_plant_id', $plant_id);
					$this->session->set_userdata('bmw_plant_user', $user_name);
					$this->session->set_userdata('bmw_cbwtf_name', $cbwtf_name);
					$this->session->set_userdata('bmw_cbwtf_role', $role);
					$this->session->set_userdata('bmw_cbwtf_session_id', $cbwtf_session);
					redirect('index.php/cbwtf/cbwtf_dashboard');
				} else {

					$this->session->set_flashdata('error', 'Error!, Password Does Not Match!');
					return redirect('index.php/cbwtf');
				}
			} else {

				$this->session->set_flashdata('error', 'Error!, User Not Found!');
				return redirect('index.php/cbwtf');
			}
		} else {
			$this->load->view('cbwtf/login', []);
		}
	}
	public function logout2()
	{
		$this->session->unset_userdata('bmw_plant_id');
		$this->session->unset_userdata('bmw_plant_user');
		$this->session->unset_userdata('bmw_cbwtf_name');
		$this->session->sess_destroy();
		redirect('index.php/cbwtf/index');
	}



	public function receive_waste_collection()
	{

		if ($this->input->post()) {

			$this->form_validation->set_rules('issue_code[]', 'Barcode', 'required|xss_clean|is_unique[treatment_plant_collect.treatment_code]');
			$this->form_validation->set_rules('category[]', 'Category', 'required|xss_clean');
			$this->form_validation->set_rules('weight_cbwtf[]', 'Weight', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {

				$res = $this->Cbwtf_model->insert_issue_receive();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/Cbwtf/receive_waste_collection');
			}
		}
		$this->load->view('cbwtf/receive_waste_collection_latest.php');
	}


	// public function insert_dummy_issue_receive(){

	// $this->Cbwtf_model->insert_dummy_issue_receive();

	// }

	// public function insert_issue_receive(){

	// 	$this ->load->model("Cbwtf_model");
	// 	$this->Cbwtf_model->insert_issue_receive();



	// }

	// public function delete_dummy_waste_receive($id){

	// 	$this ->load->model("Cbwtf_model");		
	// 	$this->Cbwtf_model->delete_dummy_waste_receive($id);
	// 	return	redirect('index.php/cbwtf/receive_waste_collection');

	// }

	public function track_vehicle()
	{


		$data['get_vehicle_data'] = $this->Cbwtf_model->cbwtf_vehicle_data();

		$this->load->view('cbwtf/track_vehicle.php', $data);
	}






	public function cbwtf_dashboard()
	{
		$data['get_daily_data'] = $this->Cbwtf_model->cbwtf_fetch_today_data();
		$data['get_total_data'] = $this->Cbwtf_model->cbwtf_fetch_total_data();

		$this->load->view('cbwtf/cbwtf_index.php', $data);
	}


	public function cbwtf_daily_report()
	{

		$data['get_report'] = $this->Cbwtf_model->cbwtf_daily_report();
		$this->load->view('cbwtf/cbwtf_daily_report.php', $data);
	}

	public function cbwtf_transaction_report()
	{

		$this->load->view('cbwtf/cbwtf_transaction_report.php');
	}


	public function print_waste_receive_report()
	{

		$data['get_pdf_data'] = $this->Cbwtf_model->cbwtf_pdf_report();
		$this->load->view('cbwtf/cbwtf_transaction_report_pdf.php', $data);
	}


	public function change_password()
	{
		$this->load->view('cbwtf/update_password.php');
	}

	public function update_password()
	{
		$this->Cbwtf_model->update_password();
	}




	public function weight_machine_master_delete($id)
	{

		$this->load->model("Cbwtf_model");
		$res = $this->Cbwtf_model->delete_weight_machine_master($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Deleted Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Delete Data!');
		}
		redirect('index.php/Cbwtf/weight_machine_master');
	}





	public function create_user()
	{

		$data['get_user'] = $this->Cbwtf_model->fetch_cbwtf_user();

		if ($this->input->post()) {

			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('designation', 'Designation', 'required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');


			if (empty($_FILES['image']['name'])) {
				$this->form_validation->set_rules('image', 'Image', 'required|xss_clean');
			}

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->Cbwtf_model->insert_create_user();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/cbwtf/create_user');
			}
		}
		$this->load->view('cbwtf/create_user.php', $data);
	}

	public function cbwtf_user_delete($id)
	{

		$this->Cbwtf_model->delete_user($id);
		return	redirect('index.php/cbwtf/create_user');
	}


	public function cbwtf_user_remove($id)
	{

		$res = $this->Cbwtf_model->remove_user($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/cbwtf/create_user');
	}

	public function cbwtf_user_edit($id)
	{

		$data['get_user_data'] = $this->Cbwtf_model->edit_user($id);

		if ($this->input->post()) {

			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			//$this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('designation', 'Designation', 'required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');


			if (!empty($_FILES['image']['name'])) {
				$this->form_validation->set_rules('image', 'Image', 'required|xss_clean');
			}

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->Cbwtf_model->update_user($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/cbwtf/create_user');
			}
		}
		$this->load->view('cbwtf/user_edit.php', $data);
	}


	public function weight_machine_master()
	{

		$data['get_machine_data'] = $this->Cbwtf_model->fetch_weight_machine_master();

		if ($this->input->post()) {


			$this->form_validation->set_rules('machine_no', 'Machine No', 'required|xss_clean|is_unique[cbwtf_weight_machine_master.machine_no]');
			$this->form_validation->set_rules('machine_ip', 'Machine ID', 'required|xss_clean|is_unique[cbwtf_weight_machine_master.machine_ip]');
			$this->form_validation->set_rules('hcf_name', 'hcf_name', 'xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->Cbwtf_model->insert_weight_machine_master();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/cbwtf/weight_machine_master');
			}
		}

		$this->load->view('cbwtf/weight_machine_master.php', $data);
	}

	public function fetch_weight()
	{

		$data =	$this->cbwtf_model->fetch_weight_data();

		echo json_encode($data);
	}

	public function dispose_waste_collection()
	{


		$data['get_waste_data'] = $this->Cbwtf_model->fetch_collected_data();
		$data['methods'] = $this->Cbwtf_model->fetch_disposal_method();

		if ($this->input->post()) {

			$this->form_validation->set_rules('method', 'Method', 'required|xss_clean');
			$this->form_validation->set_rules('dispose[]', 'Select Item', 'required|xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->Cbwtf_model->insert_waste_disposal();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/cbwtf/dispose_waste_collection');
			}
		}
		$this->load->view('cbwtf/dispose_waste_collection.php', $data);
	}

	public function fetch_barcode_data()
	{

		$data =	$this->Cbwtf_model->fetch_barcode_data();
		echo json_encode($data);
	}

	public function fetch_weight_data()
	{

		$data =	$this->Cbwtf_model->fetch_barcode_weight();
		echo json_encode($data);
	}

	public function link_machine()
	{
		$this->load->model("Cbwtf_model");
		$data['get_machine_data'] = $this->Cbwtf_model->fetch_weight_machine_master();
		$data['get_link_data'] = $this->Cbwtf_model->fetch_machine_link_data();
		$data['get_register_staff_data'] = $this->Cbwtf_model->fetch_cbwtf_user();

		if ($this->input->post()) {


			$this->form_validation->set_rules('machine_no', 'Machine Name', 'required|xss_clean|is_unique[cbwtf_machine_link.machine_name]');
			$this->form_validation->set_rules('machine_ip', 'ID', 'required|xss_clean|is_unique[cbwtf_machine_link.machine_id]');
			$this->form_validation->set_rules('name', 'User Name', 'required|xss_clean|is_unique[cbwtf_machine_link.user_id]');
			$this->form_validation->set_message('is_unique', 'The Machine Or The User Is Already Registred.');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->Cbwtf_model->insert_register_machine();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/cbwtf/link_machine');
			}
		}
		$this->load->view('cbwtf/register_machine.php', $data);
	}

	public function machine_ajax()
	{
		$mc_no = $this->input->post('mc_no');
		$data = $this->Cbwtf_model->machine_ajax($mc_no);
		echo json_encode(array($data));
	}

	public function register_machine_delete($id)
	{
		$res = $this->Cbwtf_model->weight_machine_register_delete($id);

		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Deleted Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Delete Data!');
		}

		return	redirect('index.php/cbwtf/link_machine');
	}

	public function forgot_password()
	{
		$this->load->view('header');
		$this->load->view('cbwtf/forgot.php');
	}


	public function send_password()
	{
		$this->Cbwtf_model->send_password();
	}


	public function receive_waste_collection_manual()
	{

		//$data['get_dummy_data'] =$this->Cbwtf_model->fetch_dummy_receive_data();

		if ($this->input->post()) {

			$this->form_validation->set_rules('issue_code[]', 'Barcode', 'required|xss_clean|is_unique[treatment_plant_collect.treatment_code]');
			$this->form_validation->set_rules('category[]', 'Category', 'required|xss_clean');
			$this->form_validation->set_rules('weight_cbwtf[]', 'Weight', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {

				$res = $this->Cbwtf_model->insert_issue_receive();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/Cbwtf/receive_waste_collection_manual');
			}
		}
		$this->load->view('cbwtf/receive_waste_collection_manual.php');
	}
}
