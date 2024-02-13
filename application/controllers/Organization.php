<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Organization extends CI_Controller
{

	public function __construct()
	{

		Parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->helper('form');
		$this->load->helper('url');
	}

	public function index()

	{
		if ($this->input->post()) {

			$password = $this->input->post('admin_pass');
			$user_name = $this->input->post('user_name');

			$result = $this->db->select('*')->where('user_name', $user_name)->where('remove', NULL)->get('organization_access_master')->row_array();
			if ($result) {
				$hash = $result['password'];
				//echo $hash = password_hash($password, PASSWORD_DEFAULT);exit;
				if (password_verify($password, $hash)) {


					$org_name = $result['org_name'];
					$org_id = $result['org_id'];
					$org_rand_num = $result['org_random_number'];
					$session_id = $result['session_id'];


					$this->session->set_userdata('bmw_org_id', $org_id);
					$this->session->set_userdata('bmw_user_name', $user_name);
					$this->session->set_userdata('bmw_org_name', $org_name);
					$this->session->set_userdata('bmw_org_rand_num', $org_rand_num);
					$this->session->set_userdata('bmw_org_session_id', $session_id);

					return	redirect('index.php/organization/dashboard');
				} else {
					$this->session->set_flashdata('error', 'Error!, Password Does Not Match!');
					return redirect('index.php/organization');
				}
			} else {

				$this->session->set_flashdata('error', 'Error!, User Not Found!');
				return redirect('index.php/organization');
			}
		} else {
			$this->load->view('organization/login', []);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('bmw_org_id');
		$this->session->unset_userdata('bmw_user_name');
		$this->session->sess_destroy();
		redirect('index.php/organization/index');
	}


	public function department()
	{

		$this->load->model("organization_model");
		$data['get_department_data'] = $this->organization_model->fetch_department();

		if ($this->input->post()) {

			$this->form_validation->set_rules('dept_name', 'Department', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->insert_department();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/organization/department');
			}
		}

		$this->load->view('organization/departmentmaster2.php', $data);
	}



	public function department_edit($id)
	{

		$this->load->model("organization_model");
		$data['get_department_data'] = $this->organization_model->edit_department($id);

		if ($this->input->post()) {

			$this->form_validation->set_rules('dept_name', 'Department', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->update_department($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/organization/department');
			}
		}
		$this->load->view('organization/department_edit', $data);
	}


	public function department_delete($id)
	{
		$this->load->model("organization_model");
		$this->organization_model->delete_department($id);
	}


	public function department_remove($id)
	{
		$this->load->model("organization_model");
		$res = $this->organization_model->remove_department($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/organization/department');
	}


	public function designation()
	{

		$this->load->model("organization_model");
		$data['get_designation_data'] = $this->organization_model->fetch_designation();
		if ($this->input->post()) {

			$this->form_validation->set_rules('designation', 'Designation', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->insert_designation();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/organization/designation');
			}
		}


		$this->load->view('organization/designation2.php', $data);
	}



	public function designation_delete($id)
	{
		$this->load->model("organization_model");
		$res = $this->organization_model->delete_designation($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
	}

	public function designation_edit($id)
	{

		$this->load->model("organization_model");
		$data['get_designation_data'] = $this->organization_model->edit_designation($id);


		if ($this->input->post()) {

			$this->form_validation->set_rules('designation', 'Designation', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->update_designation($id);

				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/organization/designation');
			}
		}

		$this->load->view('organization/designation_edit', $data);
	}

	public function designation_remove($id)
	{
		$this->load->model("organization_model");
		$res = $this->organization_model->remove_designation($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/organization/designation');
	}



	public function ward()
	{

		$this->load->model("organization_model");
		$data['get_ward_data'] = $this->organization_model->fetch_ward();
		$data['get_department_data'] = $this->organization_model->fetch_department();

		if ($this->input->post()) {

			$this->form_validation->set_rules('ward_name', 'Ward', 'required|xss_clean');
			$this->form_validation->set_rules('department', 'Department', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->insert_ward();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/organization/ward');
			}
		}

		$this->load->view('organization/ward2.php', $data);
	}



	public function ward_delete($id)
	{
		$this->load->model("organization_model");
		$this->organization_model->delete_ward($id);
	}



	public function ward_edit($id)
	{

		$this->load->model("organization_model");
		$data['get_ward_data'] = $this->organization_model->edit_ward($id);
		$data['get_department_data'] = $this->organization_model->fetch_department();
		if ($this->input->post()) {

			$this->form_validation->set_rules('ward_name', 'Ward', 'required|xss_clean');
			$this->form_validation->set_rules('department', 'Department', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->update_ward($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/organization/ward');
			}
		}
		$this->load->view('organization/ward_edit', $data);
	}


	public function ward_remove($id)
	{
		$this->load->model("organization_model");
		$this->organization_model->remove_ward($id);
		return	redirect('index.php/organization/ward');
	}


	public function register_staff()
	{

		$this->load->model("organization_model");
		$data['get_staff_data'] = $this->organization_model->fetch_staff();
		$data['get_department_data'] = $this->organization_model->fetch_department();
		$data['get_designation_data'] = $this->organization_model->fetch_designation();

		if ($this->input->post()) {


			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('department', 'Department', 'required|xss_clean');
			$this->form_validation->set_rules('designation', 'Designation', 'required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('dob', 'DOB', 'required|xss_clean');
			$this->form_validation->set_rules('doj', 'DOJ', 'required|xss_clean');
			$this->form_validation->set_rules('1st_dose', '1st Dose', 'required|xss_clean');
			$this->form_validation->set_rules('2nd_dose', '2nd Dose', 'required|xss_clean');
			$this->form_validation->set_rules('booster', 'Booster Dose', 'xss_clean');
			$this->form_validation->set_rules('Vaccine', 'Vaccine', 'required|xss_clean');

			if (empty($_FILES['image']['name'])) {
				$this->form_validation->set_rules('image', 'Image', 'required|xss_clean');
			}

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->insert_register_staff();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/register_staff');
			}
		}

		$this->load->view('organization/register_staff.php', $data);
	}


	public function delete_register_staff($id)
	{
		$this->load->model("organization_model");
		$this->organization_model->delete_register_staff($id);
		//$this->load->view('organization/register_staff.php');

	}

	public function edit_register_staff($id)
	{
		$this->load->model("organization_model");
		$data['get_staff_data'] = $this->organization_model->edit_register_staff($id);
		$data['get_designation_data'] = $this->organization_model->fetch_designation();
		$data['get_department_data'] = $this->organization_model->fetch_department();

		if ($this->input->post()) {


			$this->form_validation->set_rules('name', 'Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('department', 'Department', 'required|xss_clean');
			$this->form_validation->set_rules('designation', 'Designation', 'required|xss_clean');

			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('dob', 'DOB', 'required|xss_clean');
			$this->form_validation->set_rules('doj', 'DOJ', 'required|xss_clean');
			$this->form_validation->set_rules('1st_dose', '1st Dose', 'required|xss_clean');
			$this->form_validation->set_rules('2nd_dose', '2nd Dose', 'required|xss_clean');
			$this->form_validation->set_rules('booster', 'Booster Dose', 'xss_clean');
			$this->form_validation->set_rules('Vaccine', 'Vaccine', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->update_register_staff($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/register_staff');
			}
		}

		$this->load->view('organization/register_staff_edit.php', $data);
	}



	public function remove_register_staff($id)
	{
		$this->load->model("organization_model");
		$res = $this->organization_model->remove_register_staff($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/organization/register_staff');
	}




	// public function staff_access(){

	// $this ->load->model("organization_model");
	// $data['get_staff_access_data'] = $this->organization_model->fetch_staff_access();
	// $data['get_register_staff_data']=$this->organization_model->fetch_staff();
	// $data['get_department_data'] = $this->organization_model->fetch_department();
	// $data['get_ward_data'] = $this->organization_model->fetch_Ward();

	// //print_r($data);
	// $this->load->view('organization/staff_access.php',$data);


	// 	}

	// 	public function insert_staff_access(){

	// 	$this->input->post();
	// 	$this ->load->model("organization_model");
	// 	$this->organization_model->insert_staff_access();
	// 	redirect('index.php/organization/staff_access');


	// 		}

	// 	public function delete_staff_access($id){

	// 	$this ->load->model("organization_model");
	// 	$this->organization_model->delete_staff_access($id);
	// 	//$this->load->view('organization/register_staff.php');
	// 	redirect('index.php/organization/staff_access');

	// 			}

	// 	public function edit_staff_access($id){

	// 	$this ->load->model("organization_model");
	// 	$data['get_staff_access_data'] = $this->organization_model->edit_staff_access($id);
	// 	//var_dump($data);
	// 	$data['get_ward_data'] = $this->organization_model->fetch_Ward();
	// 	$data['get_department_data'] = $this->organization_model->fetch_department();
	// 	$this->load->view('organization/staff_access_edit.php',$data);


	// 	}


	// 	public function Update_staff_access($id){

	// 	$this ->load->model("organization_model");
	// 	$this->organization_model->Update_staff_access($id);
	// 	redirect('index.php/organization/staff_access');

	// 	}


	// 	public function remove_staff_access($id){

	// 		$this ->load->model("organization_model");
	// 		$this->organization_model->remove_staff_access($id);
	// 		return	redirect('index.php/organization/staff_access');

	// 	}





	public function vehicle_master()
	{

		$this->load->model("organization_model");

		$data['get_cbwtf_data'] = $this->organization_model->fetch_cbwtf_data();
		$data['get_vehicle_data'] = $this->organization_model->fetch_vehicle();
		$data['get_vehicle_type_data'] = $this->organization_model->fetch_vehicle_type();

		if ($this->input->post()) {

			$this->form_validation->set_rules('Vehicle_number', 'Vehicle No', 'required|xss_clean');
			$this->form_validation->set_rules('owner_name', 'Owner Name', 'required|xss_clean');
			$this->form_validation->set_rules('vc_type', 'Vehicle Type', 'required|xss_clean');
			$this->form_validation->set_rules('Engine_no', 'Engine No', 'required|xss_clean');
			$this->form_validation->set_rules('fit_exp_date', 'Fitness Exp. Date', 'required|xss_clean');

			$this->form_validation->set_rules('insurance_exp_date', 'Insurance Exp. Date', 'required|xss_clean');
			$this->form_validation->set_rules('cbwtf', 'CBWTF', 'required|xss_clean');
			$this->form_validation->set_rules('Chassis_no', 'Chassis Number', 'required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('pollution_exp_date', 'PUC Exp. Date', 'required|xss_clean');

			if (empty($_FILES['Documents']['name'])) {
				$this->form_validation->set_rules('Documents', 'Documents', 'xss_clean');
			}



			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->insert_vehicel_master();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/vehicle_master');
			}
		}

		$this->load->view('organization/vehicle.php', $data);
	}


	public function vehicle_master_delete($id)
	{

		$this->load->model("organization_model");
		$res = $this->organization_model->delete_vehicel_master($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		redirect('index.php/organization/vehicle_master');
	}

	public function edit_vehicel_master($id)
	{

		$this->load->model("organization_model");
		$data['get_cbwtf_data'] = $this->organization_model->fetch_cbwtf_data();
		$data['get_vehicle_type_data'] = $this->organization_model->fetch_vehicle_type();
		$data['get_vehicle_data'] = $this->organization_model->edit_vehicel_master($id);

		if ($this->input->post()) {


			$this->form_validation->set_rules('Vehicle_number', 'Vehicle No', 'required|xss_clean');
			$this->form_validation->set_rules('owner_name', 'Owner Name', 'required|xss_clean');
			$this->form_validation->set_rules('vc_type', 'Vehicle Type', 'required|xss_clean');
			$this->form_validation->set_rules('Engine_no', 'Engine No', 'required|xss_clean');
			$this->form_validation->set_rules('fit_exp_date', 'Fitness Exp. Date', 'required|xss_clean');
			$this->form_validation->set_rules('Insuran_exp_dt', 'Insurance Exp. Date', 'required|xss_clean');
			$this->form_validation->set_rules('cbwtf', 'CBWTF', 'required|xss_clean');
			$this->form_validation->set_rules('Chassis_no', 'Chassis Number', 'required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('pollution_exp_date', 'PUC Exp. Date', 'required|xss_clean');

			if (empty($_FILES['Documents']['name'])) {
				$this->form_validation->set_rules('Documents', 'Documents', 'xss_clean');
			}

			if ($this->form_validation->run() == FALSE) {
			} else {

				$res = $this->organization_model->update_vehicel_master($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/vehicle_master');
			}
		}
		$this->load->view('organization/vehicle_edit.php', $data);
	}


	public function vehicle_master_remove($id)
	{

		$this->load->model("organization_model");
		$res = $this->organization_model->vehicle_master_remove($id);

		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/organization/vehicle_master');
	}


	public function weight_machine_master()
	{

		$this->load->model("organization_model");

		$data['get_machine_data'] = $this->organization_model->fetch_weight_machine_master();

		if ($this->input->post()) {


			$this->form_validation->set_rules('machine_no', 'Machine No', 'required|xss_clean|is_unique[weight_machine_master.machine_no]');
			$this->form_validation->set_rules('machine_ip', 'Machine ID', 'required|xss_clean');
			$this->form_validation->set_rules('hcf_name', 'hcf_name', 'xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->insert_weight_machine_master();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/weight_machine_master');
			}
		}
		$this->load->view('organization/weight_machine_master.php', $data);
	}

	public function weight_machine_master_delete($id)
	{

		$this->load->model("organization_model");
		$res = $this->organization_model->delete_weight_machine_master($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Deleted Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Delete Data!');
		}
		redirect('index.php/organization/weight_machine_master');
	}

	public function weight_machine_master_edit($id)
	{

		$this->load->model("organization_model");

		$data['get_machine_data'] = $this->organization_model->edit_weight_machine_master($id);

		if ($this->input->post()) {


			$this->form_validation->set_rules('machine_no', 'Machine No', 'required|xss_clean');
			$this->form_validation->set_rules('machine_ip', 'Machine ID', 'required|xss_clean');
			$this->form_validation->set_rules('hcf_name', 'HCF Name', 'xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->update_weight_machine_master($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/weight_machine_master');
			}
		}

		$this->load->view('organization/weight_machine_master_edit.php', $data);
	}


	public function weight_machine_master_Remove($id)
	{
		$this->load->model("organization_model");
		$res = $this->organization_model->weight_machine_master_Remove($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/organization/weight_machine_master');
	}

	public function org_treatment_link()
	{

		$this->load->model("organization_model");
		$this->load->model("admin_modal");
		$data['get_treatment_plant_data'] = $this->admin_modal->fetch_treatment_plant_master();
		$data['get_treatment_data'] = $this->organization_model->org_treatment_link_fetch();

		if ($this->input->post()) {

			$this->form_validation->set_rules('plant_name', 'CBWTF', 'required|xss_clean');
			$this->form_validation->set_rules('hcf_name', 'HCF Name', 'required|xss_clean|is_unique[org_treatment_link.org_mster_id]');
			$this->form_validation->set_message('is_unique', 'You Are Already Linked With A CBWTF.');
			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->org_treatment_link_insert();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/org_treatment_link');
			}
		}

		$this->load->view('organization/org_treatment_link.php', $data);
	}


	public function org_treatment_link_delete($id)
	{

		$this->load->model("organization_model");
		$this->organization_model->org_treatment_link_delete($id);
		redirect('index.php/organization/org_treatment_link');
	}
	public function org_treatment_link_remove($id)
	{
		$this->load->model("organization_model");
		$res = $this->organization_model->org_treatment_link_delete($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/organization/org_treatment_link');
	}




	public function dashboard()
	{

		$this->load->model("organization_model");
		$data['get_daily_data'] = $this->organization_model->fetch_today_data();
		$data['get_total_data'] = $this->organization_model->fetch_total_data();
		$data['waste_department_wise'] = $this->organization_model->waste_department_wise();
		$this->load->view('organization/index.php', $data);
	}


	public function collection_report()
	{
		$this->load->view('organization/collection_report.php', $data);
	}


	public function daily_collection_report()
	{
		$this->load->model("organization_model");
		$this->load->model("user_model");
		$data['get_department_data'] = $this->organization_model->fetch_department();
		$data['get_ward_data'] = $this->organization_model->fetch_ward();
		$data['get_waste_category_data'] = $this->user_model->fetch_category();
		$data['get_report'] = $this->organization_model->fetch_hcf_waste_collection_report();

		$this->load->view('organization/daily_collection_report.php', $data);
	}



	public function print_waste_collection_report()
	{
		$this->load->model("organization_model");
		$data['get_pdf_data'] = $this->organization_model->print_hcf_waste_collection_report();

		$this->load->view('organization/waste_collection_pdf.php', $data);
	}


	public function daily_issue_report()
	{

		$this->load->model("organization_model");
		$this->load->model("user_model");
		$data['get_department_data'] = $this->organization_model->fetch_department();
		$data['get_ward_data'] = $this->organization_model->fetch_ward();
		$data['get_waste_category_data'] = $this->user_model->fetch_category();
		$data['get_report'] = $this->organization_model->fetch_hcf_waste_issue_report();

		$this->load->view('organization/daily_issue_report.php', $data);
	}


	public function print_issue_report()
	{

		$this->load->model("organization_model");
		$data['get_pdf_data'] = $this->organization_model->print_hcf_issue_collection_report();

		$this->load->view('organization/issue_collection_pdf_report.php', $data);
	}


	public function verify_table()
	{

		$this->load->model("organization_model");
		$data['get_report'] = $this->organization_model->hcf_verify_table();

		$this->load->view('organization/verify_table.php', $data);
	}


	public function verify_table_report()
	{
		$this->load->model("organization_model");
		$this->load->model("user_model");
		$data['get_department_data'] = $this->organization_model->fetch_department();
		$data['get_ward_data'] = $this->organization_model->fetch_ward();
		$data['get_waste_category_data'] = $this->user_model->fetch_category();
		$data['get_report'] = $this->organization_model->hcf_verify_table();

		$this->load->view('organization/verify_table_report.php', $data);
	}




	public function print_verify_table()
	{

		$this->load->model("organization_model");
		$data['get_pdf_data'] = $this->organization_model->print_hcf_verify_table();

		$this->load->view('organization/verify_table_pdf_report.php', $data);
	}


	public function forgot_password()
	{
		$this->load->view('header');
		$this->load->view('organization/forgot.php');
	}


	public function send_password()
	{
		$this->load->model("organization_model");
		$data['get_org_data'] = $this->organization_model->send_password();
	}


	public function password_update($id)
	{
		$this->load->model("organization_model");
		$this->organization_model->update_password($id);
		return	redirect('index.php/organization/forgot_password');
	}


	public function register_machine()
	{
		$this->load->model("organization_model");
		$data['get_machine_data'] = $this->organization_model->fetch_weight_machine_master();
		$data['get_link_data'] = $this->organization_model->fetch_register_weight_machine();

		$data['get_register_staff_data'] = $this->organization_model->fetch_staff();

		if ($this->input->post()) {


			$this->form_validation->set_rules('machine_no', 'Machine Name', 'required|xss_clean');
			$this->form_validation->set_rules('machine_ip', 'ID', 'required|xss_clean');
			$this->form_validation->set_rules('name', 'User Name', 'required|xss_clean');
			$this->form_validation->set_message('is_unique', 'The Machine Or The User Is Already Registred.');

			//$this->form_validation->set_rules('machine_no', 'Machine Name', 'required|xss_clean|is_unique[machine_link.machine_name]');
			//$this->form_validation->set_rules('machine_ip', 'ID', 'required|xss_clean|is_unique[machine_link.machine_id]');
			//$this->form_validation->set_rules('name', 'User Name', 'required|xss_clean|is_unique[machine_link.user_id]');
			//$this->form_validation->set_message('is_unique', 'The Machine Or The User Is Already Registred.');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->insert_register_machine();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/organization/register_machine');
			}
		}
		$this->load->view('organization/register_machine.php', $data);
	}


	public function register_machine_delete($id)
	{
		$this->load->model("organization_model");
		$this->organization_model->weight_machine_register_delete($id);
		return	redirect('index.php/organization/register_machine');
	}

	public function register_machine_edit($id)
	{

		$this->load->model("organization_model");
		$data['get_machine2_data'] = $this->organization_model->fetch_weight_machine_master();
		$data['get_register_staff_data'] = $this->organization_model->fetch_staff();
		$data['get_machine_data'] = $this->organization_model->edit_register_machine($id);

		if ($this->input->post()) {


			$this->form_validation->set_rules('machine_no', 'Machine Name', 'required|xss_clean');

			$this->form_validation->set_rules('machine_ip', 'ID', 'required|xss_clean');
			$this->form_validation->set_rules('name', 'User Name', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res =	$this->organization_model->update_register_machine($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/register_machine');
			}
		}

		$this->load->view('organization/register_machine_edit.php', $data);
	}


	public function occupancy()
	{

		$this->load->model("organization_model");
		$data['get_table_data'] = $this->organization_model->occupancy();
		$data['get_ward_data'] = $this->organization_model->fetch_ward();
		$data['get_department_data'] = $this->organization_model->fetch_department();


		if ($this->input->post()) {


			$this->form_validation->set_rules('date[]', 'Date', 'required|xss_clean');

			$this->form_validation->set_rules('dept_name[]', 'Department', 'required|xss_clean');
			$this->form_validation->set_rules('ward_name[]', 'Ward Name', 'required|xss_clean');
			$this->form_validation->set_rules('occupancy[]', 'Occupancy', 'required|xss_clean');
			if ($this->form_validation->run() == FALSE) {
			} else {
				$this->organization_model->insert_occupancy();
				return	redirect('index.php/organization/occupancy');
			}
		}


		$this->load->view('organization/occupancy.php', $data);
	}



	public function remove_occupancy($id)
	{
		$this->load->model("organization_model");
		$this->organization_model->remove_occupancy($id);
		return	redirect('index.php/organization/occupancy');
	}

	public function waste_average()
	{   
		$this->load->model("organization_model");
		$this->load->model("user_model");
		$data['get_department_data'] = $this->organization_model->fetch_department();
		$data['get_ward_data'] = $this->organization_model->fetch_ward();
		$data['get_waste_category_data'] = $this->user_model->fetch_category();

		$this->load->view('organization/average_report.php', $data);
	}

	public function print_average_report()
	{
		$this->load->model("organization_model");
		//$data['get_pdf_data'] =$this->organization_model->print_average();
		$data['get_pdf_data'] = $this->organization_model->print_average2();
		$this->load->view('organization/waste_average_pdf_report.php', $data);
	}



	public function change_password()
	{

		$this->load->model("organization_model");
		$this->load->view('organization/update_password.php');
	}

	public function update_password()
	{

		$this->load->model("organization_model");
		$this->organization_model->update_password();
	}


	public function machine_ajax()
	{
		$mc_no = $this->input->post('mc_no');
		$this->load->model("organization_model");

		$data = $this->organization_model->machine_ajax($mc_no);
		echo json_encode(array($data));
	}

	public function profile()
	{


		$this->load->model("organization_model");

		$data['get_profile_data'] = $this->organization_model->fetch_hcf_profile();

		if ($this->input->post()) {


			$this->form_validation->set_rules('authorization', 'Authorizzation Valid Upto', 'required|xss_clean');
			$this->form_validation->set_rules('auth_applied', 'Authorization Applied On', 'xss_clean');
			//$this->form_validation->set_rules('auth_details','Authorization Valid Upto','required|xss_clean');
			$this->form_validation->set_rules('cto', 'CTO valid Upto', 'required|xss_clean');
			//$this->form_validation->set_rules('cto_details','CTO Document','required|xss_clean');
			$this->form_validation->set_rules('cto_applied', 'CTO Applied On', 'xss_clean');
			$this->form_validation->set_rules('aggrement', 'Aggrement Valid Upto', 'required|xss_clean');
			//$this->form_validation->set_rules('aggrement_details','Aggrement Document','required|xss_clean');
			$this->form_validation->set_rules('strength', 'No. Of Beds', 'required|xss_clean');
			$this->form_validation->set_rules('deep_burial', 'Deep Burial', 'required|xss_clean');
			$this->form_validation->set_rules('sharp_pit', 'Sharp Pit', 'required|xss_clean');
			$this->form_validation->set_rules('autoclave', 'Autoclave', 'required|xss_clean');
			$this->form_validation->set_rules('shredder', 'Shredder', 'required|xss_clean');
			$this->form_validation->set_rules('nst', 'NST/Hub', 'required|xss_clean');
			$this->form_validation->set_rules('lmw', 'LMW', 'required|xss_clean');
			$this->form_validation->set_rules('remark', 'Remark', 'xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->insert_profile();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/profile');
			}
		}
		$this->load->view('organization/profile.php', $data);
	}

	public function edit_profile($id)
	{

		$this->load->model("organization_model");

		$data['get_profile_data'] = $this->organization_model->edit_profile($id);

		if ($this->input->post()) {


			$this->form_validation->set_rules('authorization', 'Authorizzation Valid Upto', 'required|xss_clean');
			$this->form_validation->set_rules('auth_applied', 'Authorization Applied On', 'xss_clean');
			//$this->form_validation->set_rules('auth_details','Authorization Valid Upto','required|xss_clean');
			$this->form_validation->set_rules('cto', 'CTO valid Upto', 'required|xss_clean');
			//$this->form_validation->set_rules('cto_details','CTO Document','required|xss_clean');
			$this->form_validation->set_rules('cto_applied', 'CTO Applied On', 'xss_clean');
			$this->form_validation->set_rules('aggrement', 'Aggrement Valid Upto', 'required|xss_clean');
			//$this->form_validation->set_rules('aggrement_details','Aggrement Document','required|xss_clean');
			$this->form_validation->set_rules('strength', 'No. Of Beds', 'required|xss_clean');
			$this->form_validation->set_rules('deep_burial', 'Deep Burial', 'required|xss_clean');
			$this->form_validation->set_rules('sharp_pit', 'Sharp Pit', 'required|xss_clean');
			$this->form_validation->set_rules('autoclave', 'Autoclave', 'required|xss_clean');
			$this->form_validation->set_rules('shredder', 'Shredder', 'required|xss_clean');
			$this->form_validation->set_rules('nst', 'NST/Hub', 'required|xss_clean');
			$this->form_validation->set_rules('etp', 'ETP', 'required|xss_clean');
			$this->form_validation->set_rules('stp', 'STP', 'required|xss_clean');
			$this->form_validation->set_rules('lmw', 'LMW', 'required|xss_clean');
			$this->form_validation->set_rules('remark', 'Remark', 'xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->organization_model->update_profile($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/organization/profile');
			}
		}

		$this->load->view('organization/profile_edit.php', $data);
	}

	public function fetch_ward()
    {
        $dept = $this->input->post('dept');
        $result = $this->db->select('*')->where('org_id', $this->session->userdata('bmw_org_id'))->where('department', $dept)->where('remove', NULL)->get('org_ward')->result();
        $str='<option value="">-Select-</option>';
        foreach($result as $obj)
        {
            $str .='<option value="'.$obj->ward_name.'">'.$obj->ward_name.'</option>';
        }
        echo $str;
    }
}
