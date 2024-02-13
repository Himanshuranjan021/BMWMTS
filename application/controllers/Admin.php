<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


	public function __construct()
	{

		Parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('security');
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model("admin_modal");
	}


	public function index()
	{
		if ($this->input->post()) {

			$email = $this->input->post('admin_email');
			$password = $this->input->post('admin_pass');

			$result = $this->db->select('*')->where('username', $email)->get('admin')->row_array();
			if ($result) {

				$hash = $result['password'];
				//echo $hash = password_hash($password, PASSWORD_DEFAULT);exit;
				if (password_verify($password, $hash)) {

					$admin_id = $result['id'];
					$email = $result['email'];
					$role = $result['role'];

					$this->session->set_userdata('bmw_admin_id', $admin_id);
					$this->session->set_userdata('bmw_email', $email);
					$this->session->set_userdata('bmw_role', $role);
					redirect('index.php/admin/dashboard');
				} else {
					$this->session->set_flashdata('error', 'Error!, Password Does Not Match!');
					return redirect('index.php/admin');
				}
			} else {
				$this->session->set_flashdata('error', 'Error!, User Not Found!');
				return redirect('index.php/admin');
			}
		} else {
			$this->load->view('admin/login', []);
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('bmw_admin_id');
		$this->session->unset_userdata('bmw_email');
		$this->session->unset_userdata('bmw_role');
		$this->session->sess_destroy();
		redirect('index.php/admin/index');
	}



	public function district()
	{
		$this->load->model("admin_modal");
		$data['get_district_data'] = $this->admin_modal->get_district_data();

		if ($this->input->post()) {

			$this->form_validation->set_rules('state_name', 'State', 'required|xss_clean');
			$this->form_validation->set_rules('district', 'District', 'required|xss_clean|is_unique[district.name]');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->insert_district();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/district');
			}
		}


		$this->load->view('admin/DistrictMaster', $data);
	}



	public function district_edit($id)
	{
		$this->load->model("admin_modal");
		$data['get_district_data'] = $this->admin_modal->get_district_edit_data($id);


		if ($this->input->post()) {


			$this->form_validation->set_rules('state', 'State', 'required|xss_clean');
			$this->form_validation->set_rules('name', 'District', 'required|xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->update_district_data($id);

				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/district');
			}
		}



		$this->load->view('admin/DistrictMaster_edit', $data);
	}



	public function district_remove($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->remove_district_data($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Removed Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Remove Data!');
		}
		return	redirect('index.php/admin/district');
	}



	public function district_delete()
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->district_delete($this->uri->segment('3'));
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/admin/district');
	}


	public function organisation()   //category master
	{
		$this->load->model("admin_modal");
		$data['get_org_cat'] = $this->admin_modal->get_org_cat();

		if ($this->input->post()) {


			$this->form_validation->set_rules('cat_name', 'Category', 'required|xss_clean|is_unique[organization_category.name]');
			$this->form_validation->set_rules('note', 'Description', 'xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->insert_organizaton_categort();

				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/organisation');
			}
		}


		$this->load->view('admin/organisationcategory_master', $data);
	}



	public function org_cat_delete()
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->org_cat_delete($this->uri->segment('3'));
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}
		return	redirect('index.php/admin/organisation');
	}

	public function org_cat_edit($id)
	{
		$this->load->model("admin_modal");
		$data['get_org_cat_data'] = $this->admin_modal->org_cat_edit($id);

		if ($this->input->post()) {


			$this->form_validation->set_rules('name', 'Category', 'required|xss_clean');
			$this->form_validation->set_rules('note', 'Description', 'xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res =  $this->admin_modal->org_cat_master_update($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}

				return	redirect('index.php/admin/organisation');
			}
		}


		$this->load->view('admin/Organization_category_master_edit', $data);
	}


	public function org_cat_remove($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->remove_org_cat_data($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Removed Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Remove Data!');
		}

		return	redirect('index.php/admin/organisation');
	}



	public function department()
	{
		$this->load->model("admin_modal");
		$data['fetch_department'] = $this->admin_modal->get_department();


		if ($this->input->post()) {


			$this->form_validation->set_rules('area_name', 'Division', 'required|xss_clean|is_unique[department.name]');



			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->insert_department();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/department');
			}
		}

		$this->load->view('admin/departmentmaster', $data);
	}



	public function department_delete()
	{
		$this->load->model("admin_modal");
		$this->admin_modal->department_delete($this->uri->segment('3'));
	}


	public function department_remove($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->department_remove($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Removed Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Remove Data!');
		}

		return	redirect('index.php/admin/department');
	}



	//Create Organization

	public function create_organisation()
	{
		$this->load->model("admin_modal");

		$admin_id = $this->session->userdata('bmw_admin_id');
		$this->db->select('district')
			->where('id', $admin_id);
		$query = $this->db->get('admin');
		$result = $query->row_array();
		$district = $result['district'];
		$data['get_unit_data'] = $this->admin_modal->get_department();
		$data['get_hcf_data'] = $this->admin_modal->hcf_master();
		$data['get_organization_data'] = $this->admin_modal->get_organization_data_district_wise();
		$data['get_org_cat'] = $this->admin_modal->get_org_cat();
		$data['district'] = $district;
		if ($this->input->post()) {


			$this->form_validation->set_rules('cat_name', 'HCF Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|is_unique[organization_master.email]');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('district', 'District', 'required|xss_clean');
			$this->form_validation->set_rules('hcf_category', 'Type', 'required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('department', 'Division', 'required|xss_clean');
			$this->form_validation->set_rules('area', 'Area', 'required|xss_clean');
			$this->form_validation->set_rules('org_short_name', 'Short Name', 'required|xss_clean|min_length[5]|max_length[5]|is_unique[organization_master.short_name]');
			$this->form_validation->set_rules('hcf_code', 'HCF Code', 'required|xss_clean|min_length[5]|max_length[5]|is_unique[organization_master.random_number]');
			$this->form_validation->set_rules('mediacl_type', 'Category', 'required|xss_clean');
			$this->form_validation->set_rules('Pincode', 'Pincode', 'required|xss_clean|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
			$this->form_validation->set_rules('manager_name', 'Manager Name', 'required|xss_clean');
			$this->form_validation->set_rules('manager_mobile', 'Manager Mobile', 'required|xss_clean|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('longitude', 'Longitude', 'required|xss_clean');
			$this->form_validation->set_rules('latitude', 'Latitude', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->create_organization();

				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/create_organisation');
			}
		}

		$this->load->view('admin/create_organisation', $data);
	}



	public function edit_create_organisation($id)
	{
		$this->load->model("admin_modal");


		$data['get_district_data'] = $this->admin_modal->get_district_data();
		$data['get_hcf_data'] = $this->admin_modal->hcf_master();
		$data['get_org_data'] = $this->admin_modal->edit_create_organisation($id);
		$data['get_org_cat'] = $this->admin_modal->get_org_cat();
		$data['adv_unit'] = $this->admin_modal->get_department();

		if ($this->input->post()) {

			$this->form_validation->set_rules('cat_name', 'HCF Name', 'required|xss_clean');
			//$this->form_validation->set_rules('email','Email','required|valid_email|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('district', 'District', 'required|xss_clean');
			$this->form_validation->set_rules('hcf_category', 'Type', 'required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('department', 'Division', 'required|xss_clean');
			$this->form_validation->set_rules('area', 'Area', 'required|xss_clean');
			$this->form_validation->set_rules('org_short_name', 'Short Name', 'required|xss_clean|min_length[5]|max_length[5]');
			$this->form_validation->set_rules('mediacl_type', 'Category', 'required|xss_clean');
			$this->form_validation->set_rules('Pincode', 'Pincode', 'required|xss_clean|min_length[6]|max_length[6]');
			$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');
			$this->form_validation->set_rules('manager_name', 'Manager Name', 'required|xss_clean');
			$this->form_validation->set_rules('manager_mobile', 'Manager Mobile', 'required|xss_clean|min_length[10]|max_length[10]');
			$this->form_validation->set_rules('longitude', 'Longitude', 'required|xss_clean');
			$this->form_validation->set_rules('latitude', 'Latitude', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->update_create_organisation($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}


				return	redirect('index.php/admin/create_organisation');
			}
		}
		$this->load->view('admin/create_organization_edit.php', $data);
	}



	public function delete_create_organisation($id)
	{
		$this->load->model("admin_modal");
		$this->admin_modal->delete_create_organisation($id);
		return redirect('index.php/admin/create_organisation');
	}

	public function remove_create_organisation($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->remove_create_organisation($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Removed Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Remove Data!');
		}

		return	redirect('index.php/admin/create_organisation');
	}



	// public function organisation_access()
	// {
	// 	$this ->load->model("admin_modal");
	// 	$data['get_organization_data'] = $this->admin_modal->get_organization_data();
	// 	$data['get_organization_access_master'] = $this->admin_modal->get_organization_access_master();
	// 	$this->load->view('admin/organisation_access', $data);
	// }

	// public function create_org_access_master()
	// {
	// 	$this->input->post();
	// 	$this ->load->model("admin_modal");
	// 	$this->admin_modal->insert_org_access__master();
	// }


	// public function edit_org_access($id)
	// {

	// 	$this ->load->model("admin_modal");
	// 	$data['get_org_data'] =$this->admin_modal->edit_org_access($id);
	// 	$data['get_organization_data'] = $this->admin_modal->get_organization_data();

	// 	$this->load->view('admin/organization_access_edit.php',$data);
	// }

	// public function update_org_access($id)
	// {

	// 	$this ->load->model("admin_modal");
	// 	$this->admin_modal->update_org_access($id);



	// }
	// public function delete_org_access($id)
	// {

	// 	$this ->load->model("admin_modal");
	// 	$this->admin_modal->delete_org_access($id);
	// 	redirect('index.php/admin/organisation_access');



	// }

	// public function remove_org_access($id){
	// 	$this ->load->model("admin_modal");
	// 	$this->admin_modal->remove_org_access($id);

	// 	return	redirect('index.php/admin/organisation_access');

	// }



	public function waste_master()
	{
		$this->input->post();
		$this->load->model("admin_modal");
		$this->load->model("user_model");
		$data['get_waste_data'] = Array();
		$data['get_waste_category_data'] = $this->user_model->fetch_category();

		if ($this->input->post()) {


			$this->form_validation->set_rules('category', 'Category', 'required|xss_clean|is_unique[waste_category.category]');
			$this->form_validation->set_rules('remark', 'remark', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$this->admin_modal->insert_waste_master();
				return	redirect('index.php/admin/waste_master');
			}
		}
		$this->load->view('admin/waste_master', $data);
	}


	public function waste_master_edit($id)
	{


		$this->load->model("admin_modal");
		$this->load->model("user_model");
		$data['get_waste_data'] = $this->admin_modal->waste_master_edit($id);
		$data['get_waste_category_data'] = $this->user_model->fetch_category();
		if ($this->input->post()) {


			$this->form_validation->set_rules('category', 'Category', 'required|xss_clean');
			$this->form_validation->set_rules('remark', 'remark', 'required|xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$this->admin_modal->waste_master_update($id);
				return	redirect('index.php/admin/waste_master');
			}
		}




		$this->load->view('admin/waste_master', $data);
	}
	public function waste_master_remove($id)
	{
		$this->load->model("admin_modal");
		$this->admin_modal->remove_waste_master($id);
		return	redirect('index.php/admin/waste_master');
	}




	public function waste_master_delete($id)
	{
		$this->load->model("admin_modal");
		$this->admin_modal->delete_waste_master($id);
	}

	public function hcf_master()
	{
		$this->load->model("admin_modal");
		$data['get_hcf_data'] = $this->admin_modal->hcf_master();

		if ($this->input->post()) {

			$this->form_validation->set_rules('Type', 'Type', 'required|xss_clean|is_unique[hcf_master.Type]');
			$this->form_validation->set_rules('Type_code', 'Type Code', 'required|xss_clean|is_unique[hcf_master.Type_code]');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->hcf_master_insert();

				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/hcf_master');
			}
		}

		$this->load->view('admin/hcf_master', $data);
	}



	public function hcf_master_delete($id)
	{
		$this->load->model("admin_modal");
		$this->admin_modal->hcf_master_delete($id);
	}

	public function hcf_master_edit($id)
	{
		$this->load->model("admin_modal");
		$data['get_hcf_data'] = $this->admin_modal->hcf_master_edit($id);

		if ($this->input->post()) {


			$this->form_validation->set_rules('Type', 'Type', 'required|xss_clean');
			$this->form_validation->set_rules('Type_code', 'Type Code', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->hcf_master_update($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/hcf_master');
			}
		}

		$this->load->view('admin/hcf_master_edit.php', $data);
	}

	public function hcf_master_remove($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->remove_hcf_master($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Removed Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Remove Data!');
		}
		return	redirect('index.php/admin/hcf_master');
	}


	public function vc_type_master()
	{
		$this->load->model("admin_modal");
		$data['get_vehicle_data'] = $this->admin_modal->vc_type_master();

		if ($this->input->post()) {

			$this->form_validation->set_rules('vc_type_name', 'Type', 'required|xss_clean');
			$this->form_validation->set_rules('vc_type_desc', 'Description', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->vc_type_master_insert();

				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/vc_type_master');
			}
		}
		$this->load->view('admin/vc_type_master', $data);
	}

	public function vc_type_master_delete($id)
	{
		$this->load->model("admin_modal");
		$this->admin_modal->vc_type_master_delete($id);
	}

	public function vc_type_master_edit($id)
	{
		$this->load->model("admin_modal");
		$data['get_vc_data'] = $this->admin_modal->vc_type_master_edit($id);


		if ($this->input->post()) {

			$this->form_validation->set_rules('vc_type_name', 'Type', 'required|xss_clean');
			$this->form_validation->set_rules('vc_type_desc', 'Description', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->vc_type_master_update($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/vc_type_master');
			}
		}

		$this->load->view('admin/vc_type_master_edit.php', $data);
	}




	public function vc_type_master_remove($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->vc_type_master_remove($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Removed Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Remove Data!');
		}
		return	redirect('index.php/admin/vc_type_master');
	}

	public function treatment_plant_master()
	{
		$this->load->model("admin_modal");
		$data['get_district_data'] = $this->admin_modal->get_district_data();
		$data['get_treatment_data'] = $this->admin_modal->fetch_treatment_plant_master();
		$data['adv_unit'] = $this->admin_modal->get_department();
		if ($this->input->post()) {


			$this->form_validation->set_rules('name', 'CBWTF Name', 'required|xss_clean');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|is_unique[treatment_plant_mster.email]');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('district', 'District', 'required|xss_clean');
			$this->form_validation->set_rules('authorized_mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('department', 'Division', 'required|xss_clean');
			$this->form_validation->set_rules('area', 'Area', 'required|xss_clean');
			$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res =  $this->admin_modal->insert_treatment_plant_master();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/treatment_plant_master');
			}
		}



		$this->load->view('admin/treatment_plant_master', $data);
	}



	public function treatment_plant_master_delete($id)
	{
		$this->load->model("admin_modal");
		$this->admin_modal->treatment_plant_master_delete($id);
	}

	public function treatment_plant_master_edit($id)
	{
		$this->load->model("admin_modal");
		$data['get_district_data'] = $this->admin_modal->get_district_data();
		$data['get_treatment_data'] = $this->admin_modal->treatment_plant_master_edit($id);
		$data['adv_unit'] = $this->admin_modal->get_department();

		if ($this->input->post()) {


			$this->form_validation->set_rules('name', 'CBWTF Name', 'required|xss_clean');
			$this->form_validation->set_rules('address', 'Address', 'required|xss_clean');
			$this->form_validation->set_rules('district', 'District', 'required|xss_clean');
			$this->form_validation->set_rules('authorized_mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('department', 'Division', 'required|xss_clean');
			$this->form_validation->set_rules('area', 'Area', 'required|xss_clean');


			$this->form_validation->set_rules('date', 'Date', 'required|xss_clean');


			if ($this->form_validation->run() == FALSE) {
			} else {
				$res =  $this->admin_modal->treatment_plant_master_update($id);

				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/treatment_plant_master');
			}
		}

		$this->load->view('admin/treatment_plant_master_edit.php', $data);
	}



	public function treatment_plant_master_remove($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->treatment_plant_master_remove($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Removed Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Remove Data!');
		}
		return	redirect('index.php/admin/treatment_plant_master');
	}
	public function hcf_type_master()
	{
		$this->load->model("admin_modal");
		$data['get_hcf_data'] = $this->admin_modal->fetch_hcf_type_master();
		$this->load->view('admin/hcf_type_master', $data);
	}

	// public function treatment_plant_access()
	// {
	// 	$this ->load->model("admin_modal");
	//     $data['fetch_cbwtf'] = $this->admin_modal->fetch_treatment_plant_master();
	// 	$data['fetch_cbwtf_access'] = $this->admin_modal->fetch_treatment_plant_access_master();
	// 	$this->load->view('admin/cbwtf_access',$data);
	// }
	// public function insert_treatment_plant_access()
	// {
	// 	$this ->load->model("admin_modal");
	// 	$this->admin_modal->insert_treatment_plant_access();
	// 	redirect('index.php/admin/treatment_plant_access');
	// }


	// public function delete_cbwtf_access($id){
	// 	$this ->load->model("admin_modal");
	// 	$this->admin_modal->treatment_plant_master_delete($id);
	// }

	// public function edit_cbwtf_access($id){
	// 	$this ->load->model("admin_modal");
	// 	$data['fetch_cbwtf'] = $this->admin_modal->fetch_treatment_plant_master();
	// 	$data['fetch_cbwtf_access'] = $this->admin_modal->edit_cbwtf_access($id);
	// 	$this->load->view('admin/cbwtf_access_edit.php',$data);

	// }
	// public function update_cbwtf_access($id){
	// 	$this ->load->model("admin_modal");
	// 	$this->admin_modal->update_cbwtf_access($id);

	// }

	// public function remove_cbwtf_access($id){
	// 	$this ->load->model("admin_modal");
	// 	$this->admin_modal->remove_cbwtf_access($id);

	// }


	public function daily_report()
	{
		$this->load->model("admin_modal");
		$data['get_pdf_data'] = $this->admin_modal->daily_report();
		$this->load->view('admin/daily_report.php', $data);
	}

	public function transaction_report()
	{
		$data['get_district_data'] = $this->admin_modal->get_district_data();
		//$data['get_organization_data'] = $this->admin_modal->get_organization_data();
		$data['get_organization_data'] = $this->admin_modal->get_organization_data_for_report();
		$data['get_treatment_data'] = $this->admin_modal->fetch_treatment_plant_master();
		$data['get_vehicle_data'] = $this->admin_modal->fetch_vehicle();
		$this->load->view('admin/transaction_report.php', $data);
	}

	public function print_report()
	{
		$this->load->model("admin_modal");

		$data['get_pdf_data'] = $this->admin_modal->print_transaction_report();


		$this->load->view('admin/pdf_report.php', $data);
	}


	public function dashboard()
	{

		$this->load->model("admin_modal");

		if ($this->session->userdata('bmw_role') == 2) {
			$data['get_daily_data'] = $this->admin_modal->fetch_today_data2();
			$data['get_total_data'] = $this->admin_modal->fetch_total_data2();
			$data['get_hcf_wise_data'] = $this->admin_modal->waste_hcf_wise();
			$data['defaulters_data'] = $this->admin_modal->fetch_defaulters_district();
			$this->load->view('admin/index_dist.php', $data);
		} else {
			$data['get_daily_data'] = $this->admin_modal->fetch_today_data();
			$data['get_total_data'] = $this->admin_modal->fetch_total_data();
			$data['get_district_wise_data'] = $this->admin_modal->waste_district_wise();
			$data['defaulters_data'] = $this->admin_modal->fetch_defaulters();
			$this->load->view('admin/index.php', $data);
		}
	}



	public function track_vehicles()
	{
		if ($this->session->userdata('bmw_role') == 2) {
			$data['get_district_data'] = $this->admin_modal->get_particular_district_data();
		} else {
			$data['get_district_data'] = $this->admin_modal->get_district_data();
		}

		$this->load->view('admin/track_vehicle.php', $data);
	}

	public function date_wise_report()
	{
		if ($this->session->userdata('bmw_role') == 2) {
			$data['get_district_data'] = $this->admin_modal->get_particular_district_data();
		} else {
			$data['get_district_data'] = $this->admin_modal->get_district_data();
		}


		$data['get_organization_data'] = $this->admin_modal->get_organization_data_for_report();
		$data['get_treatment_data'] = $this->admin_modal->fetch_treatment_plant_master();
		$data['get_vehicle_data'] = $this->admin_modal->fetch_vehicle();
		$this->load->view('admin/date_wise_report.php', $data);
	}

	public function print_datewise_report()
	{

		$this->load->model("admin_modal");
		$data['get_pdf_data'] = $this->admin_modal->print_dateBetween_transaction_report();
		$data['input'] = $this->input->post();
		$result = $this->admin_modal->convert_HCF($data['input']['hcf']);
		$data['input']['hcf']  = $result['org_name'];

		$result = $this->admin_modal->convert_cbwtf($data['input']['cbwtf']);
		$data['input']['cbwtf']  = $result['Plant_name'];

		$this->load->view('admin/datewise_pdf_report.php', $data);
	}

	public function create_district_headquarter()
	{
		$this->load->model("admin_modal");
		$data['get_district_hq_data'] = $this->admin_modal->get_district_headquarter_data();
		$data['get_district_data'] = $this->admin_modal->get_district_data();

		if ($this->input->post()) {

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean|is_unique[admin.email]');
			$this->form_validation->set_rules('district', 'District', 'required|xss_clean|is_unique[admin.district]');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('designation', 'Designation', 'required|xss_clean');
			$this->form_validation->set_rules('auth_person', 'Authorised Person', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res =  $this->admin_modal->insert_district_hq();
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/create_district_headquarter');
			}
		}


		$this->load->view('admin/create_district_headquarter', $data);
	}
	public function delete_district_hq($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->district_head_quarter_delete($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}

		return	redirect('index.php/admin/create_district_headquarter');
	}

	public function delete_district_hq2($id)
	{
		$this->load->model("admin_modal");
		$res = $this->admin_modal->district_head_quarter_permanent_delete($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
		}

		return	redirect('index.php/admin/create_district_headquarter');
	}

	public function district_headquarter_edit($id)
	{
		$this->load->model("admin_modal");
		$data['get_district_hq_data'] = $this->admin_modal->district_headquarter_edit($id);
		$data['get_district_data'] = $this->admin_modal->get_district_data();

		if ($this->input->post()) {


			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|xss_clean');
			$this->form_validation->set_rules('district', 'District', 'required|xss_clean');
			$this->form_validation->set_rules('mobile', 'Mobile Number', 'required|min_length[10]|max_length[10]|xss_clean');
			$this->form_validation->set_rules('designation', 'Designation', 'required|xss_clean');
			$this->form_validation->set_rules('auth_person', 'Authorised Person', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->update_district_hq($id);
				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/create_district_headquarter');
			}
		}


		$this->load->view('admin/edit_district_headquarter', $data);
	}


	public function disposal_method_master()
	{

		$data['get_disposal_method_data'] = $this->admin_modal->fetch_disposal_methods();

		if ($this->input->post()) {


			$this->form_validation->set_rules('name', 'Disposal Method', 'required|xss_clean');

			if ($this->form_validation->run() == FALSE) {
			} else {
				$res = $this->admin_modal->insert_disposal_method();

				if ($res) {
					$this->session->set_flashdata('success', 'Success, Data Added Successfully.');
				} else {
					$this->session->set_flashdata('error', 'Error!, Failed To Add Data!');
				}
				return	redirect('index.php/admin/disposal_method_master');
			}
		}

		$this->load->view('admin/disposal_method_master', $data);
	}

	public function disposal_method_delete($id)
	{
		$res = $this->admin_modal->delete_disposal_method($id);
		if ($res) {
			$this->session->set_flashdata('success', 'Success, Data Removed Successfully.');
		} else {
			$this->session->set_flashdata('error', 'Error!, Failed To Remove Data!');
		}
		return	redirect('index.php/admin/disposal_method_master');
	}


	public function occupancy_average()
	{
		if ($this->session->userdata('bmw_role') == 2) {
			$data['get_district_data'] = $this->admin_modal->get_particular_district_data();
		} else {
			$data['get_district_data'] = $this->admin_modal->get_district_data();
		}
		$data['get_organization_data'] = $this->admin_modal->get_organization_data_for_report();
		$data['get_treatment_data'] = $this->admin_modal->fetch_treatment_plant_master();
		$data['get_vehicle_data'] = $this->admin_modal->fetch_vehicle();
		$this->load->view('admin/occupancy_average_report.php', $data);
	}

	public function hcf_profile()
	{

		$data['get_profile_data'] = $this->admin_modal->fetch_hcf_profile();

		$this->load->view('admin/hcf_profile.php', $data);
	}

	public function hcf_profile_report()
	{
		if ($this->session->userdata('bmw_role') == 2) {
			$data['get_district_data'] = $this->admin_modal->get_particular_district_data();
		} else {
			$data['get_district_data'] = $this->admin_modal->get_district_data();
		}

		$data['get_organization_data'] = $this->admin_modal->get_organization_data_for_report();

		$this->load->view('admin/hcf_profile_report.php', $data);
	}

	public function hcf_profile_excel()
	{


		$data['get_profile_data'] = $this->admin_modal->hcf_profile_excel();

		$this->load->view('admin/hcf_profile_excel.php', $data);
	}


	public function pending_report()
	{

		$data['get_pdf_data'] = $this->admin_modal->pending_report();

		$this->load->view('admin/pending_report', $data);
	}





	public function occupancy_average_print_report()
	{
		$this->load->model("admin_modal");

		$data['get_pdf_data'] = $this->admin_modal->print_average_report();
		$data['input'] = $this->input->post();
		$result = $this->admin_modal->convert_HCF($data['input']['hcf']);
		$data['input']['hcf']  = $result['org_name'];
		$this->load->view('admin/waste_average_pdf_report.php', $data);
	}

	public function track()
	{

		$this->load->view('admin/track.php');
	}

	public function fetch_track_data()
	{

		$data =	$this->admin_modal->fetch_track_data();
		echo json_encode($data);
	}


	public function ajax_get_vehicle()
	{

		$district = $this->input->post('district_name');
		$this->load->model("admin_modal");
		$data = $this->admin_modal->ajax_fetch_vehicle_data($district);
		echo json_encode(array($data));
	}
}
