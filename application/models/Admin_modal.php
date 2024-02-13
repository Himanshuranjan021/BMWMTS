<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_modal extends CI_Model
{

	public function insert_district()
	{
		$state_name = $this->input->post('state_name') ? htmlspecialchars(strip_tags($this->input->post('state_name'))) : '';
		$district = $this->input->post('district') ? htmlspecialchars(strip_tags($this->input->post('district'))) : '';
		$data = array(
			'state'             => $state_name,
			'name'             => $district
		);
		$res =  $this->db->insert('district', $data);
		return	$res;
	}
	public function get_district_data()
	{

		$this->db->select('*');
		$this->db->order_by('name', 'ASC')->where('remove', NULL);
		$query = $this->db->get('district');
		return $query->result_array();
	}



	public function get_district_edit_data($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('district');
		return $query->row_array();
	}

	public function update_district_data($id)
	{
		$state = $this->input->post('state') ? htmlspecialchars(strip_tags($this->input->post('state'))) : '';
		$name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';
		$data = array(

			'state'  => $state,
			'name'      => $name,
		);

		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('district', $data);
		return	$res;
	}

	public function remove_district_data($id)
	{

		$data = ['remove'  => 1,];

		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('district', $data);
		return	$res;
	}


	public function org_cat_edit($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$query = $this->db->get('organization_category');
		return $query->row_array();
	}

	public function org_cat_master_update($id)
	{
		$name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';
		$note = $this->input->post('note') ? htmlspecialchars(strip_tags($this->input->post('note'))) : '';
		$data = array(

			'name'  => $name,
			'note'      => $note,
		);

		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('organization_category', $data);
		return	$res;
	}

	public function remove_org_cat_data($id)
	{

		$data = ['remove'  => 1,];

		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('organization_category', $data);
		return	$res;
	}

	public function district_delete($dis_id)
	{
		$this->db->where('id', $dis_id);
		$res =  $this->db->delete('district');
		return	$res;
	}


	public function get_org_cat()
	{
		$this->db->select('*');
		$query = $this->db->where('remove', NULL)->get('organization_category');
		return $query->result_array();
	}
	public function insert_organizaton_categort()
	{
		$cat_name = $this->input->post('cat_name') ? htmlspecialchars(strip_tags($this->input->post('cat_name'))) : '';
		$note = $this->input->post('note') ? htmlspecialchars(strip_tags($this->input->post('note'))) : '';
		$data = array(
			'name'             => $cat_name,
			'note'             => $note
		);
		$res =   $this->db->insert('organization_category', $data);
		return	$res;
	}
	public function org_cat_delete($org_id)
	{
		$this->db->where('id', $org_id);
		$res = $this->db->delete('organization_category');
		return	$res;
	}



	public function get_department()
	{
		$this->db->select('*');
		$query = $this->db->where('remove', NULL)->get('department');
		return $query->result_array();
	}

	public function insert_department()
	{
		$area_name = $this->input->post('area_name') ? htmlspecialchars(strip_tags($this->input->post('area_name'))) : '';
		$data = array(
			'name'             => $area_name
		);
		$res = $this->db->insert('department', $data);
		return	$res;
	}

	public function department_delete($area_id)
	{
		$this->db->where('id', $area_id);
		$res = $this->db->delete('area');
		return	$res;
	}

	public function department_remove($id)
	{

		$data = ['remove'  => 1,];

		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('department', $data);
		return	$res;
	}



	public function get_organization_data()
	{
		$this->db->select('*');
		$this->db->where('remove', NULL);
		$query = $this->db->get('organization_master');
		return $query->result_array();
	}


	public function create_organization()
	{
		$admin_id = $this->session->userdata('bmw_admin_id');
		$this->db->select('district')
			->where('id', $admin_id);
		$query = $this->db->get('admin');
		$result = $query->row_array();
		$district = $result['district'];



		$random_number = rand(1111, 9999);
		$session_id = substr(md5(microtime()), rand(0, 26), 6);


		$hcf_code = $this->input->post('hcf_code') ? htmlspecialchars(strip_tags($this->input->post('hcf_code'))) : '';
		$email = $this->input->post('email') ? htmlspecialchars(strip_tags($this->input->post('email'))) : '';
		$org_short_name = $this->input->post('org_short_name') ? htmlspecialchars(strip_tags($this->input->post('org_short_name'))) : '';
		$pincode = $this->input->post('Pincode') ? htmlspecialchars(strip_tags($this->input->post('Pincode'))) : '';
		$cat_name = $this->input->post('cat_name') ? htmlspecialchars(strip_tags($this->input->post('cat_name'))) : '';
		$mobile   = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
		$address = $this->input->post('address') ? htmlspecialchars(strip_tags($this->input->post('address'))) : '';
		//$district = $this->input->post('district')?htmlspecialchars(strip_tags($this->input->post('district'))):''; 
		$department = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
		$area = $this->input->post('area') ? htmlspecialchars(strip_tags($this->input->post('area'))) : '';
		$mediacl_type = $this->input->post('mediacl_type') ? htmlspecialchars(strip_tags($this->input->post('mediacl_type'))) : '';
		$manager_name = $this->input->post('manager_name') ? htmlspecialchars(strip_tags($this->input->post('manager_name'))) : '';
		$manager_mobile = $this->input->post('manager_mobile') ? htmlspecialchars(strip_tags($this->input->post('manager_mobile'))) : '';
		$date = $this->input->post('date') ? htmlspecialchars(strip_tags($this->input->post('date'))) : '';
		$hcf_category = $this->input->post('hcf_category') ? htmlspecialchars(strip_tags($this->input->post('hcf_category'))) : '';

		$this->db->select('Type_code')
			->where('Type', $hcf_category);
		$query = $this->db->get('hcf_master');
		$result = $query->row_array();
		$Type_code = $result['Type_code'];


		$organization_spl_code = $org_short_name . "" . $pincode . "" . $Type_code . "" . $hcf_code;
		$data = array(
			'org_name'            	 => $cat_name,
			'mobile'            	 => $mobile,
			'address'             	=> $address,
			'district'             	=> $district,
			'department'             => $department,
			'area'            		 => $area,
			'medical_type'            => $mediacl_type,
			'manager_name'            => $manager_name,
			'manager_mobile'            => $manager_mobile,
			'date'            			 => $date,
			'random_number'             => $hcf_code,
			'Pincode'					=> $pincode,
			'short_name'				=> $org_short_name,
			'hcf_category'				=> $hcf_category,
			'email'						=> $email,
			'session_id'				 => $session_id,
			'organization_spl_code' => $organization_spl_code,
		);

		//organization_master insert
		$this->db->insert('organization_master', $data);

		function generateRandomString($length = 8)
		{
			$characters = '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKMNOPQRSTUVWXYZ@#*&';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}


		$username = $org_short_name . "" . $hcf_code;
		//$password = generateRandomString();
		$password = $username;
		$hash = password_hash($password, PASSWORD_DEFAULT);
		//$username = $org_short_name . '@' . rand(111, 999);

		//organization_access insert
		$this->db->select('*');
		$this->db->where('org_name', $cat_name);
		$query = $this->db->get('organization_master');
		$row = $query->row_array();
		$org_id = $row['id'];

		$data1 = array(
			'org_name'            	 => $cat_name,
			'auth_mobile'            => $mobile,
			'date'            		 => $date,
			'org_random_number'      => $random_number,
			'session_id'		     => $session_id,
			'password' 				 => $hash,
			'user_name' 			 => $username,
			'org_id'				 => $org_id,

		);
		$res =	$this->db->insert('organization_access_master', $data1);



		//Sending mail;
		$html = "Your UserName: " . $username . '<br>' . "And Password:" . $password;

		$to = $email;
		$subject = "verfication";
		$msg = $html;

		// Load the email library
		$this->load->library('email');
		// Sender's email address
		$this->email->from('info@bmwodisha.in', 'BMW ODISHA');
		// Recipient's email address
		$this->email->to($to);
		// Email subject
		$this->email->subject($subject);
		// Email message
		$this->email->message($html);
		// Send the email
		if ($this->email->send()) {
			//echo 'Email sent successfully.';
		} else {
			//echo 'Email sending failed. Error: ' . $this->email->print_debugger();
			//exit;
		}
		return	$res;
	}

	public function  edit_create_organisation($id)
	{


		$this->db->select('*')->where('id', $id);
		$query = $this->db->get('organization_master');
		return $query->row_array();
	}

	public function  update_create_organisation($id)
	{

		//$email = $this->input->post('email')?htmlspecialchars(strip_tags($this->input->post('email'))):''; 
		$org_short_name = $this->input->post('org_short_name') ? htmlspecialchars(strip_tags($this->input->post('org_short_name'))) : '';
		$pincode = $this->input->post('Pincode') ? htmlspecialchars(strip_tags($this->input->post('Pincode'))) : '';
		$cat_name = $this->input->post('cat_name') ? htmlspecialchars(strip_tags($this->input->post('cat_name'))) : '';
		$mobile   = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
		$address = $this->input->post('address') ? htmlspecialchars(strip_tags($this->input->post('address'))) : '';
		$district = $this->input->post('district') ? htmlspecialchars(strip_tags($this->input->post('district'))) : '';
		$department = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
		$area = $this->input->post('area') ? htmlspecialchars(strip_tags($this->input->post('area'))) : '';
		$mediacl_type = $this->input->post('mediacl_type') ? htmlspecialchars(strip_tags($this->input->post('mediacl_type'))) : '';
		$manager_name = $this->input->post('manager_name') ? htmlspecialchars(strip_tags($this->input->post('manager_name'))) : '';
		$manager_mobile = $this->input->post('manager_mobile') ? htmlspecialchars(strip_tags($this->input->post('manager_mobile'))) : '';
		$date = $this->input->post('date') ? htmlspecialchars(strip_tags($this->input->post('date'))) : '';
		$random_number = $this->input->post('random_number') ? htmlspecialchars(strip_tags($this->input->post('random_number'))) : '';
		$hcf_category = $this->input->post('hcf_category') ? htmlspecialchars(strip_tags($this->input->post('hcf_category'))) : '';
		$data = array(
			'org_name'            	 => $cat_name,
			'mobile'            	 => $mobile,
			'address'             	=> $address,
			'department'             => $department,
			'area'            		 => $area,
			'medical_type'            => $mediacl_type,
			'manager_name'            => $manager_name,
			'manager_mobile'            => $manager_mobile,
			'date'            			 => $date,
			'random_number'             => $random_number,
			'Pincode'					=> $pincode,
			'short_name'				=> $org_short_name,
			'hcf_category'				=> $hcf_category,


		);

		$res = 	$this->db->select('*')->where('id', $id)->update('organization_master', $data);

		return	$res;
	}


	public function delete_create_organisation($id)
	{

		$res = $this->db->select('*')->where('id', $id)->delete('organization_master');
		return	$res;
	}


	public function remove_create_organisation($id)
	{

		$data = ['remove'  => 1,];


		$this->db->where('id', $id);
		$this->db->update('organization_master', $data);


		$this->db->where('org_id', $id);
		$res = $this->db->update('organization_access_master', $data);
		return	$res;
	}



	// public function get_organization_access_master()
	// { 
	// 	// $query = $this->db->query('SELECT * FROM organization_access_master');
	// 	 //return $query->result_array();


	// 	 $this->db->select('*'); 
	// 	 $query =$this->db->get('organization_access_master');
	// 	 return $query->result_array();


	// }
	// public function insert_org_access__master()
	// {
	// 	$date = date('Y-m-d h:i:s');
	// 	$org    = $this->input->post('org')?htmlspecialchars(strip_tags($this->input->post('org'))):''; 
	// 	$user_name   = $this->input->post('user_name')?htmlspecialchars(strip_tags($this->input->post('user_name'))):''; 
	// 	$Password    = md5($this->input->post('password')) ;  
	// 	$auther_mobile    = $this->input->post('auther_mobile')?htmlspecialchars(strip_tags($this->input->post('auther_mobile'))):''; 

	// 	$this->db->select('*');
	// 	$this->db->where('org_name',$org); 
	// 	$query =$this->db->get('organization_master');
	// 	$row = $query->row_array();
	// 	$org_id = $row['id'];
	// 	$org_rand_num = $row['random_number'];


	// 	$data = array(  
	//                     'org_name'          => $org,
	//                     'password'         => $Password,
	//                     'user_name'        => $user_name,
	//                     'auth_mobile'       => $auther_mobile,
	// 					'org_random_number' =>$org_rand_num,
	// 					'org_id'            => $org_id,
	// 					'date'              =>$date,
	//                     );  
	//       $this->db->insert('organization_access_master',$data); 
	//     redirect('index.php/admin/organisation_access');

	// }

	// public function edit_org_access($id){


	// 	$query=	$this->db->select('*')->where('id',$id)->get('organization_access_master');
	// 	return $query->result_array();
	// }


	// public function update_org_access($id){
	// 	$org    = $this->input->post('org')?htmlspecialchars(strip_tags($this->input->post('org'))):''; 
	// 	$user_name   = $this->input->post('user_name')?htmlspecialchars(strip_tags($this->input->post('user_name'))):''; 
	// 	$Password    = md5($this->input->post('password')) ;  
	// 	$auther_mobile    = $this->input->post('auther_mobile')?htmlspecialchars(strip_tags($this->input->post('auther_mobile'))):''; 
	// 	$data = array(  
	//                     'org_name'       => $org,
	//                     'password'         => $Password,
	//                     'user_name'        => $user_name,
	//                     'auth_mobile'  => $auther_mobile
	//                     );  
	// //print_r($data);

	// $this->db->select('*')->where('id',$id)->update('organization_access_master',$data);

	// redirect('index.php/admin/organisation_access');
	// }

	// public function delete_org_access($id){

	// 	$this->db->where('id',$id)->delete('organization_access_master');

	// }


	// public function remove_org_access($id){

	// 	$data = [  'remove'  => 1, ];  

	// 	$this->db->select('*');
	// 	$this->db->where('id',$id); 
	// 	$this->db->update('organization_access_master',$data);
	// 	redirect('index.php/admin/organisation_access');

	//  } 




	public function insert_waste_master()
	{
		$category = $this->input->post('category') ? htmlspecialchars(strip_tags($this->input->post('category'))) : '';
		$remark = $this->input->post('remark') ? htmlspecialchars(strip_tags($this->input->post('remark'))) : '';
		$data = array(

			'category'  => $category,
			'remark' => $remark,
		);
		$res = 	$this->db->insert('waste_category', $data);
		return	$res;
	}


	public function delete_waste_master($id)
	{
		$this->db->where('id', $id);
		$res =  $this->db->delete('waste_category');
		return	$res;
	}



	public function waste_master_edit($id)
	{

		$this->db->select('*')->where('id', $id);
		$query = $this->db->get('waste_category');
		return $query->row_array();
	}

	public function waste_master_update($id)
	{
		$category = $this->input->post('category') ? htmlspecialchars(strip_tags($this->input->post('category'))) : '';
		$remark = $this->input->post('remark') ? htmlspecialchars(strip_tags($this->input->post('remark'))) : '';
		$data = array(

			'category'  => $category,
			'remark' => $remark,
		);

		$this->db->select('*');
		$this->db->where('id', $id);
		$res =  $this->db->update('waste_category', $data);
		return	$res;
	}



	public function remove_waste_master($id)
	{

		$data = ['remove'  => 1,];

		$this->db->select('*');
		$this->db->where('id', $id);
		$res  = $this->db->update('waste_category', $data);
		return	$res;
	}


	public function hcf_master()
	{
		$this->db->select('*');
		$query = $this->db->where('remove', NULL)->get('hcf_master');
		return $query->result_array();
	}

	public function get_organization_data_district_wise()
	{

		$admin_id = $this->session->userdata('bmw_admin_id');
		$this->db->select('district')
			->where('id', $admin_id);
		$query = $this->db->get('admin');
		$result = $query->row_array();
		$district = $result['district'];

		$this->db->select('*');
		$query = $this->db->where('remove', NULL)->where('district', $district)->get('organization_master');
		$result = $query->result_array();
		/* foreach($result as $obj)
		{
			$organization_spl_code = $obj['short_name'].$obj['Pincode'];
			$hash = password_hash($organization_spl_code, PASSWORD_DEFAULT);
			$username = $organization_spl_code;
			$org_id = $obj['id'];
			$data1 = array(
				'org_name'            	 => $obj['org_name'],
				'auth_mobile'            => $obj['mobile'],
				'date'            		 => date('Y-m-d'),
				'org_random_number'      => $obj['random_number'],
				'session_id'		     => $obj['random_number'],
				'password' 				 => $hash,
				'user_name' 			 => $username,
				'org_id'				 => $org_id,

			);
			$res =	$this->db->insert('organization_access_master', $data1);
		} */
		return $result;
	}



	public function hcf_master_insert()
	{
		$type = $this->input->post('Type') ? htmlspecialchars(strip_tags($this->input->post('Type'))) : '';
		$type_code = $this->input->post('Type_code') ? htmlspecialchars(strip_tags($this->input->post('Type_code'))) : '';
		$data = array(

			'Type'  => $type,
			'Type_code'      => $type_code,
		);
		$res = $this->db->insert('hcf_master', $data);
		return	$res;
	}

	public function hcf_master_delete($id)
	{
		$this->db->where('id', $id);
		$res = $this->db->delete('hcf_master');
		return	$res;
	}

	public function hcf_master_edit($id)
	{


		$this->db->select('*')->where('id', $id);
		$query = $this->db->get('hcf_master');
		return $query->row_array();
	}

	public function hcf_master_update($id)
	{
		$type = $this->input->post('Type') ? htmlspecialchars(strip_tags($this->input->post('Type'))) : '';
		$type_code = $this->input->post('Type_code') ? htmlspecialchars(strip_tags($this->input->post('Type_code'))) : '';
		$data = array(

			'Type'  => $type,
			'Type_code'      => $type_code,
		);

		$this->db->select('*');
		$this->db->where('id', $id);
		$res =  $this->db->update('hcf_master', $data);
		return	$res;
	}



	public function remove_hcf_master($id)
	{

		$data = ['remove'  => 1,];

		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('hcf_master', $data);
		return	$res;
	}


	public function vc_type_master()
	{

		$this->db->select('*')->where('remove', NULL);
		$query = $this->db->get('vc_type_master');
		return $query->result_array();
	}




	public function vc_type_master_insert()
	{
		$vc_type_name = $this->input->post('vc_type_name') ? htmlspecialchars(strip_tags($this->input->post('vc_type_name'))) : '';
		$vc_type_desc = $this->input->post('vc_type_desc') ? htmlspecialchars(strip_tags($this->input->post('vc_type_desc'))) : '';
		$data = array(

			'vc_type_name'  => $vc_type_name,
			'vc_type_desc'      => $vc_type_desc,
		);
		$res =	$this->db->insert('vc_type_master', $data);
		return	$res;
	}

	public function vc_type_master_delete($id)
	{
		$this->db->where('id', $id);
		$res = $this->db->delete('vc_type_master');
		return	$res;
	}

	public function vc_type_master_edit($id)
	{

		$this->db->select('*')->where('id', $id);
		$query = $this->db->get('vc_type_master');
		return $query->row_array();
	}

	public function vc_type_master_update($id)
	{
		$vc_type_name = $this->input->post('vc_type_name') ? htmlspecialchars(strip_tags($this->input->post('vc_type_name'))) : '';
		$vc_type_desc = $this->input->post('vc_type_desc') ? htmlspecialchars(strip_tags($this->input->post('vc_type_desc'))) : '';
		$data = array(

			'vc_type_name'  => $vc_type_name,
			'vc_type_desc'      => $vc_type_desc,
		);

		$this->db->select('*');
		$this->db->where('id', $id);
		$res =   $this->db->update('vc_type_master', $data);
		return	$res;
	}

	public function vc_type_master_remove($id)
	{

		$data = ['remove'  => 1,];

		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('vc_type_master', $data);
		return	$res;
	}

	public function treatment_plant_master()
	{
		$this->db->select('*')->where('remove', NULL);
		$query = $this->db->get('treatment_plant_mster');
		return $query->result_array();
	}



	public function insert_treatment_plant_master()
	{
		$session_id = substr(md5(microtime()), rand(0, 26), 6);



		$plant_name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';
		$address = $this->input->post('address') ? htmlspecialchars(strip_tags($this->input->post('address'))) : '';
		$district = $this->input->post('district') ? htmlspecialchars(strip_tags($this->input->post('district'))) : '';
		$department = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
		$area = $this->input->post('area') ? htmlspecialchars(strip_tags($this->input->post('area'))) : '';
		$email = $this->input->post('email') ? htmlspecialchars(strip_tags($this->input->post('email'))) : '';
		$authorized_mobile = $this->input->post('authorized_mobile') ? htmlspecialchars(strip_tags($this->input->post('authorized_mobile'))) : '';
		$date = $this->input->post('date') ? htmlspecialchars(strip_tags($this->input->post('date'))) : '';
		$random_number = $this->input->post('random_number') ? htmlspecialchars(strip_tags($this->input->post('random_number'))) : '';
		$data = array(
			'plant_name'            	 => $plant_name,
			'address'             	=> $address,
			'district'             	=> $district,
			'department'             => $department,
			'area'            		 => $area,
			'authorise_mobile'            => $authorized_mobile,
			'date'            			 => $date,
			'email'            			 => $email,
			'session_id' =>	$session_id,

		);
		$this->db->insert('treatment_plant_mster', $data);

		//CBWTF access insert


		function generateRandomString($length = 8)
		{
			$characters = '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ@#*&';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}

		$username = substr($plant_name, 0, 4) . '@' . rand(1111, 9999);
		//$password = generateRandomString();
		$password = $username;
		$hash = password_hash($password, PASSWORD_DEFAULT);

		$this->db->select('*');
		$this->db->where('plant_name', $plant_name);
		$query = $this->db->get('treatment_plant_mster');
		$row = $query->row_array();
		$plant_id = $row['id'];





		$data = array(
			'Plant_name'            	=> $plant_name,
			'user_name'             	=> $username,
			'session_id'                =>	$session_id,
			'password'             	    => $hash,
			'plant_master_id'           => $plant_id,
			'reg_mobile'                 => $authorized_mobile,
			'date'            			 => $date,


		);
		$res = $this->db->insert('treatment_plant_access', $data);



		//Sending mail
		$html = "Your UserName: " . $username . '<br>' . "And Password: " . $password;
		$to = $email;
		$subject = "verfication";
		$msg = $html;

		// Load the email library
		$this->load->library('email');
		// Sender's email address
		$this->email->from('info@bmwodisha.in', 'BMW ODISHA');
		// Recipient's email address
		$this->email->to($to);
		// Email subject
		$this->email->subject($subject);
		// Email message
		$this->email->message($html);
		// Send the email
		if ($this->email->send()) {
			//echo 'Email sent successfully.';
		} else {
			//echo 'Email sending failed. Error: ' . $this->email->print_debugger();
			//exit;
		}
		return	$res;
	}


	public function  fetch_treatment_plant_master()
	{

		$query = $this->db->select('*')->where('remove', NULL)->get('treatment_plant_mster');
		return $query->result_array();
	}

	public function treatment_plant_master_edit($id)
	{

		$this->db->select('*')->where('id', $id);
		$query = $this->db->get('treatment_plant_mster');
		return $query->row_array();
	}

	public function treatment_plant_master_update($id)
	{
		$plant_name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';

		$address = $this->input->post('address') ? htmlspecialchars(strip_tags($this->input->post('address'))) : '';
		$district = $this->input->post('district') ? htmlspecialchars(strip_tags($this->input->post('district'))) : '';
		$department = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
		$area = $this->input->post('area') ? htmlspecialchars(strip_tags($this->input->post('area'))) : '';

		$authorized_mobile = $this->input->post('authorized_mobile') ? htmlspecialchars(strip_tags($this->input->post('authorized_mobile'))) : '';
		$date = $this->input->post('date') ? htmlspecialchars(strip_tags($this->input->post('date'))) : '';
		$random_number = $this->input->post('random_number') ? htmlspecialchars(strip_tags($this->input->post('random_number'))) : '';
		$data = array(
			'plant_name'            	 => $plant_name,
			'address'             	=> $address,
			'district'             	=> $district,
			'department'             => $department,
			'area'            		 => $area,
			'authorise_mobile'            => $authorized_mobile,
			'date'            			 => $date,


		);

		$this->db->select('*');
		$this->db->where('id', $id);
		$res = $this->db->update('treatment_plant_mster', $data);
		return	$res;
	}

	public function treatment_plant_master_remove($id)
	{

		$data = ['remove'  => 1,];

		$this->db->where('id', $id);
		$res =	$this->db->update('treatment_plant_mster', $data);

		$this->db->where('plant_master_id', $id);
		$res =	$this->db->update('treatment_plant_access', $data);


		return	$res;
	}

	public function treatment_plant_master_delete($id)
	{
		$this->db->where('id', $id);
		$res = $this->db->delete('treatment_plant_mster');
		return	$res;
	}


	public function fetch_hcf_type_master()
	{

		$this->db->select('*')->where('remove', NULL);
		$query = $this->db->get('hcf_type_master');
		return $query->result_array();
	}

	// public function insert_treatment_plant_access()
	// {

	// 	$Plant_name    = $this->input->post('Plant_name')?htmlspecialchars(strip_tags($this->input->post('Plant_name'))):''; 
	// 	$user_name   = $this->input->post('user_name')?htmlspecialchars(strip_tags($this->input->post('user_name'))):''; 
	// 	$Password    = md5($this->input->post('password')) ;  
	// 	$auther_mobile    = $this->input->post('auther_mobile')?htmlspecialchars(strip_tags($this->input->post('auther_mobile'))):''; 

	// 	$this->db->select('*');
	// 	$this->db->where('Plant_name',$Plant_name); 
	// 	$query =$this->db->get('treatment_plant_mster');
	// 	$row = $query->row_array();
	// 	$org_id = $row['id'];



	// 	$data = array(  
	//                     'Plant_name'         => $Plant_name,
	//                     'password'         	=> $Password,
	//                     'user_name'        	=> $user_name,
	//                     'reg_mobile'       => $auther_mobile,
	// 					'plant_master_id'           => $org_id,
	// 					'date'               =>date('Y-m-d h:i:s'),
	//                     );  
	//       $this->db->insert('treatment_plant_access',$data); 



	// }

	// public function fetch_treatment_plant_access_master(){


	// 	$this->db->select('*')->where('remove',NULL); 
	// 	$query =$this->db->get('treatment_plant_access');
	// 	return $query->result_array();


	// }

	// public function edit_cbwtf_access($id)
	// { 


	// 	$this->db->select('*')->where('id',$id); 
	// 	$query =$this->db->get('treatment_plant_access');
	// 	return $query->row_array();
	// }

	// public function update_cbwtf_access($id)
	// { 
	// 	$Plant_name    = $this->input->post('Plant_name')?htmlspecialchars(strip_tags($this->input->post('Plant_name'))):''; 
	// 	$user_name   = $this->input->post('user_name')?htmlspecialchars(strip_tags($this->input->post('user_name'))):''; 
	// 	$Password    = md5($this->input->post('password')) ;  
	// 	$auther_mobile    = $this->input->post('auther_mobile')?htmlspecialchars(strip_tags($this->input->post('auther_mobile'))):''; 

	// 	$data = array(  
	// 		'Plant_name'         => $Plant_name,
	// 		'password'         	=> $Password,
	// 		'user_name'        	=> $user_name,
	// 		'reg_mobile'       => $auther_mobile,
	// 		'plant_master_id'           => $org_id,
	// 		'date'               =>date('Y-m-d h:i:s'),
	// 		);  


	//     $this->db->select('*');
	//     $this->db->where('id',$id); 
	//     $this->db->update('treatment_plant_access',$data);
	// 	redirect('index.php/admin/treatment_plant_access');
	// }

	// public function remove_cbwtf_access($id){

	// 	$data = [  'remove'  => 1, ];  

	// 	$this->db->select('*');
	// 	$this->db->where('id',$id); 
	// 	$this->db->update('treatment_plant_access',$data);
	// 	redirect('index.php/admin/treatment_plant_access');

	//  } 


	public function daily_report()
	{
		$date = date('Y-m-d');



		$role = $this->session->userdata('bmw_role');
		$admin_id = $this->session->userdata('bmw_admin_id');
		$this->db->select('district')
			->where('id', $admin_id);
		$query = $this->db->get('admin');
		$result = $query->row_array();
		$district = $result['district'];



		if ($role == 1) {

			$query = $this->db->query("SELECT *,
SUM(`code_weight`) as 'weight1',
SUM(CASE WHEN `waste_category`='White' THEN 1 else 0 end) as 'white_count',
SUM(CASE WHEN `waste_category`='Yellow' THEN 1 else 0 end) as 'yellow_count', 
SUM(CASE WHEN `waste_category`='Red' THEN 1 else 0 end) as 'red_count',
SUM(CASE WHEN `waste_category`='Blue' THEN 1 else 0 end) as 'blue_count',
SUM(CASE WHEN `waste_category`='White' THEN `code_weight` else 0 end) as 'white_weight' ,
SUM(CASE WHEN `waste_category`='Yellow' THEN `code_weight` else 0 end) as 'yellow_weight', 
SUM(CASE WHEN `waste_category`='Red' THEN `code_weight` else 0 end) as 'red_weight', 
SUM(CASE WHEN `waste_category`='Blue' THEN `code_weight` else 0 end) 'blue_weight',
SUM(`weight_at_plant`) as 'weight2',
SUM(CASE WHEN `category_at_plant`='White' THEN 1 else 0 end) as 'white_count2',
SUM(CASE WHEN `category_at_plant`='Yellow' THEN 1 else 0 end) as 'yellow_count2', 
SUM(CASE WHEN `category_at_plant`='Red' THEN 1 else 0 end) as 'red_count2',
SUM(CASE WHEN `category_at_plant`='Blue' THEN 1 else 0 end) as 'blue_count2',
SUM(CASE WHEN `category_at_plant`='White' THEN `weight_at_plant` else 0 end) as 'white_weight2' ,
SUM(CASE WHEN `category_at_plant`='Yellow' THEN `weight_at_plant` else 0 end) as 'yellow_weight2', 
SUM(CASE WHEN `category_at_plant`='Red' THEN `weight_at_plant` else 0 end) as 'red_weight2', 
SUM(CASE WHEN `category_at_plant`='Blue' THEN `weight_at_plant` else 0 end) 'blue_weight2'
From verify_barcode as v JOIN organization_master as o on v.org_master_id=o.id
 WHERE DATE(v.collection_date)= '$date' Group by o.org_name");
			return $query->result_array();
		} elseif ($role == 2) {

			$query = $this->db->query("SELECT *,
SUM(`code_weight`) as 'weight1',
SUM(CASE WHEN `waste_category`='White' THEN 1 else 0 end) as 'white_count',
SUM(CASE WHEN `waste_category`='Yellow' THEN 1 else 0 end) as 'yellow_count', 
SUM(CASE WHEN `waste_category`='Red' THEN 1 else 0 end) as 'red_count',
SUM(CASE WHEN `waste_category`='Blue' THEN 1 else 0 end) as 'blue_count',
SUM(CASE WHEN `waste_category`='White' THEN `code_weight` else 0 end) as 'white_weight' ,
SUM(CASE WHEN `waste_category`='Yellow' THEN `code_weight` else 0 end) as 'yellow_weight', 
SUM(CASE WHEN `waste_category`='Red' THEN `code_weight` else 0 end) as 'red_weight', 
SUM(CASE WHEN `waste_category`='Blue' THEN `code_weight` else 0 end) 'blue_weight',
SUM(`weight_at_plant`) as 'weight2',
SUM(CASE WHEN `category_at_plant`='White' THEN 1 else 0 end) as 'white_count2',
SUM(CASE WHEN `category_at_plant`='Yellow' THEN 1 else 0 end) as 'yellow_count2', 
SUM(CASE WHEN `category_at_plant`='Red' THEN 1 else 0 end) as 'red_count2',
SUM(CASE WHEN `category_at_plant`='Blue' THEN 1 else 0 end) as 'blue_count2',
SUM(CASE WHEN `category_at_plant`='White' THEN `weight_at_plant` else 0 end) as 'white_weight2' ,
SUM(CASE WHEN `category_at_plant`='Yellow' THEN `weight_at_plant` else 0 end) as 'yellow_weight2', 
SUM(CASE WHEN `category_at_plant`='Red' THEN `weight_at_plant` else 0 end) as 'red_weight2', 
SUM(CASE WHEN `category_at_plant`='Blue' THEN `weight_at_plant` else 0 end) 'blue_weight2'
From verify_barcode as v JOIN organization_master as o on v.org_master_id=o.id
WHERE DATE(v.collection_date) = '$date' AND o.district='$district' Group by o.org_name");
			return $query->result_array();
		} else {
		}
	}

	public function print_transaction_report()
	{


		$start    = $this->input->post('start');
		$end    = $this->input->post('end');
		$hcf    = $this->input->post('hcf');
		$cbwtf    = $this->input->post('cbwtf');
		$vehicle    = $this->input->post('vehicle');
		$district    = $this->input->post('district');


		$sql = "SELECT *,
	SUM(`code_weight`) as 'weight1',
	SUM(CASE WHEN `waste_category`='White' THEN 1 else 0 end) as 'white_count',
	SUM(CASE WHEN `waste_category`='Yellow' THEN 1 else 0 end) as 'yellow_count', 
	SUM(CASE WHEN `waste_category`='Red' THEN 1 else 0 end) as 'red_count',
	SUM(CASE WHEN `waste_category`='Blue' THEN 1 else 0 end) as 'blue_count',
	SUM(CASE WHEN `waste_category`='White' THEN `code_weight` else 0 end) as 'white_weight' ,
	SUM(CASE WHEN `waste_category`='Yellow' THEN `code_weight` else 0 end) as 'yellow_weight', 
	SUM(CASE WHEN `waste_category`='Red' THEN `code_weight` else 0 end) as 'red_weight', 
	SUM(CASE WHEN `waste_category`='Blue' THEN `code_weight` else 0 end) 'blue_weight',
	SUM(`weight_at_plant`) as 'weight2',
	SUM(CASE WHEN `category_at_plant`='White' THEN 1 else 0 end) as 'white_count2',
	SUM(CASE WHEN `category_at_plant`='Yellow' THEN 1 else 0 end) as 'yellow_count2', 
	SUM(CASE WHEN `category_at_plant`='Red' THEN 1 else 0 end) as 'red_count2',
	SUM(CASE WHEN `category_at_plant`='Blue' THEN 1 else 0 end) as 'blue_count2',
	SUM(CASE WHEN `category_at_plant`='White' THEN `weight_at_plant` else 0 end) as 'white_weight2' ,
	SUM(CASE WHEN `category_at_plant`='Yellow' THEN `weight_at_plant` else 0 end) as 'yellow_weight2', 
	SUM(CASE WHEN `category_at_plant`='Red' THEN `weight_at_plant` else 0 end) as 'red_weight2', 
	SUM(CASE WHEN `category_at_plant`='Blue' THEN `weight_at_plant` else 0 end) 'blue_weight2'
	From verify_barcode as v JOIN organization_master as o on v.org_master_id=o.id";
		//$sql.= "WHERE collection_date >= '$start ' AND collection_date <= '$end'";

		$sql .= " WHERE DATE(v.collection_date) = '$end'";
		//if($cbwtf!=''){$sql.= "AND WHERE `treatment_plant_name` = '$cbwtf'";}
		if ($hcf != '') {
			$sql .= "AND   v.org_master_id = '$hcf'";
		}
		//if($vehicle!=''){$sql.= "AND  `vehicle_number` = '$vehicle'";}
		//if($district!=''){$sql.= "AND  `district` = '$district'";}
		$sql .= "Group by o.org_name";
		$query = $this->db->query($sql);

		return $query->result_array();
	}



	public function fetch_today_data()
	{

		$this->db->select("category");
		$this->db->from("waste_collection");
		$this->db->where('DATE(date_time)', date('Y-m-d'));
		$query = $this->db->get();
		return $query->result_array();
	}

	public function fetch_total_data()
	{


		$this->db->select("*");
		$this->db->from("waste_collection");
		$query = $this->db->get();
		return $query->result_array();
	}




	public function  fetch_vehicle()
	{

		$query = $this->db->select('*')->where('remove', NULL)->get('org_vehicle_mster');
		return $query->result_array();
	}
	public function  waste_district_wise()
	{

		date_default_timezone_set('Asia/Kolkata');
		$start = date("Y-m-d H:i:s");
		$date = date('Y-m-d H:i', strtotime('-48 hour', strtotime($start)));



		$query = $this->db->select('*,o.district as district')
			->join('organization_master as o', 'v.org_master_id=o.id')
			//->where('DATE(v.collection_date)', date('Y-m-d'))
			->where('v.collection_date <', $date)
			->where('v.issue_date', NULL)->get('verify_barcode as v');
		return $query->result_array();
	}

	public function get_district_headquarter_data()
	{

		$this->db->select('*');
		$this->db->order_by('district', 'ASC')->where('role', 2)->where('status', 0);
		$query = $this->db->get('admin');
		return $query->result_array();
	}

	public function insert_district_hq()
	{

		$district = $this->input->post('district') ? htmlspecialchars(strip_tags($this->input->post('district'))) : '';
		$designation = $this->input->post('designation') ? htmlspecialchars(strip_tags($this->input->post('designation'))) : '';
		$mobile = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
		$email = $this->input->post('email') ? htmlspecialchars(strip_tags($this->input->post('email'))) : '';
		$auth_person = $this->input->post('auth_person') ? htmlspecialchars(strip_tags($this->input->post('auth_person'))) : '';

		function generateRandomString($length = 8)
		{
			$characters = '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ@#*&';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}



		$session_id = substr(md5(microtime()), rand(0, 26), 6);
		$username = 'CDMPHO'.substr(strtoupper($district), 0, 4);
		$password = $username;
		//$password = generateRandomString();
		$hash = password_hash($password, PASSWORD_DEFAULT);
		$data = array(

			'district'  => $district,
			'designation' => $designation,
			'mobile' 	=> $mobile,
			'date' => date('Y-m-d'),
			'auth_person' => $auth_person,
			'role' => 2,
			'email' => $email,
			'username' => $username,
			'status' => 0,
			'password' =>  $hash,
			'session_id' => $session_id,
		);
		$res = $this->db->insert('admin', $data);


		$html = "Your UserName: " . $username . '<br>' . "And Password:" . $password;

		$to = $email;
		$subject = "verfication";
		$msg = $html;
		
		// Load the email library
		$this->load->library('email');
		// Sender's email address
		$this->email->from('info@bmwodisha.in', 'BMW ODISHA');
		// Recipient's email address
		$this->email->to($to);
		// Email subject
		$this->email->subject($subject);
		// Email message
		$this->email->message($html);
		// Send the email
		if ($this->email->send()) {
			//echo 'Email sent successfully.';
		} else {
			//echo 'Email sending failed. Error: ' . $this->email->print_debugger();
			//exit;
		}
		return $res;
	}

	public function district_head_quarter_delete($id)
	{
		$data = ['status'  => 1,];
		$this->db->where('id', $id);
		$this->db->update('admin', $data);
	}

	public function district_head_quarter_permanent_delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('admin');
	}


	public function district_headquarter_edit($id)
	{

		$this->db->select('*')->where('id', $id)->where('role', 2);
		$query = $this->db->get('admin');
		return $query->row_array();
	}


	public function update_district_hq($id)
	{
		$district = $this->input->post('district') ? htmlspecialchars(strip_tags($this->input->post('district'))) : '';
		$designation = $this->input->post('designation') ? htmlspecialchars(strip_tags($this->input->post('designation'))) : '';
		$mobile = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
		$email = $this->input->post('email') ? htmlspecialchars(strip_tags($this->input->post('email'))) : '';
		$auth_person = $this->input->post('auth_person') ? htmlspecialchars(strip_tags($this->input->post('auth_person'))) : '';


		$data = [
			'district'  => $district,
			'designation' => $designation,
			'mobile' 	=> $mobile,
			'auth_person' => $auth_person,
			'email' => $email,
		];

		$this->db->where('id', $id);
		$res = $this->db->update('admin', $data);
		return	$res;
	}

	public function get_organization_data_for_report()
	{
		$role = $this->session->userdata('bmw_role');
		$admin_id = $this->session->userdata('bmw_admin_id');
		$this->db->select('district')
			->where('id', $admin_id);
		$query = $this->db->get('admin');
		$result = $query->row_array();
		$district = $result['district'];


		$this->db->select('*');
		$this->db->where('remove', NULL);
		//echo ($role);exit;
		if ($role == 2) {
			$this->db->where('district', $district);
		} else {
		}
		$query = $this->db->get('organization_master');
		return $query->result_array();
	}


	public function get_department_district_wise($district)
	{
		$this->db->select("department");
		$this->db->from("dis_area_master");
		$this->db->where('district', $district);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function insert_disposal_method()
	{
		$name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';

		$data = ['name'  => $name,];
		$res = $this->db->insert('disposal_method', $data);
		return	$res;
	}

	public function delete_disposal_method($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('disposal_method');
		redirect('index.php/admin/disposal_method_master');
	}
	public function fetch_disposal_methods()
	{
		$this->db->select('*');
		$query = $this->db->get('disposal_method');
		return $query->result_array();
	}

	public function  waste_hcf_wise()
	{


		date_default_timezone_set('Asia/Kolkata');
		$start = date("Y-m-d H:i:s");
		$date = date('Y-m-d H:i', strtotime('-48 hour', strtotime($start)));

		$id = $this->session->userdata('bmw_admin_id');
		$query = $this->db->select('district')->where('id', $id)->get('admin')->row_array();
		$district = $query['district'];
		$query = $this->db->select('*,o.org_name as hcf_and_add')
			->join('organization_master as o', 'v.org_master_id=o.id')
			->where('o.district', $district)
			->where('v.collection_date <', $date)
			->where('v.issue_date', NULL)
			->get('verify_barcode as v');
		return $query->result_array();
	}

	public function fetch_today_data2()
	{

		$id = $this->session->userdata('bmw_admin_id');
		$query = $this->db->select('district')->where('id', $id)->get('admin')->row_array();
		$district = $query['district'];

		$this->db->select("category");
		$this->db->from('waste_collection as a');
		$this->db->join('organization_master as b', 'a.org_master_id = b.id', 'left');
		$this->db->where('DATE(a.date_time)', date('Y-m-d'))->where('b.district', $district);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function fetch_total_data2()
	{
		$id = $this->session->userdata('bmw_admin_id');
		$query = $this->db->select('district')->where('id', $id)->get('admin')->row_array();
		$district = $query['district'];

		$this->db->select("category");
		$this->db->from('waste_collection as a');
		$this->db->join('organization_master as b', 'a.org_master_id = b.id', 'left');
		$this->db->where('b.district', $district);
		$query = $this->db->get();
		return $query->result_array();
	}


	public function print_average_report()
	{

		$start    = $this->input->post('start');
		$end    = $this->input->post('end');
		$hcf    = $this->input->post('hcf');
		$district    = $this->input->post('district');


		$this->db->select('*, a.department as dept,b.org_name as organization')
			->from('waste_collection as a')
			->join('organization_master as b', 'b.id = a.org_master_id', 'left')
			->where('DATE(a.date_time) BETWEEN"' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"');
		if ($hcf != '') {
			$this->db->where('org_master_id', $hcf);
		}
		if ($district != '') {
			$this->db->where('b.district', $district);
		}
		$query =  $this->db->order_by('b.org_name')->get();
		return $query->result_array();
	}



	public function print_dateBetween_transaction_report()
	{

		$start    = $this->input->post('start');
		$end    = $this->input->post('end');
		$hcf    = $this->input->post('hcf');
		$cbwtf    = $this->input->post('cbwtf');
		$district    = $this->input->post('district');

		$this->db
			->select('*,c.name as emp_name,b.org_name as org_name,d.Plant_name as plant_name,a.department as waste_department')
			->from('verify_barcode as a')
			->join('organization_master as b', 'a.org_master_id=b.id', 'left')
			->join('org_staff as c', 'a.emp_id=c.id', 'left')
			->join('treatment_plant_mster as d', 'a.plant_id=d.id', 'left')
			->where('DATE(a.collection_date) BETWEEN"' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"');
		if ($hcf != '') {
			$this->db->where('a.org_master_id', $hcf);
		}

		if ($district != '') {
			$this->db->where('b.district', $district);
		}

		if ($cbwtf != '') {
			$this->db->where('a.plant_id', $cbwtf);
		}
		$query = $this->db->get();
		return $query->result_array();
	}


	public function pending_report()
	{


		date_default_timezone_set('Asia/Kolkata');
		$start = date("Y-m-d H:i:s");
		$date = date('Y-m-d H:i', strtotime('-48 hour', strtotime($start)));

		$role = $this->session->userdata('bmw_role');
		if ($role == 2) {
			$admin_id = $this->session->userdata('bmw_admin_id');
			$this->db->select('district')
				->where('id', $admin_id);
			$query = $this->db->get('admin');
			$result = $query->row_array();
			$district = $result['district'];
		}


		$this->db
			->select('*,c.name as emp_name,b.org_name as org_name,d.Plant_name as plant_name,a.department as waste_department')
			->from('verify_barcode as a')
			->join('organization_master as b', 'a.org_master_id=b.id', 'LEFT')
			->join('org_staff as c', 'a.emp_id=c.id', 'LEFT')
			->join('treatment_plant_mster as d', 'a.plant_id=d.id', 'LEFT')
			->where('a.collection_date <', $date)
			->where('a.issue_date', NULL);
		if ($role == 2) {
			$this->db->where('b.district', $district);
		} else {
		}


		$query = $this->db->get();
		return $query->result_array();
	}



	public function fetch_hcf_profile()
	{

		$org_id = $this->input->post('hcf');
		$query = $this->db->select('*, organization_master.org_name as organization_name')
			->join('organization_master', 'hcf_profile.hcf_master_id=organization_master.id')
			->where('hcf_master_id', $org_id)->get('hcf_profile');
		return $query->result_array();
	}

	public function hcf_profile_excel()
	{

		$district = $this->input->post('district');
		$query = $this->db->select('*, organization_master.org_name as organization_name')
			->join('organization_master', 'hcf_profile.hcf_master_id=organization_master.id')
			->where('organization_master.district', $district)->get('hcf_profile');
		return $query->result_array();
	}

	public function fetch_defaulters_district()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');

		$role = $this->session->userdata('bmw_role');
		if ($role == 2) {
			$admin_id = $this->session->userdata('bmw_admin_id');
			$this->db->select('district')
				->where('id', $admin_id);
			$query = $this->db->get('admin');
			$result = $query->row_array();
			$district = $result['district'];
		}

		$this->db
			->select('hp.authorization,hp.cto,hp.aggrement,b.org_name as Organization')
			->from('hcf_profile as hp')
			->join('organization_master as b', 'hp.hcf_master_id=b.id', 'LEFT')
			->where('b.district', $district);
		$this->db->group_start()
			->where('hp.authorization <', $date)
			->or_where('hp.cto <', $date)
			->or_where('hp.aggrement <', $date);
		$this->db->group_end();

		$query = $this->db->get();
		return $query->result_array();
	}

	public function fetch_defaulters()
	{
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d');

		$role = $this->session->userdata('bmw_role');
		if ($role == 2) {
			$admin_id = $this->session->userdata('bmw_admin_id');
			$this->db->select('district')
				->where('id', $admin_id);
			$query = $this->db->get('admin');
			$result = $query->row_array();
			$district = $result['district'];
		}

		$this->db
			->select('hp.authorization,hp.cto,hp.aggrement,b.org_name as Organization')
			->from('hcf_profile as hp')
			->join('organization_master as b', 'hp.hcf_master_id=b.id', 'LEFT')
			->where('hp.authorization <', $date)
			->or_where('hp.cto <', $date)
			->or_where('hp.aggrement <', $date);
		if ($role == 2) {
			$this->db->where('b.district', $district);
		} else {
		}
		$query = $this->db->get();
		return $query->result_array();
	}


	public function get_particular_district_data()
	{
		$id = $this->session->userdata('bmw_admin_id');
		$query = $this->db->select('district')->where('id', $id)->get('admin');
		$result = $query->row_array();
		$district = $result['district'];

		$this->db->select('name');
		$this->db->where('remove', NULL)->where('name', $district);
		$query = $this->db->get('district');
		return $query->result_array();
	}


	public function convert_HCF($id)
	{
		$this->db->select('org_name')->where('id', $id);
		$query = $this->db->get('organization_master');
		return $query->row_array();
	}

	public function convert_cbwtf($id)
	{
		$this->db->select('Plant_name')->where('id', $id);
		$query = $this->db->get('treatment_plant_mster');
		return $query->row_array();
	}

	public function fetch_track_data()
	{

		$scan = $this->input->post('scan');

		$this->db
			->select('*,c.name as emp_name,b.org_name as org_name,d.Plant_name as plant_name,a.department as waste_department')
			->from('verify_barcode as a')
			->join('organization_master as b', 'a.org_master_id=b.id')
			->join('org_staff as c', 'a.emp_id=c.id')
			->join('treatment_plant_mster as d', 'a.plant_id=d.id', 'left')
			->where('a.collection_code', $scan);
		$query =  $this->db->get();
		return $query->row_array();
	}



	public function get_data()
	{
		$date = $this->input->post('date');
		$hcf = $this->input->post('hcf');
		$this->db->select("*,c.name as Employee,b.org_name as Organization,a.id as row_id");
		$this->db->from("verify_barcode as a")
			->join('organization_master as b', 'a.org_master_id=b.id')
			->join('org_staff as c', 'a.emp_id=c.id')
			->where('DATE(a.collection_date)', $date)
			->where('a.org_master_id', $hcf);
		$query = $this->db->get();
		return $query->result_array();
	}



	public function  ajax_fetch_vehicle_data($dist)
	{

		$this->db->select("*");
		$this->db->from("org_vehicle_mster");
		$this->db->where('org_master_dist', $dist)->where('remove', NULL)->where_not_in('assetUid', '');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {

			$output = '<option value="">-Select Vehicle-</option>';
			foreach ($query->result() as $row) {
				$output .= '<option value="' . $row->assetUid . '">' . $row->vc_no . '</option>';
			}
		} else {
			$output = '<option value="">No Vehicles Available</option>';
		}


		return  $output;
	}
}
