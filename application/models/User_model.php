<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{


    public function fetch_department()
    {

        $org_id = $this->session->userdata('bmw_org_master_id');
        $query = $this->db->select('*')->where('remove', NULL)->where('org_id', $org_id)->get('org_department');
        return $query->result_array();
    }

    public function fetch_ward()
    {

        $org_id = $this->session->userdata('bmw_org_master_id');
        $query = $this->db->select('*')->where('remove', NULL)->where('org_id', $org_id)->get('org_ward');
        return $query->result_array();
    }

    public function fetch_category()
    {
        $this->db->select('*')->where('remove', NULL);
        $query = $this->db->get('waste_category');
        return $query->result_array();
    }

    public function fetch_cbwtf_data()
    {
        $org_id = $this->session->userdata('bmw_org_master_id');
        $this->db->select('t.Plant_name as plant_name, o.plant_id as plant_id')
            ->from('org_treatment_link as o')
            ->join('treatment_plant_mster as t', 'o.plant_id=t.id')
            ->where('o.remove', NULL);
        $this->db->where('o.org_mster_id', $org_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function insert_waste_collection()
    {
        $org_master_id  =   $this->session->userdata('bmw_org_master_id');
        $org_master_name  =   $this->session->userdata('bmw_org_master_name');
        $emp_id  =   $this->session->userdata('bmw_emp_id');

        $this->db->select('*')
            ->where('emp_id', $emp_id)->where('remove', NULL);
        $query = $this->db->get('org_employee');
        $result9 = $query->row_array();
        $emp_session_id = $result9['session_id'];

        $this->db->select('*')
            ->where('id', $org_master_id);
        $query = $this->db->get('organization_master');
        $result = $query->row_array();

        $org_spl_code = $result['organization_spl_code'];

        $uniq_no1 = rand(10000, 99999);
        $uniq_no2 = rand(10000, 99999);
        $uniq_no3 = rand(111, 999);


        $code = $uniq_no1 . "" . $uniq_no2 . "" . $uniq_no3;
        $barcode_img = $code;
        $ward = $this->input->post('ward') ? htmlspecialchars(strip_tags($this->input->post('ward'))) : '';
        $department = $this->input->post('department') ? htmlspecialchars(strip_tags($this->input->post('department'))) : '';
        $weight = $this->input->post('weight') ? htmlspecialchars(strip_tags($this->input->post('weight'))) : '';
        $category = $this->input->post('category') ? htmlspecialchars(strip_tags($this->input->post('category'))) : '';
        $remark = $this->input->post('occupancy') ? htmlspecialchars(strip_tags($this->input->post('occupancy'))) : '';
        $table_id = $this->input->post('table_id') ? htmlspecialchars(strip_tags($this->input->post('table_id'))) : '';
        date_default_timezone_set('Asia/Kolkata');

        $data = [

            'org_master_id'                => $org_master_id,
            'department'                      =>  $department,
            'ward'                              => $ward,
            'weight'                             => $weight,
            'category'                          => $category,
            'barcode'                          => $barcode_img,
            'emp_id'                          => $emp_id,
            'remarks'                          => $remark,
            'date_time'                          => date('Y-m-d H:i:s'),
            'emp_session_id'                  => $emp_session_id,
            'organization_spl_code'           => $org_spl_code

        ];
        $result1 = $this->db->insert('waste_collection', $data);

        $this->db->select('machine_name')->where('user_id', $emp_id)->where('remove', NULL);
        $query = $this->db->get('machine_link');
		$result5 = $query->result_array();
		foreach($result5 as $key => $obj)
		{
			$mac_id = $obj['machine_name'];

			$emp_id = $this->session->userdata('bmw_emp_id');
			$this->db->where('mac_id', $mac_id);
			$result2 =  $this->db->delete('demo_weight_data');
		}

        //verify table entry

        $data = [

            'collection_code'                 => $code,
            'code_weight'                     => $weight,
            'waste_category'                  => $category,
            'emp_id'                          => $emp_id,
            'org_master_id'                   => $org_master_id,
            'collection_date'                 => date('Y-m-d H:i:s'),
            'department'                      =>  $department,
            'ward'                              => $ward,
            'organization_spl_code'           => $org_spl_code

        ];
        $result3 = $this->db->insert('verify_barcode', $data);
        if ($result1 == 1 && $result2 == 1 && $result3 == 1) {
            $data = [];
            $data['code'] = $code;
            $data['color'] = $category;
            $data['spl_code'] = $org_spl_code;
            return $data;
        } else {
            echo 0;
        }
    }


    public function fetch_waste_collection()
    {

        $emp_id  =   $this->session->userdata('bmw_emp_id');
        $this->db->select('* , ic.issue_code as issued, wc.weight as collected_weight, wc.id as waste_id')
            ->join('issue_collection as ic', 'wc.barcode=ic.issue_code', 'left')
            ->where('DATE(wc.date_time)', date('Y-m-d'))->order_by('wc.id', 'DESC');
        $this->db->where('emp_id', $emp_id);
        $query = $this->db->get('waste_collection as wc');
        return $query->result_array();
    }

    // Delete Waste Collection

    public function delete_waste_collection($id)
    {
        $query = $this->db->select('barcode,organization_spl_code')
            ->where('id', $id)->get('waste_collection');
        $result = $query->row_array();
        $barcode = $result['barcode'];
        $spl_code = $result['organization_spl_code'];

        $query = $this->db->select('issue_code,organization_spl_code')
            ->where('id', $id)->get('issue_collection');
        $result = $query->num_rows();
        if ($result) {
            $this->session->set_flashdata('error', 'This Waste Is Already Issued To Vehicle. You cant not delete This Record.');
            return    redirect('index.php/user/waste_collection');
        } else {

            $this->db->where('collection_code', $barcode)
                ->where('organization_spl_code', $spl_code);
            $res1 =  $this->db->delete('verify_barcode');

            $this->db->where('id', $id);
            $res =  $this->db->delete('waste_collection');
            return    $res;
        }
    }


    public function fetch_waste_collection_report()
    {

        $org_master_id  =   $this->session->userdata('bmw_org_master_id');
        $emp_id  =   $this->session->userdata('bmw_emp_id');
        $query =  $this->db->select('*')->where('DATE(date_time)', date('Y-m-d'))->get('waste_collection');
        // $this->db->where('org_master_id',$org_master_id);
        $this->db->where('emp_id', $emp_id);
        return $query->result_array();
    }

    public function print_waste_collection_report()
    {

        $emp_id  =   $this->session->userdata('bmw_emp_id');
        $org_master_id  =   $this->session->userdata('bmw_org_master_id');
        $start_date = $this->input->post('start');
        $end_date = $this->input->post('end');

        $this->db->where('DATE(date_time) BETWEEN"' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
        //$this->db->where('org_master_id',$org_master_id);
        $this->db->where('emp_id', $emp_id);
        $query =  $this->db->get('waste_collection');
        return $query->result_array();
    }

    public function print_issue_collection_report()
    {

        $emp_id  =   $this->session->userdata('bmw_emp_id');
        $start_date = $this->input->post('start');
        $end_date = $this->input->post('end');

        $this->db->select('*,tpm.plant_name as cbwtf')
            ->join('treatment_plant_mster as tpm', 'issue_collection.treatment_plant_id=tpm.id');
        $this->db->where('DATE(date_time) BETWEEN"' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
        $this->db->where('employee_id', $emp_id);
        $query =  $this->db->get('issue_collection');
        return $query->result_array();
    }

    public function fetch_issue_report()
    {
        $emp_id  =   $this->session->userdata('bmw_emp_id');
        $org_master_id  =   $this->session->userdata('bmw_org_master_id');
        $query =  $this->db->select('*')->where('DATE(date_time)', date('Y-m-d'))->get('issue_collection');
        // $this->db->where('organization_master_id',$org_master_id);
        $this->db->where('employee_id', $emp_id);
        return $query->result_array();
    }


    public function insert_dummy_issue_collection()
    {
        $emp_id  =   $this->session->userdata('bmw_emp_id');
        $scan = $this->input->post('scan');
        $date = date('Y-m-d H:i:s');
        $barcode = $scan;

        $query =  $this->db->select('org_master_id')->where('barcode', $scan)->get('waste_collection');
        $result = $query->row_array();
        $org_id = $result['org_master_id'];



        $query =  $this->db->select('*')->where('barcode', $barcode)->get('waste_collection');
        $result = $query->row_array();
        $category = $result['category'];
        $weight = $result['weight'];
        $organization_spl_code = $result['organization_spl_code'];


        $data = [

            'organization_master_id'  => $org_id,
            'issue_code' => $scan,
            'issue_date' =>  $date,
            'waste_category' => $category,
            'weight' => $weight,
            'org_employee' => $emp_id,
            'organization_spl_code' => $organization_spl_code

        ];
        $this->db->insert('dummy_issue_collection', $data);
    }



    public function  fetch_vehicle()
    {

        $query = $this->db->select('*')->where('remove', NULL)->get('org_vehicle_mster');
        return $query->result_array();
    }
    public function  fetch_vehicle2()
    {
        $master_id = $this->session->userdata('bmw_org_master_id');
        $query = $this->db->select('*')->where('org_mster_id', $master_id)
            ->where('remove', NULL)->get('org_vehicle_mster');
        return $query->result_array();
    }

    public function  fetch_vehicle3()
    {
        $master_id = $this->session->userdata('bmw_plant_id');
        $query = $this->db->select('*')->where('plant_id', $master_id)
            ->where('remove', NULL)->get('org_vehicle_mster');
        return $query->result_array();
    }



    public function  fetch_plant_details()
    {

        $query = $this->db->select('*')->where('remove', NULL)->get('treatment_plant_mster');
        return $query->result_array();
    }



    public function  fetch_dummy_data()
    {
        $emp_id  =   $this->session->userdata('bmw_emp_id');
        $master_id = $this->session->userdata('bmw_org_master_id');
        $query = $this->db->select('*')->where('org_employee', $emp_id)->where('organization_master_id', $master_id)->get('dummy_issue_collection');
        return $query->result_array();
    }


    public function fetch_issue_collection()
    {

        $master_id = $this->session->userdata('bmw_org_master_id');
        $query =  $this->db->select('*')
            ->where('DATE(date_time)', date('Y-m-d'))
            ->where('organization_master_id', $master_id)->order_by('id', 'DESC')->get('issue_collection');
        return $query->result_array();
    }

    public function insert_issue_collection()
    {
        $emp_id = $this->session->userdata('bmw_emp_id');
        $barcodes = $this->input->post('issue_code[]');
        $cbwtf_id = $this->input->post('plant_name');
        $vehicle_number = $this->input->post('vehicle_number');
        $categories = $this->input->post('category[]');
        $organization_spl_code = $this->input->post('organization_spl_code[]');
        $weights = $this->input->post('weight[]');
        $org_ids = $this->input->post('org_id');

        $query =  $this->db->select('*')->where('vc_no', $vehicle_number)->get('org_vehicle_mster');
        $result = $query->row_array();
        $vc_id = $result['id'];

        // $query =  $this->db->select('*')->where('Plant_name',$plant_name)->get('treatment_plant_mster');
        // $result = $query->row_array();
        // $cbwtf_id = $result['id'];


        $this->db->select('session_id')->where('emp_id', $emp_id);
        $query = $this->db->get('org_employee');
        $result9 = $query->row_array();
        $emp_session_id = $result9['session_id'];

        $number = count($barcodes);
        date_default_timezone_set('Asia/Kolkata');

        ///Issue_collection_insertion
        if ($number != 0) {

            for ($i = 0; $i < count($barcodes); $i++) {


                $data[] = [
                    'organization_master_id'  => $org_ids,
                    'issue_code' => $barcodes[$i],
                    'waste_category' => $categories[$i],
                    'weight' => $weights[$i],
                    'organization_spl_code' => $organization_spl_code[$i],
                    'vehicle_number' => $vehicle_number,
                    'employee_id' => $emp_id,
                    'org_vehicle_mster_id' => $vc_id,
                    'treatment_plant_id' =>  $cbwtf_id,
                    'employee_id' => $emp_id,
                    'date_time' => date('Y-m-d H:i:s'),
                    'emp_session_id' => $emp_session_id,

                ];
            }
            $this->db->insert_batch('issue_collection', $data);
        }
        ///verify_table_insertion

        if ($number != 0) {

            for ($i = 0; $i < count($barcodes); $i++) {

                $data2[] = [
                    'collection_code' => $barcodes[$i],
                    'issue_code' => $barcodes[$i],
                    'issue_date' =>  date('Y-m-d H:i:s'),
                    'issue_emp_id ' => $emp_id,
                    'vehicle_number' => $vehicle_number,

                ];
            }

            $res = $this->db->update_batch('verify_barcode', $data2, 'collection_code');
        }

        //deleting dummy table

        $this->db->where('org_employee', $emp_id)->delete('dummy_issue_collection');
        return $res;
        redirect('index.php/user/issue_waste_collection');
    }


    public function fetch_total_data()
    {
        $emp_id  = $this->session->userdata('bmw_emp_id');

        $this->db->select("category");
        $this->db->from("waste_collection");
        $this->db->where('emp_id', $emp_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function fetch_today_data()
    {
        $emp_id  = $this->session->userdata('bmw_emp_id');

        $this->db->select("category");
        $this->db->from("waste_collection");
        $this->db->where('DATE(date_time)', date('Y-m-d'));
        $this->db->where('emp_id', $emp_id);
        $query = $this->db->get();
        return $query->result_array();
    }


    public function send_password()
    {
        function generateRandomString($length = 8)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#*&';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        $password = generateRandomString();
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $user_name = $this->input->post('user_name') ? htmlspecialchars(strip_tags($this->input->post('user_name'))) : '';

        $this->db->select('*')->where('Username', $user_name);
        $query =  $this->db->get('org_employee');

        $num = $query->num_rows();


        if ($num == 0) {
            $data['error'] = "User not Found.";
            $this->load->view('user/forgot.php', $data);
        } else {


            $row = $query->row_array();
            $id = $row['emp_id'];


            $this->db->select('*')->where('id', $id);
            $query2 =  $this->db->get('org_staff');


            $row2 = $query2->row_array();

            $email = $row2['email'];

            $data = ['Password'  => $hash,];

            $this->db->select('*');
            $this->db->where('emp_id', $id);
            $this->db->update('org_employee', $data);



            $html = "Your Password is " . $password;
            $to = $email;

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
               return 1;
			} else {
               return 0;
			}
        }
    }


    public function fetch_weight()
    {
        $emp_id = $this->session->userdata('bmw_emp_id');


        $this->db->select('*')->where('user_id', $emp_id);
        $query = $this->db->get('machine_link');
        $result5 = $query->result_array();
		foreach($result5 as $key => $obj)
		{
			$mac_id = $obj['machine_name'];

			$this->db->select('*');
			$this->db->where('mac_id', $mac_id);
			$this->db->where('status', NULL);
			$this->db->order_by('table_id', 'DESC');
			$this->db->limit(1);
			$query = $this->db->get('demo_weight_data');
			$result = $query->row_array();
			if ($result == NULL) {
				if(count($result5) == ($key+1))
				{
				$result2['info'] = "No Input Data Or Device is Not Registered";
				return $result2;
				}
			} else {
				return $result;
			}
		}
    }



    public function update_password()
    {
        $id = $this->session->userdata('bmw_plant_id');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $hash = password_hash($new_password, PASSWORD_DEFAULT);


        $result = $this->db->select('*')->where('plant_master_id', $id)->get('treatment_plant_access')->row_array();
        $old_hash = $result['password'];


        if ($result) {

            if (password_verify($old_password, $old_hash)) {

                $data = ['password'  => $hash,];

                $this->db->select('*');
                $this->db->where('plant_master_id', $id);
                $this->db->update('treatment_plant_access', $data);

                $data['error'] = "<script>alert('Password Changed successfully')</script>";
                $this->load->view('cbwtf/update_password.php', $data);
            } else {
                $data['error'] = "<script>alert('Incorrect Old Password')</script>";
                $this->load->view('cbwtf/update_password.php', $data);
            }
        } else {
            $data['error'] = "<script>alert('Incorrect Old Password')</script>";
            $this->load->view('cbwtf/update_password.php', $data);
        }
    }



    public function update_password2()
    {
        $id = $this->session->userdata('bmw_emp_id');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $hash = password_hash($new_password, PASSWORD_DEFAULT);

        $result = $this->db->select('*')->where('emp_id', $id)->get('org_employee')->row_array();


        if ($result) {

            $old_hash = $result['Password'];
            if (password_verify($old_password, $old_hash)) {

                $data = ['Password'  => $hash,];

                $this->db->select('*');
                $this->db->where('emp_id', $id);
                $this->db->update('org_employee', $data);

                $data['error'] = "<script>alert('Password Changed successfully')</script>";
                $this->load->view('user/update_password.php', $data);
            } else {

                $data['error'] = "<script>alert('Incorrect Old Password')</script>";
                $this->load->view('user/update_password.php', $data);
            }
        } else {

            $data['error'] = "<script>alert('Incorrect Old Password')</script>";
            $this->load->view('user/update_password.php', $data);
        }
    }


    public function delete_dummy_waste_collection($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('dummy_issue_collection');
    }

    public function delete_dummy_waste_receive($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('dummy_issue_receive');
    }
}
