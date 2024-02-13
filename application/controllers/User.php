<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

	public function __construct()
	{
		Parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->library('Zend');
		$this->load->model("user_model");
	}


	public function index()
	{
		if ($this->input->post()) {
			$user = $this->input->post('user');

			$password = $this->input->post('emp_pass');
			$user_name = $this->input->post('emp_name');
			$result = $this->db->select('*')->where('Username', $user_name)->where('remove', NULL)->get('org_employee')->row_array();
			if ($result) {
				$hash = $result['Password'];
				//echo $hash = password_hash($password, PASSWORD_DEFAULT);exit;
				if (password_verify($password, $hash)) {

					$org_id = $result['id'];
					$user_name = $result['Username'];
					$password = $result['Password'];
					$org_master_id = $result['org_id'];
					$org_master_name = $result['org_name'];
					$emp_id = $result['emp_id'];


					$this->session->set_userdata('bmw_user_id', $org_id);
					$this->session->set_userdata('bmw_hcf_user', $user_name);
					$this->session->set_userdata('bmw_org_master_id', $org_master_id);
					$this->session->set_userdata('bmw_org_master_name', $org_master_name);
					$this->session->set_userdata('bmw_emp_id', $emp_id);

					return	redirect('index.php/user/dashboard');
				} else {

					$this->session->set_flashdata('error', 'Error!, Password Does Not Match!');
					return redirect('index.php/user');
				}
			} else {
				$this->session->set_flashdata('error', 'Error!, User Not Found!');
				return redirect('index.php/user');
			}
		} else {
			$this->load->view('user/login', []);
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('bmw_user_id');
		$this->session->unset_userdata('bmw_hcf_user');
		$this->session->unset_userdata('bmw_org_master_id');
		$this->session->unset_userdata('bmw_org_master_name');
		$this->session->unset_userdata('bmw_emp_id');
		$this->session->sess_destroy();
		redirect('index.php/user/index');
	}

	public function waste_collection()
	{

		$this->load->model("user_model");
		$this->load->model("organization_model");
		$data['get_department_data'] = $this->user_model->fetch_department();
		$data['get_waste_data'] = $this->user_model->fetch_waste_collection();
		$data['get_ward_data'] = $this->user_model->fetch_ward();
		$data['get_waste_category_data'] = $this->user_model->fetch_category();
		//$data['get_weight_data'] = $this->user_model->fetch_weight();
		if ($this->input->post()) {

			$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
			$this->form_validation->set_rules('occupancy', 'Occupancy', 'xss_clean');
			$this->form_validation->set_rules('ward', 'Ward', 'required|xss_clean');
			$this->form_validation->set_rules('weight', 'weight', 'required|xss_clean');
			$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
			$this->form_validation->set_rules('category', 'Category', 'required|xss_clean');
			$this->form_validation->set_rules('department', 'Department', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->user_model->insert_waste_collection();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/user/waste_collection');
			}
		}


		$this->load->view('user/waste_collection.php', $data);
	}


	public function delete_waste_collection($id)
	{
		$this->load->model("user_model");
		$res = $this->user_model->delete_waste_collection($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Deleted Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Delete Data!');
		}

		return	redirect('index.php/user/waste_collection');
	}




	public function issue_waste_collection()
	{

		$this->load->model("user_model");
		$data['get_waste_data'] = $this->user_model->fetch_issue_collection();
		$data['get_vehicle_data'] = $this->user_model->fetch_vehicle2();
		$data['get_dummy_data'] = $this->user_model->fetch_dummy_data();
		$data['cbwtf_data'] = $this->user_model->fetch_cbwtf_data();
		if ($this->input->post()) {

			$this->form_validation->set_rules('issue_code[]', 'Barcode', 'required|xss_clean|is_unique[issue_collection.issue_code]');
			$this->form_validation->set_rules('category[]', 'Category', 'required|xss_clean');
			$this->form_validation->set_rules('weight[]', 'Weight', 'required|xss_clean');
			//$this->form_validation->set_rules('organization_master_id','ORG','required|xss_clean');
			$this->form_validation->set_rules('vehicle_number', 'VC No.', 'required|xss_clean');
			$this->form_validation->set_rules('plant_name', 'CBWTF', 'required|xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->user_model->insert_issue_collection();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/user/issue_waste_collection');
			}
		}



		$this->load->view('user/issue_collection.php', $data);
	}

	public function waste_collection_report()
	{


		$this->load->model("user_model");
		$data['get_report'] = $this->user_model->fetch_waste_collection_report();

		$this->load->view('user/waste_collection_report.php', $data);
	}
	public function issue_reports()
	{


		$this->load->model("user_model");
		$data['get_report'] = $this->user_model->fetch_issue_report();

		$this->load->view('user/issue_report.php', $data);
	}



	public function insert_dummy_issue_collection()
	{
		$this->load->model("user_model");
		$this->user_model->insert_dummy_issue_collection();
	}


	public function fetch_word()
	{
		$dept = $this->input->post('dept');
		$result = $this->db->select('*')->where('org_id', $this->session->userdata('bmw_org_master_id'))->where('department', $dept)->where('remove', NULL)->get('org_ward')->result();
		$str='<option value="">-Select-</option>';
		foreach($result as $obj)
		{
			$str .='<option value="'.$obj->ward_name.'">'.$obj->ward_name.'</option>';
		}
		echo $str;
	}

	public function fetch_weight()
	{
		$this->load->model("user_model");
		$data =	$this->user_model->fetch_weight();
		echo json_encode($data);
	}


	public function print_waste_collection_report()
	{

		$this->load->model("user_model");
		$data['get_pdf_data'] = $this->user_model->print_waste_collection_report();
		$this->load->view('user/waste_collection_pdf_report.php', $data);
	}


	public function print_issue_collection_report()
	{

		$this->load->model("user_model");
		$data['get_pdf_data'] = $this->user_model->print_issue_collection_report();
		$this->load->view('user/issue_collection_pdf_report.php', $data);
	}

	public function dashboard()
	{

		$this->load->model("user_model");
		$data['get_daily_data'] = $this->user_model->fetch_today_data();
		$data['get_total_data'] = $this->user_model->fetch_total_data();
		$this->load->view('user/index', $data);
	}


	public function forgot_password()
	{
		$this->load->view('header');
		$this->load->view('user/forgot.php');
	}


	public function send_password()
	{
		$this->load->model("user_model");
		$email = $this->user_model->send_password();
		if($email == 1)
		{
            echo '<script> alert("Mail Sent Successfully.Login To Continue");</script>';
    		$this->load->view('header');
    		$this->load->view('user/forgot.php');
		}
        else
        {
            echo '<script> alert("Email sending failed");</script>';
    		$this->load->view('header');
    		$this->load->view('user/forgot.php');
        }
	}



	public function update_password2()
	{

		$this->load->model("user_model");
		$this->load->view('user/update_password.php');
	}

	public function change_password2()
	{

		$this->load->model("user_model");
		$this->user_model->update_password2();
	}

	public function insert_waste_collection_data()
	{

		$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
		$this->form_validation->set_rules('remark', 'Remark', 'xss_clean');
		$this->form_validation->set_rules('ward', 'Ward', 'required|xss_clean');
		$this->form_validation->set_rules('weight', 'weight', 'required|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
		$this->form_validation->set_rules('category', 'Category', 'required|xss_clean');
		$this->form_validation->set_rules('department', 'Department', 'required|xss_clean');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
		} else {
			$this->load->model("user_model");
			$data = $this->user_model->insert_waste_collection();
		}
		echo json_encode(array($data));
	}
	public function delete_dummy_waste_collection($id)
	{

		$this->load->model("user_model");
		$this->user_model->delete_dummy_waste_collection($id);
		return	redirect('index.php/user/issue_waste_collection');
	}

	public function delete_dummy_waste_receive($id)
	{

		$this->load->model("user_model");
		$this->user_model->delete_dummy_waste_receive($id);
		return	redirect('index.php/user/receive_waste_collection');
	}
}
