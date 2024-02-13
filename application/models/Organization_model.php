<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Organization_Model extends CI_Model
{

    public function insert_department()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $session_id = $this->session->userdata('bmw_org_session_id');

        $dept_name = $this->input->post('dept_name') ? htmlspecialchars(strip_tags($this->input->post('dept_name'))) : '';
        $desc = $this->input->post('desc') ? htmlspecialchars(strip_tags($this->input->post('desc'))) : '';

        $data = [
            'dept_name'         => $dept_name,
            'desc'       => $desc,
            'org_id'       => $org_id,
            'session_id'         => $session_id,
        ];
        $res =  $this->db->insert('org_department', $data);
        return $res;
    }


    public function fetch_department()
    {


        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*')->where('org_id', $org_id)->where('remove', NULL)->order_by('dept_name', 'ASC')->get('org_department');
        return $query->result_array();
    }

    public function edit_department($id)
    {



        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('org_department');
        return $query->row_array();
    }

    public function update_department($id)
    {


        $dept_name = $this->input->post('dept_name') ? htmlspecialchars(strip_tags($this->input->post('dept_name'))) : '';
        $desc = $this->input->post('desc') ? htmlspecialchars(strip_tags($this->input->post('desc'))) : '';


        $data = [
            'dept_name'         => $dept_name,
            'desc'        => $desc,

        ];

        $this->db->select('*');
        $this->db->where('id', $id);
        $res =  $this->db->update('org_department', $data);
        return $res;
    }




    public function delete_department($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('org_department');
        redirect('index.php/organization/department');
    }


    public function remove_department($id)
    {

        $data = ['remove'  => 1,];

        $this->db->select('*');
        $this->db->where('id', $id);
        $res =   $this->db->update('org_department', $data);
        return $res;
    }





    public function insert_designation()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $session_id = $this->session->userdata('bmw_org_session_id');

        $description = $this->input->post('description') ? htmlspecialchars(strip_tags($this->input->post('description'))) : '';
        $designation = $this->input->post('designation') ? htmlspecialchars(strip_tags($this->input->post('designation'))) : '';


        $data = [
            'description'         => $description,
            'designation'        => $designation,
            'org_id'       => $org_id,
            'session_id'         => $session_id,
        ];
        $res =    $this->db->insert('org_designation', $data);
        return $res;
    }

    public function fetch_designation()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*')->where('remove', NULL)->where('org_id', $org_id)->get('org_designation');
        return $query->result_array();
    }


    public function delete_designation($id)
    {

        $this->db->where('id', $id);
        $res =  $this->db->delete('org_designation');
        return $res;
    }

    public function edit_designation($id)
    {

        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('org_designation');
        return $query->row_array();
    }


    public function update_designation($id)
    {

        $description = $this->input->post('description') ? htmlspecialchars(strip_tags($this->input->post('description'))) : '';
        $designation = $this->input->post('designation') ? htmlspecialchars(strip_tags($this->input->post('designation'))) : '';

        $data = [
            'description'         => $description,
            'designation'        => $designation
        ];

        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('org_designation', $data);
        return $res;
    }
    public function remove_designation($id)
    {

        $data = ['remove'  => 1,];

        $this->db->select('*');
        $this->db->where('id', $id);
        $res =  $this->db->update('org_designation', $data);
        return $res;
    }


    public function insert_ward()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $session_id = $this->session->userdata('bmw_org_session_id');

        $emp_name = $this->input->post('ward_name') ? htmlspecialchars(strip_tags($this->input->post('ward_name'))) : '';
        $designation = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
        $remarks = $this->input->post('remarks') ? htmlspecialchars(strip_tags($this->input->post('remarks'))) : '';

        $data = [
            'ward_name'         => $emp_name,
            'department'        => $designation,
            'remarks'            =>  $remarks,
            'org_id'       => $org_id,
            'session_id'         => $session_id
        ];
        $res = $this->db->insert('org_ward', $data);
        return $res;
    }


    public function fetch_ward()
    {

        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*')->where('remove', NULL)->where('org_id', $org_id)->get('org_ward');
        return $query->result_array();
    }


    public function delete_ward($id)
    {

        $this->db->where('id', $id);
        $res = $this->db->delete('org_ward');
        return $res;
    }

    public function edit_ward($id)
    {

        $this->db->select('*');
        $this->db->where('id', $id);
        $query = $this->db->get('org_ward');
        return $query->row_array();
    }


    public function update_ward($id)
    {

        $department = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
        $ward_name = $this->input->post('ward_name') ? htmlspecialchars(strip_tags($this->input->post('ward_name'))) : '';
        $remarks = $this->input->post('remarks') ? htmlspecialchars(strip_tags($this->input->post('remarks'))) : '';

        $data = [
            'department'         => $department,
            'ward_name'        => $ward_name,
            'remarks'            => $remarks,
        ];

        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('org_ward', $data);
        return $res;
    }



    public function remove_ward($id)
    {
        $data = ['remove'  => 1,];
        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('org_ward', $data);
        return $res;
    }

    //Image Upload
    public   function upload()
    {

        $config = [
            'upload_path' => 'public/uploads/',
            'allowed_types' => 'jpg|jpeg|png',
            'encrypt_name' => TRUE,
        ];
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $data = array('error' => $this->upload->display_errors());

            $this->session->set_flashdata('error', $data['error']);
            return    redirect('index.php/organization/register_staff');
        } else {
            $data = array('upload_data' => $this->upload->data());

            //$this->load->view('upload_success', $data);

        }
    }
    //end of image upload



    public function insert_register_staff()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        date_default_timezone_set('Asia/Kolkata');
        $session_id = substr(md5(microtime()), rand(0, 26), 6);
        $org_session_id = $this->session->userdata('bmw_org_session_id');


        $dob = $this->input->post('dob') ? htmlspecialchars(strip_tags($this->input->post('dob'))) : '';
        $name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';
        $department = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
        $mobile = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
        $email = $this->input->post('email') ? htmlspecialchars(strip_tags($this->input->post('email'))) : '';
        $doj = $this->input->post('doj') ? htmlspecialchars(strip_tags($this->input->post('doj'))) : '';
        $designation = $this->input->post('designation') ? htmlspecialchars(strip_tags($this->input->post('designation'))) : '';
        $address = $this->input->post('address') ? htmlspecialchars(strip_tags($this->input->post('address'))) : '';
        $remarks = $this->input->post('remarks') ? htmlspecialchars(strip_tags($this->input->post('remarks'))) : '';

        $Vaccine = $this->input->post('Vaccine') ? htmlspecialchars(strip_tags($this->input->post('Vaccine'))) : '';
        $first_dose = $this->input->post('1st_dose') ? htmlspecialchars(strip_tags($this->input->post('1st_dose'))) : '';
        $second_dose = $this->input->post('2nd_dose') ? htmlspecialchars(strip_tags($this->input->post('2nd_dose'))) : '';
        $booster = $this->input->post('booster') ? htmlspecialchars(strip_tags($this->input->post('booster'))) : '';

        $this->db->select('*');
        $this->db->where('id', $org_id);
        $query = $this->db->get('organization_master');
        $row = $query->row_array();
        $org_name = $row['org_name'];
        $org_rand = $row['random_number'];

        $this->upload();
        $image = $this->upload->data();
        $image_name = $image['file_name'];



        $data = [
            'dob'            => $dob,
            'name'          => $name,
            'department'    =>  $department,
            'mobile'        => $mobile,
            'email'         => $email,
            'doj'           => $doj,
            'designation'   => $designation,
            'address'       => $address,
            'remarks'       => $remarks,
            'image'            => $image_name,
            'org_id'       => $org_id,
            'org_rand'      => $org_rand,
            'session_id'    => $session_id,
            'org_session_id'  => $org_session_id,
            'Vaccine'         => $Vaccine,
            '1st_dose'        => $first_dose,
            '2nd_dose'        => $second_dose,
            'booster'         => $booster,

        ];
        $this->db->insert('org_staff', $data);


        //Staff access

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


        $username = substr($name, 0, 4) . '@' . rand(1111, 9999);
        //$password = generateRandomString();
        $password = $username;
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->db->select('*');
        $this->db->where('name', $name);
        $query = $this->db->get('org_staff');
        $row = $query->row_array();
        $emp_id = $row['id'];

        $data = [

            'name'           => $name,
            'org_name'       => $org_name,
            'org_id'        => $org_id,
            'emp_id'        => $emp_id,
            'Username'         => $username,
            'session_id' => $session_id,
            'Password' =>       $hash,
            'date'       => date('Y-m-d'),

        ];

        $res =  $this->db->insert('org_employee', $data);


        //$rcode= rand(11111,999999);
        $html = "Your UserName: " . $username . '<br>' . "And Password: " . $password;

        $to = $email;
        $subject = "verfication";
        $msg = $html;
        //Sending mail
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
		}
        return $res;
    }

    public function fetch_staff()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*')->where('remove', NULL)->where('org_id', $org_id)->get('org_staff');
        return $query->result_array();
    }


    public function delete_register_staff($id)
    {
        $this->db->where('id', $id);
        $res = $this->db->delete('org_staff');
        return $res;
    }

    public function edit_register_staff($id)
    {
        $this->db->select('*')->where('id', $id);
        $query = $this->db->get('org_staff');
        return $query->row_array();
    }

    public function update_register_staff($id)
    {

        if (isset($_FILES['image']['tmp_name'])) {
            $this->upload();
            $image = $this->upload->data();
            $image_name = $image['file_name'];
        }

        $dob = $this->input->post('dob') ? htmlspecialchars(strip_tags($this->input->post('dob'))) : '';
        $name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';
        $department = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
        $mobile = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
        $email = $this->input->post('email') ? htmlspecialchars(strip_tags($this->input->post('email'))) : '';
        $doj = $this->input->post('doj') ? htmlspecialchars(strip_tags($this->input->post('doj'))) : '';
        $designation = $this->input->post('designation') ? htmlspecialchars(strip_tags($this->input->post('designation'))) : '';
        $address = $this->input->post('address') ? htmlspecialchars(strip_tags($this->input->post('address'))) : '';
        $remarks = $this->input->post('remarks') ? htmlspecialchars(strip_tags($this->input->post('remarks'))) : '';

        $Vaccine = $this->input->post('Vaccine') ? htmlspecialchars(strip_tags($this->input->post('Vaccine'))) : '';
        $first_dose = $this->input->post('1st_dose') ? htmlspecialchars(strip_tags($this->input->post('1st_dose'))) : '';
        $second_dose = $this->input->post('2nd_dose') ? htmlspecialchars(strip_tags($this->input->post('2nd_dose'))) : '';
        $booster = $this->input->post('booster') ? htmlspecialchars(strip_tags($this->input->post('booster'))) : '';



        $data = [
            'dob'            => $dob,
            'name'          => $name,
            'department'    =>  $department,
            'mobile'        => $mobile,
            'email'         => $email,
            'doj'           => $doj,
            'designation'   => $designation,
            'address'       => $address,
            'remarks'       => $remarks,
            'Vaccine'          => $Vaccine,
            '1st_dose'           => $first_dose,
            '2nd_dose'            => $second_dose,
            'booster'             => $booster,
        ];

        if (isset($_FILES['image']['tmp_name'])) {
            $data['image'] = $image_name;
        }

        $this->db->select('*');
        $this->db->where('id', $id);
        $res =  $this->db->update('org_staff', $data);
        return $res;
    }
    public function remove_register_staff($id)
    {
        $data = ['remove'  => 1,];


        $this->db->where('id', $id);
        $res = $this->db->update('org_staff', $data);

        $this->db->where('emp_id', $id);
        $res = $this->db->update('org_employee', $data);

        return $res;
    }




    //     public function insert_staff_access(){
    //         $org_rand_num = $this->session->userdata('org_rand_num');
    //         $org_id = $this->session->userdata('org_id');
    //         $org_name = $this->session->userdata('org_name');


    //         $today = date('Y-m-d h:i:s');

    //         $username = $this->input->post('username')?htmlspecialchars(strip_tags($this->input->post('username'))):'';
    //         $password = md5($this->input->post('password')?htmlspecialchars(strip_tags($this->input->post('password'))):'');     
    //         $status =$this->input->post('status')?htmlspecialchars(strip_tags($this->input->post('status'))):'';
    //         $name = $this->input->post('name')?htmlspecialchars(strip_tags($this->input->post('name'))):'';
    //         $query = $this->db->select('*')->where('name',$name)->get('org_staff');
    //         $result = $query->row_array();

    //         $emp_id = $result['id'];

    //         $data = [  
    //                           'username'            => $username,
    //                          'password'        => $password,
    //                         'password'         => $password,
    //                         'status'         => $status,
    //                         'org_id'        =>$org_id,
    //                         'org_rand_num' => $org_rand_num,
    //                         'org_name'     => $org_name,
    //                         'date'          =>     $today,
    //                        'name'            => $name,
    //                        'emp_id'            => $emp_id,

    //                  ];  

    //         $this->db->insert('org_employee',$data);


    //     }


    //     public function fetch_staff_access(){


    //          $org_id = $this->session->userdata('org_id');
    //          $query = $this->db->select('*')->where('org_id',$org_id)->get('org_employee');
    //          return $query->result_array();


    //     }

    //     public function delete_staff_access($id){


    //         $this -> db -> where('id', $id);
    //         $this -> db -> delete('org_employee');


    //     }


    //     public function edit_staff_access($id){

    //         $this->db->select('*')->where('id',$id); 
    //         $query =$this->db->get('org_employee');
    //         return $query->row_array();



    //     }


    //      public function update_staff_access($id){
    //         $org_name = $this->session->userdata('org_name');
    //         $username = $this->input->post('username')?htmlspecialchars(strip_tags($this->input->post('username'))):'';

    //         $status =$this->input->post('status')?htmlspecialchars(strip_tags($this->input->post('status'))):'';
    //         $password = $this->input->post('password')?htmlspecialchars(strip_tags($this->input->post('password'))):'';
    //         $Cpassword = $this->input->post('Cpassword')?htmlspecialchars(strip_tags($this->input->post('Cpassword'))):'';

    //             if($password == $Cpassword )
    //                 {
    //              $password = md5($this->input->post('password')?htmlspecialchars(strip_tags($this->input->post('password'))):'');



    //              $data = [  
    //                         'username'     => $username,
    //                         'password'     => $password,
    //                         'status'       => $status,
    //                         'org_name'     => $org_name,

    //                     ];  

    //     $this->db->select('*')->where('id',$id)->update('org_employee',$data);

    // }
    //         else{

    //             echo "Error! Password doesn't Match";

    //         }


    //  } 

    //          public function remove_staff_access($id){

    //             $data = [  'remove'  => 1, ];  

    //             $this->db->select('*');
    //             $this->db->where('id',$id); 
    //             $this->db->update('org_employee',$data);


    //          }                       


    public function  fetch_vehicle()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*,t.Plant_name as cbwtf ,o.id as id')
            ->join('treatment_plant_mster as t', 'o.plant_id=t.id')
            ->where('o.remove', NULL)->where('o.org_mster_id', $org_id)->get('org_vehicle_mster as o');
        return $query->result_array();
    }
    public function  fetch_vehicle_type()
    {
        $query = $this->db->where('remove', NULL)->get('vc_type_master');
        return $query->result_array();
    }

    public function  fetch_cbwtf_data()
    {
        $query = $this->db->where('remove', NULL)->get('treatment_plant_mster');
        return $query->result_array();
    }



    //Document Uploads
    public   function upload2()
    {

        $config = [
            'upload_path' => 'public/uploads/',
            'allowed_types' => 'pdf',
            'encrypt_name' => TRUE,
        ];
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('Documents')) {
            $data = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $data['error']);
            return    redirect('index.php/organization/vehicle_master');
        } else {
            $data = array('upload_data' => $this->upload->data());

            //$this->load->view('upload_success', $data);

        }
    }

    public function insert_vehicel_master()
    {


        $this->upload2();
        $image = $this->upload->data();
        $image_name = $image['file_name'];

        $session_id = $this->session->userdata('bmw_org_session_id');
        $org_id = $this->session->userdata('bmw_org_id');
        $this->db->select('*');
        $this->db->where('id', $org_id);
        $query = $this->db->get('organization_master');
        $row = $query->row_array();

        $org_district = $row['district'];
        $org_pincode = $row['Pincode'];

        $cbwtf = $this->input->post('cbwtf') ? htmlspecialchars(strip_tags($this->input->post('cbwtf'))) : '';
        $Engine_no = $this->input->post('Engine_no') ? htmlspecialchars(strip_tags($this->input->post('Engine_no'))) : '';
        $pollution_exp_date = $this->input->post('pollution_exp_date') ? htmlspecialchars(strip_tags($this->input->post('pollution_exp_date'))) : '';
        $vc_type = $this->input->post('vc_type') ? htmlspecialchars(strip_tags($this->input->post('vc_type'))) : '';
        $owner_name = $this->input->post('owner_name') ? htmlspecialchars(strip_tags($this->input->post('owner_name'))) : '';
        $mobile = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
        $Vehicle_number = $this->input->post('Vehicle_number') ? htmlspecialchars(strip_tags($this->input->post('Vehicle_number'))) : '';
        $Chassis_no = $this->input->post('Chassis_no') ? htmlspecialchars(strip_tags($this->input->post('Chassis_no'))) : '';
        $insurance_exp_data = $this->input->post('insurance_exp_date') ? htmlspecialchars(strip_tags($this->input->post('insurance_exp_date'))) : '';
        $fit_exp_date = $this->input->post('fit_exp_date') ? htmlspecialchars(strip_tags($this->input->post('fit_exp_date'))) : '';
        $asset_id = $this->input->post('asset_id') ? htmlspecialchars(strip_tags($this->input->post('asset_id'))) : '';

        $data = [
            'owner_name'            => $owner_name,
            'org_mster_pin'          => $org_pincode,
            'vc_no'                  => $Vehicle_number,
            'Insuran_exp_dt'         => $insurance_exp_data,
            'vc_type'                  => $vc_type,
            'owner_mobile'             => $mobile,
            'chassis_no'              => $Chassis_no,
            'Engine_no'              => $Engine_no,
            'org_master_dist'           =>  $org_district,
            'pollution_exp_date'           =>  $pollution_exp_date,
            'fit_exp_date'           =>  $fit_exp_date,
            'org_mster_id'               =>  $org_id,
            'plant_id'           =>  $cbwtf,
            'doc'               =>  $image_name,
            'session_id'         => $session_id,
            'assetUid' => $asset_id,
        ];
        $res =  $this->db->insert('org_vehicle_mster', $data);
        return $res;
    }


    public function delete_vehicel_master($id)
    {

        $this->db->where('id', $id);
        $res = $this->db->delete('org_vehicle_mster');
        return $res;
    }

    public function edit_vehicel_master($id)
    {
        $this->db->select('*,o.id as id,t.plant_name as cbwtf,t.id as cbwtf_id')
            ->join('treatment_plant_mster as t', 'o.plant_id=t.id')
            ->where('o.id', $id);
        $query = $this->db->get('org_vehicle_mster as o');
        return $query->row_array();
    }
    public function update_vehicel_master($id)
    {

        $org_id = $this->session->userdata('bmw_org_id');

        if ((isset($_FILES['Documents']['name'])) && $_FILES['Documents']['name'] != '') {
            $this->upload2();
            $image = $this->upload->data();
            $image_name = $image['file_name'];
        }

        $this->db->select('*');
        $this->db->where('id', $org_id);
        $query = $this->db->get('organization_master');
        $row = $query->row_array();
        $org_district = $row['district'];
        $org_pincode = $row['Pincode'];

        $cbwtf = $this->input->post('cbwtf') ? htmlspecialchars(strip_tags($this->input->post('cbwtf'))) : '';
        $Engine_no = $this->input->post('Engine_no') ? htmlspecialchars(strip_tags($this->input->post('Engine_no'))) : '';
        $pollution_exp_date = $this->input->post('pollution_exp_date') ? htmlspecialchars(strip_tags($this->input->post('pollution_exp_date'))) : '';
        $vc_type = $this->input->post('vc_type') ? htmlspecialchars(strip_tags($this->input->post('vc_type'))) : '';
        $owner_name = $this->input->post('owner_name') ? htmlspecialchars(strip_tags($this->input->post('owner_name'))) : '';
        $mobile = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
        $Vehicle_number = $this->input->post('Vehicle_number') ? htmlspecialchars(strip_tags($this->input->post('Vehicle_number'))) : '';
        $Chassis_no = $this->input->post('Chassis_no') ? htmlspecialchars(strip_tags($this->input->post('Chassis_no'))) : '';
        $insurance_exp_data = $this->input->post('Insuran_exp_dt') ? htmlspecialchars(strip_tags($this->input->post('Insuran_exp_dt'))) : '';
        $fit_exp_date = $this->input->post('fit_exp_date') ? htmlspecialchars(strip_tags($this->input->post('fit_exp_date'))) : '';
        $asset_id = $this->input->post('asset_id') ? htmlspecialchars(strip_tags($this->input->post('asset_id'))) : '';

        $data = [
            'owner_name'            => $owner_name,
            'org_mster_pin'          => $org_pincode,
            'vc_no'                  => $Vehicle_number,
            'Insuran_exp_dt'         => $insurance_exp_data,
            'vc_type'                  => $vc_type,
            'owner_mobile'             => $mobile,
            'chassis_no'              => $Chassis_no,
            'Engine_no'              => $Engine_no,
            'org_master_dist'           =>  $org_district,
            'pollution_exp_date'           =>  $pollution_exp_date,
            'fit_exp_date'           =>  $fit_exp_date,
            'org_mster_id'               =>  $org_id,
            'assetUid' => $asset_id,

        ];

        if ((isset($_FILES['Documents']['name'])) && $_FILES['Documents']['name'] != '') {
            $data['doc'] = $image_name;
        }



        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('org_vehicle_mster', $data);
        return $res;
    }


    public function vehicle_master_remove($id)
    {

        $data = ['remove'  => 1,];
        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('org_vehicle_mster', $data);
        return $res;
    }


    public function  fetch_weight_machine_master()
    {

        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*,o.org_name as org_master_name,w.id as master_id')
            ->join('organization_master as o', 'w.org_master_id=o.id')
            ->where('w.remove', NULL)->where('w.org_master_id', $org_id)->get('weight_machine_master as w');
        return $query->result_array();
    }


    public function insert_weight_machine_master()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $session_id = $this->session->userdata('bmw_org_session_id');
        $machine_no = $this->input->post('machine_no') ? htmlspecialchars(strip_tags($this->input->post('machine_no'))) : '';
        $machine_ip = $this->input->post('machine_ip') ? htmlspecialchars(strip_tags($this->input->post('machine_ip'))) : '';

        $data = [
            'machine_no'                   => $machine_no,
            'machine_ip'                  => $machine_ip,
            'org_master_id'               =>  $org_id,
            'session_id'         => $session_id,
        ];
        $res = $this->db->insert('weight_machine_master', $data);
        return $res;
    }


    public function delete_weight_machine_master($id)
    {

        $this->db->where('id', $id);
        $res = $this->db->delete('weight_machine_master');
        return $res;
    }

    public function edit_weight_machine_master($id)
    {
        $this->db->select('*')->where('id', $id);
        $query = $this->db->get('weight_machine_master');
        return $query->result_array();
    }
    public function update_weight_machine_master($id)
    {
        $org_id = $this->session->userdata('bmw_org_id');

        $this->db->select('*');
        $this->db->where('id', $org_id);
        $query = $this->db->get('organization_master');
        $row = $query->row_array();
        $org_name = $row['org_name'];
        $org_pincode = $row['Pincode'];



        $machine_no = $this->input->post('machine_no') ? htmlspecialchars(strip_tags($this->input->post('machine_no'))) : '';
        $machine_ip = $this->input->post('machine_ip') ? htmlspecialchars(strip_tags($this->input->post('machine_ip'))) : '';


        $data = [
            'machine_no'                   => $machine_no,
            'machine_ip'                  => $machine_ip,
            'org_master_name'            => $org_name,
            'org_master_id'               =>  $org_id,
            'org_master_pin'            => $org_pincode
        ];


        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('weight_machine_master', $data);
        return $res;
    }

    public function weight_machine_master_Remove($id)
    {
        $data = ['remove'  => 1,];

        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('weight_machine_master', $data);
        return $res;
    }



    public function org_treatment_link_insert()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $session_id = $this->session->userdata('bmw_org_session_id');
        $plant_name = $this->input->post('plant_name') ? htmlspecialchars(strip_tags($this->input->post('plant_name'))) : '';

        $data = [

            'plant_id'               =>  $plant_name,
            'org_mster_id'           => $org_id,
            'session_id'         => $session_id

        ];
        $res = $this->db->insert('org_treatment_link', $data);
        return $res;
    }

    public function  org_treatment_link_fetch()
    {

        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*,t.plant_name,o.id as link_id')->join('treatment_plant_mster as t', 'o.plant_id=t.id')
            ->where('o.remove', NULL)->where('o.org_mster_id', $org_id)->get('org_treatment_link as o');
        return $query->result_array();
    }
    public function org_treatment_link_remove($id)
    {
        $data = ['remove'  => 1,];
        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('org_treatment_link', $data);
        return $res;
    }

    public function org_treatment_link_delete($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('org_treatment_link');
    }

    //dash board functions

    public function fetch_today_data()
    {
        $org_id  =   $this->session->userdata('bmw_org_id');

        $this->db->select("category");
        $this->db->from("waste_collection");
        $this->db->where('DATE(date_time)', date('Y-m-d'));
        $this->db->where('org_master_id', $org_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_total_data()
    {
        $org_id  =   $this->session->userdata('bmw_org_id');

        $this->db->select("category");
        $this->db->from("waste_collection");
        $this->db->where('org_master_id', $org_id);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function fetch_hcf_waste_collection_report()
    {

        $org_master_id  =   $this->session->userdata('bmw_org_id');
        $query =  $this->db->select('*')->where('DATE(date_time)', date('Y-m-d'))
            ->where('org_master_id', $org_master_id)->get('waste_collection');
        return $query->result_array();
    }


    public function print_hcf_waste_collection_report()
    {
        $org_master_id  =   $this->session->userdata('bmw_org_id');
        //echo($org_master_id);exit();
        $start_date = $this->input->post('start');
        $end_date = $this->input->post('end');
        $department = $this->input->post('department');
        $ward = $this->input->post('ward');
        $category = $this->input->post('category');

        $this->db->select('*, a.department as waste_department, b.name as emp_name, a.remarks as occupancy')
            ->join('org_staff as b', 'a.emp_id = b.id')
            ->where('DATE(a.date_time) BETWEEN "' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"')
            ->where('a.org_master_id', $org_master_id);

        // Add conditions based on the posted values
        if (!empty($department)) {
            $this->db->where('a.department', $department);
        }

        if (!empty($ward)) {
            $this->db->where('a.ward', $ward);
        }

        if (!empty($category)) {
            $this->db->where('a.category', $category);
        }

        $query =  $this->db->get('waste_collection as a');
         //echo $this->db->last_query();  // This will echo the last executed query
         //exit();
        return $query->result_array();
    }




    public function fetch_hcf_waste_issue_report()
    {

        $org_master_id  =   $this->session->userdata('bmw_org_id');

        $query =  $this->db->select('*,b.name as emp_name,c.plant_name as treatment_plant_name')
            ->join('org_staff as b', 'a.employee_id=b.id')
            ->join('treatment_plant_mster as c', 'a.treatment_plant_id=c.id')
            ->where('DATE(date_time)', date('Y-m-d'))
            ->where('a.organization_master_id', $org_master_id)
            ->get('issue_collection as a');
        return $query->result_array();
    }


    public function print_hcf_issue_collection_report()
    {


        $org_master_id  =  $this->session->userdata('bmw_org_id');
        $start_date = $this->input->post('start');
        $end_date = $this->input->post('end');
        // $department = $this->input->post('department');
        // $ward = $this->input->post('ward');
        $category = $this->input->post('category');
       
        $this->db->select('*,b.name as emp_name,c.plant_name as treatment_plant_name')
            ->join('org_staff as b', 'a.employee_id=b.id')
            ->join('treatment_plant_mster as c', 'a.treatment_plant_id=c.id')
            ->where('DATE(date_time) BETWEEN"' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"')
            ->where('a.organization_master_id', $org_master_id);

         // Add conditions based on the posted values
        // if (!empty($department)) {
        //     $this->db->where('a.department', $department);
        // }

        // if (!empty($ward)) {
        //     $this->db->where('a.ward', $ward);
        // }

        if (!empty($category)) {
            $this->db->where('a.waste_category', $category);
        }

        $query =  $this->db->get('issue_collection as a');
         //echo $this->db->last_query(); 
         //exit();
        return $query->result_array();
    }

    public function hcf_verify_table()
    {

        $org_master_id  =  $this->session->userdata('bmw_org_id');

        $this->db->select('*')->where('DATE(collection_date)', date('Y-m-d'));
        $this->db->where('org_master_id', $org_master_id);

        $query =  $this->db->get('verify_barcode');
        return $query->result_array();
    }


    public function print_hcf_verify_table()
    {

        $org_master_id  =  $this->session->userdata('bmw_org_id');
        $start_date = $this->input->post('start');
        $end_date = $this->input->post('end');
        $department = $this->input->post('department');
        $ward = $this->input->post('ward');
        $category = $this->input->post('category');

        $this->db->where('DATE(collection_date) BETWEEN"' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
        $this->db->where('org_master_id', $org_master_id);

         // Add conditions based on the posted values
        if (!empty($department)) {
            $this->db->where('department', $department);
        }

        if (!empty($ward)) {
            $this->db->where('ward', $ward);
        }

        if (!empty($category)) {
            $this->db->where('waste_category', $category);
        }

        $query =  $this->db->get('verify_barcode');

        return $query->result_array();
    }

    public function send_password()
    {

        $user_name = $this->input->post('user_name') ? htmlspecialchars(strip_tags($this->input->post('user_name'))) : '';

        $this->db->select('*')->where('user_name', $user_name);
        $query =  $this->db->get('organization_access_master');
        $num = $query->num_rows();
        if ($num == 0) {

            $data['error'] = "User not Found.";
            $this->load->view('organization/forgot.php', $data);
        } else {

            $result = $query->row_array();
            $id = $result['org_id'];

            $this->db->select('*')->where('id', $id);
            $query = $this->db->get('organization_master');
            $result = $query->row_array();
            $email_id = $result['email'];
            $short_name = $result['short_name'];


            function generateRandomString2($length = 8)
            {
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#*&';
                $charactersLength = strlen($characters);
                $randomString = '';
                for ($i = 0; $i < $length; $i++) {
                    $randomString .= $characters[rand(0, $charactersLength - 1)];
                }
                return $randomString;
            }


            $password = generateRandomString2();
            $hash = password_hash($password, PASSWORD_DEFAULT);


            $data = ['password'  => $hash,];

            $this->db->select('*');
            $this->db->where('org_id', $id);
            $this->db->update('organization_access_master', $data);


            $html = "Your Password is " . $password;
            $to = $email_id;
            $subject = "Password Reset";
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
                echo '<script> alert("Mail Sent Successfully.Login To Continue");</script>';
			} else {
				echo 'Email sending failed.';
				//exit;
			}
            return    redirect('index.php/organization');
        }
    }


    public function  fetch_register_weight_machine()
    {

        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*,o.name as user_name,m.id as link_id')
            ->join('org_staff as o', 'm.user_id=o.id')
            ->where('m.remove', NULL)->where('m.org_id', $org_id)->get('machine_link as m');
        return $query->result_array();
    }


    public function  machine_ajax($mc_no)
    {

        $this->db->select("machine_ip");
        $this->db->from("weight_machine_master");
        $this->db->where('machine_no', $mc_no)->where('remove', NULL);
        $query = $this->db->get();

        $output = '<option value="">--Select--</option>';
        foreach ($query->result() as $row) {
            $output = '<option value="' . $row->machine_ip . '">' . $row->machine_ip . '</option>';
        }
        echo  $output;
    }


    public function insert_register_machine()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $session_id = $this->session->userdata('bmw_org_session_id');


        $machine_no = $this->input->post('machine_no') ? htmlspecialchars(strip_tags($this->input->post('machine_no'))) : '';
        $machine_ip = $this->input->post('machine_ip') ? htmlspecialchars(strip_tags($this->input->post('machine_ip'))) : '';
        $id = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';

        $data = [
            'machine_name'         => $machine_no,
            'machine_id'           => $machine_ip,
            'org_id'               =>  $org_id,
            'user_id'              => $id,
            'session_id'            => $session_id
        ];
        $res = $this->db->insert('machine_link', $data);
        return $res;
    }


    public function weight_machine_register_delete($id)
    {

        $this->db->where('id', $id);
        $res = $this->db->delete('machine_link');
        return $res;
    }

    public function edit_register_machine($id)
    {

        $this->db->select('*')->where('id', $id);
        $query = $this->db->get('machine_link');
        return $query->row_array();
    }


    public function update_register_machine($id)
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $org_name = $this->session->userdata('user_name');

        $machine_no = $this->input->post('machine_no') ? htmlspecialchars(strip_tags($this->input->post('machine_no'))) : '';
        $machine_ip = $this->input->post('machine_ip') ? htmlspecialchars(strip_tags($this->input->post('machine_ip'))) : '';
        $user_name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';


        $data = [
            'machine_name'         => $machine_no,
            'machine_id'           => $machine_ip,
            'org_id'               =>  $org_id,
            'user_name'            => $user_name,
        ];

        $res = $this->db->select('*')->where('id', $id)->update('machine_link', $data);
        return $res;
    }


    public function occupancy()
    {

        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*')->where('remove', NULL)->where('org_id', $org_id)->get('org_occupancy');
        return $query->result_array();
    }


    public function insert_occupancy()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        $session_id = $this->session->userdata('bmw_org_session_id');

        $org_name = $this->session->userdata('bmw_user_name');
        $date = $this->input->post('date[]');
        $department = $this->input->post('dept_name[]');
        $ward = $this->input->post('ward_name[]');
        $occupancy = $this->input->post('occupancy[]');


        $number = count($occupancy);
        date_default_timezone_set('Asia/Kolkata');

        if ($number != 0) {

            for ($i = 0; $i < count($occupancy); $i++) {

                $data[] = [


                    'org_id' => $org_id,
                    'org_name' => $org_name,
                    'occupancy' => $occupancy[$i],
                    'ward' =>  $ward[$i],
                    'department' => $department[$i],
                    'date' => $date[$i],
                    'session_id' => $session_id


                ];
            }
            $this->db->insert_batch('org_occupancy', $data);
        }
    }
    public function remove_occupancy($id)
    {

        $data = ['remove'  => 1,];

        $this->db->select('*');
        $this->db->where('id', $id);
        $this->db->update('org_occupancy', $data);
    }


    public function update_password()
    {
        $id = $this->session->userdata('bmw_org_id');
        $old_password = $this->input->post('old_password');

        $new_password = $this->input->post('new_password');
        $hash = password_hash($new_password, PASSWORD_DEFAULT);

        $result = $this->db->select('*')->where('org_id', $id)->get('organization_access_master')->row_array();
        $old_hash = $result['password'];

        if ($result) {

            if (password_verify($old_password, $old_hash)) {
                $data = ['password'  => $hash,];

                $this->db->select('*');
                $this->db->where('org_id', $id);
                $this->db->update('organization_access_master', $data);

                $data['error'] = "<script>alert('Password Changed successfully')</script>";
                $this->load->view('organization/update_password.php', $data);
            } else {
                $data['error'] = "<script>alert('Incorrect Old Password')</script>";
                $this->load->view('organization/update_password.php', $data);
            }
        } else {

            $data['error'] = "<script>alert('Incorrect Old Password')</script>";
            $this->load->view('organization/update_password.php', $data);
        }
    }



    public function print_average()
    {

        $start = $this->input->post('start');
        $end = $this->input->post('end');

        $id  =  $this->session->userdata('bmw_org_id');
        $this->db->select('DATE(waste_collection.date_time),waste_collection.department,org_occupancy.occupancy,sum(waste_collection.weight) AS sum_weight,(sum(waste_collection.weight)/org_occupancy.occupancy) AS Average,waste_collection.org_master_id');
        $this->db->from('waste_collection');
        $this->db->join('org_occupancy',  'waste_collection.department = org_occupancy.department');
        $this->db->where('waste_collection.date_time = org_occupancy.date');
        $this->db->where('waste_collection.org_master_id', $id);
        $this->db->where('waste_collection.date_time BETWEEN"' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"');
        $this->db->group_by('waste_collection.department,waste_collection.date, waste_collection.org_master_id');
        $this->db->order_by('waste_collection.date_time', 'ASC');
        $query = $this->db->get();
        // important comment dont remove
        // $query= $this->db->query("select a.date,a.department,b.occupancy,sum(a.weight) sum_weight,(sum(a.weight)/b.occupancy) Average,a.org_master_id from waste_collection a join org_occupancy b on a.department = b.department and a.date = b.date  where a.org_master_id='$id' and  a.date between '$start' and '$end' group by a.department,a.date, a.org_master_id order by a.date ASC");
        return $query->result_array();
    }


    public function print_average2()
    {

        $org_id = $this->session->userdata('bmw_org_id');
        $start    = $this->input->post('start');
        $end    = $this->input->post('end');
        $department = $this->input->post('department');
        $ward = $this->input->post('ward');
        $category = $this->input->post('category');

        $this->db->select('*, a.department as dept')
            // ->join('organization_master as b', 'b.id = a.org_master_id','left')
            ->where('a.org_master_id', $org_id)
            ->where('DATE(a.date_time) BETWEEN"' . date('Y-m-d', strtotime($start)) . '" and "' . date('Y-m-d', strtotime($end)) . '"');

        // Add conditions based on the posted values
        if (!empty($department)) {
            $this->db->where('a.department', $department);
        }

        if (!empty($ward)) {
            $this->db->where('a.ward', $ward);
        }

        if (!empty($category)) {
            $this->db->where('a.category', $category);
        }

        $query =  $this->db->get('waste_collection as a');
        //print_r($query->result_array());exit();
         //echo $this->db->last_query();  // This will echo the last executed query
         //exit();
        return $query->result_array();

    }


    public function  waste_department_wise()
    {
        $id = $this->session->userdata('bmw_org_id');
        $this->db->select('*');
        $this->db->from('waste_collection');
        $this->db->join('treatment_plant_collect', 'waste_collection.barcode = treatment_plant_collect.treatment_code', 'left outer')
            ->where('waste_collection.org_master_id', $id)->where('DATE(waste_collection.date_time)', date('Y-m-d'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_hcf_profile()
    {

        $org_id = $this->session->userdata('bmw_org_id');
        $query = $this->db->select('*')->where('hcf_master_id', $org_id)->get('hcf_profile');
        return $query->result_array();
    }

    //Image Upload
    public   function upload_cto($path)
    {

        $config = [
            'upload_path' => 'public/uploads/HCF_DOC',
            'allowed_types' => 'pdf',
            'encrypt_name' => TRUE,
        ];
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload($path)) {
            $data = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('error', $data['error']);
            return    redirect('index.php/organization/profile');
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
    }
    //end of image upload

    public function insert_profile()
    {
        $org_id = $this->session->userdata('bmw_org_id');
        date_default_timezone_set('Asia/Kolkata');
        $data = $this->input->post();
        $data['hcf_master_id'] = $org_id;
        $data['date'] = date('Y-m-d');


        $this->upload_cto('cto_details');
        $image = $this->upload->data();
        $image_name = $image['file_name'];
        $data['cto_details'] = $image_name;

        $this->upload_cto('auth_details');
        $image = $this->upload->data();
        $image_name = $image['file_name'];
        $data['auth_details'] = $image_name;

        $this->upload_cto('aggrement_details');
        $image = $this->upload->data();
        $image_name = $image['file_name'];
        $data['aggrement_details'] = $image_name;


        $res = $this->db->insert('hcf_profile', $data);
        return $res;
    }


    public function update_profile($id)
    {
        $org_id = $this->session->userdata('bmw_org_id');
        date_default_timezone_set('Asia/Kolkata');
        $data = $this->input->post();


        if (!empty($_FILES["cto_details"]['name'])) {
            $this->upload_cto('cto_details');
            $image = $this->upload->data();
            $image_name = $image['file_name'];
            $data['cto_details'] = $image_name;
        }
        if (!empty($_FILES["auth_details"]['name'])) {
            $this->upload_cto('auth_details');
            $image = $this->upload->data();
            $image_name = $image['file_name'];
            $data['auth_details'] = $image_name;
        }
        if (!empty($_FILES["aggrement_details"]['name'])) {
            $this->upload_cto('aggrement_details');
            $image = $this->upload->data();
            $image_name = $image['file_name'];
            $data['aggrement_details'] = $image_name;
        }

        $this->db->where('id', $id)->update('hcf_profile', $data);
    }

    public function edit_profile($id)
    {

        $this->db->select('*')->where('id', $id);
        $query = $this->db->get('hcf_profile');
        return $query->row_array();
    }

    
}
